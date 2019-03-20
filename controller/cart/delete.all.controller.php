<?php
    require_once '../../model/cart.model.php';

    $cart = new Cart();
    $user_id = $_GET['id'];
    $cart->deleteAllCart($user_id);
    header('location:../../view/index.php?id='.$_SESSION['user_id'].'?info='.$_SESSION['user']);
