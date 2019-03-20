<?php
	require_once '../model/cart.model.php';
    require_once '../model/user.model.php';
    require_once '../model/item.model.php';
    require_once '../model/history.model.php';
    require_once '../model/order.model.php';
    require_once '../model/delivery.model.php';
    require_once '../model/sub.category.model.php';
    $cart = new Cart();
    $user = new User();
    $item = new Item();
    $delivery = new Delivery();
    $history = new History();
    $order = new Orders();
    $subCat = new SubCategory();
    $response = array();

    $get = $cart->getAllCart();
    foreach($get as $g){
    	$getUser = $user->getUserById($g['user_id']);
    	$getItem = $item->getItemById($g['item_id']);
    	$getCat = $subCat->getSubCatById($getItem['sub_category_id']);
    	// $response['user'] = $getUser['user_fname'].' '.$getUser['user_lname'];
    	$response['item_image'] = "http://localhost/adminBakpak/view/assets/image/".$getItem['item_image'];
    	$response['item_name'] = $getItem['item_name'];
    	$response['price'] = $getItem['unit_price'];
    	$response['category'] =  $getCat['sub_category_name'];
    	$response['quantity'] = $getItem['item_quantity'];
    	echo json_encode($response);
    }