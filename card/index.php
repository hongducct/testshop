<?php

// bắt đầu quản lý phiên với cookie dài hạn
$lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

// create a cart array if needed
if (empty($_SESSION['cart12'])) {
    $_SESSION['cart12'] = array();
}

// create a table of products
$products = array();
$products['MMS-1754'] = array('name' => 'Thuốc ốm', 'cost' => '100.00');
$products['MMS-6289'] = array('name' => 'Thuốc bổ', 'cost' => '199.50');
$products['MMS-3408'] = array('name' => 'Cà Gai Leo', 'cost' => '299.50');

// include cart functions
require_once('cart.php');

// get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_add_item';
    }
}

// add or update cart as needed
switch($action) {
    case 'add':
        $product_key = filter_input(INPUT_POST, 'productkey');
        $item_qty = filter_input(INPUT_POST, 'itemqty');
        add_item($product_key, $item_qty);
        include('cart_view.php');
        break;
    case 'update':
        $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT,
                                    FILTER_REQUIRE_ARRAY);
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION['cart12'][$key]['qty'] != $qty) {
                update_item($key, $qty);
            }
        }

        include('cart_view.php');
        break;
    case 'show_cart': 
        include('cart_view.php');
        break;
    case 'show_add_item': 
        include('add_item_view.php');
        break;
    case 'empty_cart': 
        unset($_SESSION['cart12']);
        include('cart_view.php');
        break;
}
?>