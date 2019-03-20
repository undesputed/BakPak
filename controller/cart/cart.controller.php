<?php
    require_once '../../model/cart.model.php';

    $cart = new Cart();
    if (isset($_POST['addToCart'])) {
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['qty'];

        $byItem = $cart->getCartByItem($item_id);
        $byUser = $cart->getCartByUser($user_id);
        // foreach ($getAll as $g) {
        if ($item_id == $byUser['item_id']) {
            $data = array($user_id, $item_id, $byUser['quantity'] + $quantity);
            $cart->updateCart($data, $item_id);
            header('location:../../view/index.php?id='.$_SESSION['user_id'].'?infor='.$_SESSION['user']);
        } else {
            $data = array($user_id, $item_id, $quantity);
            $cart->addCart($data);
            header('location:../../view/index.php?id='.$_SESSION['user_id'].'?info='.$_SESSION['user']);
        }
        // }
    }

    if (isset($_POST['prodtocart'])) {
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['qty'];

        $byItem = $cart->getCartByItem($item_id);
        $byUser = $cart->getCartByUser($user_id);
        // foreach ($getAll as $g) {
        if ($item_id == $byUser['item_id']) {
            $data = array($user_id, $item_id, $byUser['quantity'] + $quantity);
            $cart->updateCart($data, $item_id);
            header('location:../../view/product.php?id='.$item_id);
        } else {
            $data = array($user_id, $item_id, $quantity);
            $cart->addCart($data);
            header('location:../../view/product.php?id='.$item_id);
        }
        // }
    }

    if (isset($_POST['buynow'])) {
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['qty'];

        $byItem = $cart->getCartByItem($item_id);
        $byUser = $cart->getCartByUser($user_id);
        // foreach ($getAll as $g) {
        if ($item_id == $byUser['item_id']) {
            $data = array($user_id, $item_id, $byUser['quantity'] + $quantity);
            $cart->updateCart($data, $item_id);
            header('location:../../view/cart.php');
        } else {
            $data = array($user_id, $item_id, $quantity);
            $cart->addCart($data);
            header('location:../../view/cart.php');
        }
        // }
    }
