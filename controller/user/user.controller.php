<?php

    require_once '../../model/log.model.php';
    require_once '../../model/user.model.php';

    $users = new User();
    $log = new Log();
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $data = array($user, $pass);
        $ok = $log->login($data);
        if ($ok) {
            echo "<script>alert('Login Success');</script>";
            header('location:../../view/index.php?id='.$_SESSION['user_id'].'?info='.$_SESSION['user']);
        } else {
            echo "<script>alert('Login Failed');</script>";
            header('location:../../login.php');
        }
    }

    if (isset($_POST['register'])) {
        $fname = htmlentities($_POST['fname']);
        $lname = htmlentities($_POST['lname']);
        $addr = htmlentities($_POST['addr']);
        $addr2 = htmlentities($_POST['addr2']);
        $email = htmlentities($_POST['email']);
        $phone = htmlentities($_POST['phone']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);
        $confirm = htmlentities($_POST['confirm']);

        if ($confirm == $pass) {
            $data = array($fname, $lname, $phone, $email, $addr, $addr2, $user, $pass);
            $ok = $users->addUser($data);
            if ($ok) {
                $ok = $log->login(array($user, $pass));
                header('location:../../view/index.php?id='.$_SESSION['user_id'].'&?info='.$_SESSION['user']);
            }
        } else {
            header('location:../../register.php?PASSWORD_NOT_MATCH');
        }
    }

    if (isset($_POST['update'])) {
        $id = htmlentities($_POST['id']);
        $fname = htmlentities($_POST['fname']);
        $lname = htmlentities($_POST['lname']);
        $addr = htmlentities($_POST['addr']);
        $addr2 = htmlentities($_POST['addr2']);
        $email = htmlentities($_POST['email']);
        $phone = htmlentities($_POST['phone']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);
        $newpass = '';
        $confirmnew = '';

        $get = $users->getUserById($id);
        if ($pass == $get['user_password']) {
            if (isset($_POST['confirmnewpass'])) {
                $newpass = htmlentities($_POST['newpass']);
                $confirmnew = htmlentities($_POST['confirmnewpass']);
                if ($newpass == $confirmnew) {
                    $data = array($fname, $lname, $phone, $email, $addr, $addr2, $user, $newpass);
                    $users->updateUser($data, $id);
                    echo "<script>alert('Update Success');</script>";
                    header('location:../../view/index.php?id='.$_SESSION['user_id'].'?info='.$_SESSION['user']);
                } else {
                    header('location:../../view/account.php?NEW_PASSWORD_DOES_NOT_MATCH');
                }
            } else {
                $data = array($fname, $lname, $phone, $email, $addr, $addr2, $user, $pass);
                $users->updateUser($data, $id);
                echo "<script>alert('Update Success');</script>";
                header('location:../../view/index.php?id='.$_SESSION['user_id'].'?info='.$_SESSION['user']);
            }
        } else {
            header('location:../../view/account.php?INCORRECT_PASSWORD');
        }
    }
