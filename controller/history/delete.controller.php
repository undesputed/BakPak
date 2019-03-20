<?php
    require_once '../../model/history.model.php';

    $history = new History();
    $id = $_GET['id'];
    $history->deleteHistory($id);
    echo "<script>alert('Deleted Successfully');</script>";
    header('location:../../view/account.php?id='.$_SESSION['user_id'].'?info='.$_SESSION['user']);