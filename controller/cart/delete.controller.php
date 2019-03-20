<?php
    require_once '../../model/cart.model.php';

    $cart = new Cart();
    $cart_id = $_GET['id'];
    $cart->deleteCart($cart_id);
    header('location:../../view/cart.php');
