<?php
require_once "./app/common/bridge.php";
callModel("productModels");
callModel("categoryModels");

$list_cate = cate_select_all();
// nếu caart empty thì gọi viu empty
// if (!isset($_SESSION['cart']) || $_SESSION['cart'] == '') {
//     viewClient('layout', ['page' => 'cart-empty']);
//     die;
// } else {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case "addCart":

                break;

            case "checkout":
                
                viewClient('layout',['page'=>'checkout']);
                break;
        }
    }
    viewClient('layout', ['page' => 'cart','list_cate'=>$list_cate]);
// }
