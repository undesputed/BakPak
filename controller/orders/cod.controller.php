<?php
    require_once '../../model/cart.model.php';
    require_once '../../model/order.model.php';
    require_once '../../model/item.model.php';
    require_once '../../model/delivery.model.php';
    require_once '../../model/history.model.php';
    require_once '../../model/notification.model.php';

    date_default_timezone_set('Asia/Manila');
    $dates = date('Y-m-d');
    $cart = new Cart();
    $order = new Orders();
    $delivery = new Delivery();
    $item = new Item();
    $history = new History();
    $notif = new Notification();

    $payment = 'COD';
    $getTotal = $cart->getTotal($_SESSION['user_id']);
    $total = $getTotal['total'];
    $order_code = $_SESSION['user_id'].'-OR-'.$dates;
    $delivery_code = $_SESSION['user_id'].'-COD-'.$dates;
    $delivery_status = 'PENDING';
    // echo $order_code;
    $delivery->addDelivery(array($delivery_code, $delivery_status, $_SESSION['user_id'], $order_code));
    $history->addHistory(array($order_code, $delivery_code, $_SESSION['user_id'], $delivery_status));
    $getAllCart = $cart->getCartByItemId($_SESSION['user_id']);
    $getQty = $cart->getTotalByItem($_SESSION['user_id']);
    foreach ($getAllCart as $g) {
        $getItem = $item->getItemById($g['item_id']);
        $order_total = $getItem['unit_price'] * $g['quantity'];
        $order->addOrder(array($order_code, $g['item_id'], $_SESSION['user_id'], $g['quantity'], $order_total, $payment));
        $qty = $getItem['item_quantity'] - $g['quantity'];
        $item->updateQuantity(array($qty), $g['item_id']);
    }
    $cart->deleteAllCart($_SESSION['user_id']);
    header('location:../../view/index.php?id='.$_SESSION['user_id'].'?info='.$_SESSION['user']);
