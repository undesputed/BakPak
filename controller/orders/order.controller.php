<?php
    require_once '../../model/cart.model.php';

    $cart = new Cart();
    if (isset($_POST['checkout'])) {
        $item_id = $_POST['item_id'];
        $user_id = $_SESSION['user_id'];
        $quantity = $_POST['quantity'];
        $total_price = isset($_POST['totalPrice']);
        $data = array($item_id, $user_id, $quantity);
        foreach ($data as $d) {
            echo $d;
        }
        echo $total_price;
        // $cart->updateCart($data, $user_id);
    }
