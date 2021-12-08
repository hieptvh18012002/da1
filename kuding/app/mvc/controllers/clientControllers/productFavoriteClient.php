<?php
require_once './app/common/bridge.php';

// dd
$display = display_select_all();
// lấy list
$vourchers = vc_select_show();
// list favorite da luu db
$list_favo = '';
if(isset($_SESSION['admin'])){
    $client_id = $_SESSION['admin']['id'];
}else if(isset($_SESSION['admin'])){
    $client_id = $_SESSION['customer']['id'];

}
$list_cate = cate_select_all();
$size_values = size_select_all();
$color_values = color_select_all();

$err = array();
// tạo 2 mảng rỗng để chứa name
$color_name = [];
$size_name = [];
$msg = '';
// echo "<pre>";
// var_dump($_SESSION['favorite']);die;
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "addFavorite":
            $id = $_GET['id'];
            $pros = product_select_by_id($id);
            // laasy attr value sp
            $color_id = [];
            $size_id = [];
            // chuyển mảng 2 chieefu về thành chuỗi
            foreach (color_select_pro($id) as $c) {
                array_push($color_id, $c['value_id']);
            }
            foreach (size_select_pro($id) as $s) {
                array_push($size_id, $s['value_id']);
            }

            // lặp và lấy name bỏ vào mảng;
            foreach ($color_id as $c) {
                array_push($color_name, select_name_value_pro($c)); // lại là mảng 3 chìu
            }
            foreach ($size_id as $s) {
                array_push($size_name, select_name_value_pro($s)); // lại là mảng 3 chìu
            }

            // neeus chua login thi luu ss
            if (!isset($_SESSION['customer']) && !isset($_SESSION['admin'])) {
                $quantity = 1;
                if (isset($_SESSION['favorite'][$id]) && $_SESSION['favorite'][$id] == $pros['id']) {
                    $_SESSION['favorite'][$id]['quantity'] += 1;
                } else {
                    $item = [
                        'id' => $pros['id'],
                        'name' => $pros['name'],
                        'price' => $pros['price'] - $pros['discount'],
                        'avatar' => $pros['avatar'],
                        'color_name' => $color_name,
                        'size_name' => $size_name,
                    ];
                    $_SESSION['favorite'][$id] = $item;
                }
                // echo "<pre>";
                // var_dump($_SESSION['favorite']);
                // die;
            } else {
               
                // huyr ss favo
                unset($_SESSION['favorite']);
                // da login luu database
                favo_insert($id,$client_id);

            }


            break;
        
        case "del":
            $id = $_GET['id'];
            
            unset($_SESSION['favorite'][$id]);
            header('location: productFavoriteClient');
            break;
        default:
            // show


            break;
    }
}
viewClient("layout", ['page' => 'favorite', 'display' => $display, 'list_cate' => $list_cate, 'vourchers' => $vourchers, 'color_name' => $color_name, 'size_name' => $size_name,'list_favo'=>$list_favo]);
