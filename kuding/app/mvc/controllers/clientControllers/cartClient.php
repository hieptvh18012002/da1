<?php
require_once "./app/common/bridge.php";

$display = display_select_all();
$list_cate = cate_select_all();
$vourchers = vc_select_show();
// favo
if(isset($_SESSION['customer'])){
    $client_id = $_SESSION['customer']['id'];
    $favo = favo_select_client($client_id);
    $count_favo = count($favo);
}elseif(isset($_SESSION['admin'])){
    $client_id = $_SESSION['admin']['id'];
    $favo = favo_select_client($client_id);
    $count_favo = count($favo);
}elseif(isset($_SESSION['favorite'])){
    $count_favo = count($_SESSION['favorite']);
}else{
    $count_favo = 0;
}

// lấy sp đề xuất
$recommended = pdo_query("SELECT * FROM products ORDER BY RAND() LIMIT 0,10");
$msg = '';
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        case "del":
            $cart_id = $_GET['id'];
            unset($_SESSION['cart'][$cart_id]);
            header('location: cartClient?action=viewList&msg=Hủy thành công 1 sản phẩm ra giỏ hàng!');
            die;
            break;
    }
}
// POST
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'update_cart':
            $id = $_POST['product_id'];
            $_SESSION['cart'][$id]['quantity'] = $_POST['quantity'];
            $msg = "Cập nhật thành công số lượng sản phẩm";
            break;
            
        default:
            // thêm mới item
            $id = $_POST['pro_id'];
            $pros = product_select_by_id($id);
            // nếu sp đã tồn tại thì +1 qty
            $quantity = $_POST['quantity'];
            if (isset($_SESSION['cart'][$id]) && $_POST['color'] == $_SESSION['cart'][$id]['color'] && $_POST['size'] == $_SESSION['cart'][$id]['size']) {
                $_SESSION['cart'][$id]['quantity'] += $quantity;
            } else {
                $item = [
                    'id' => $pros['id'],
                    'name' => $pros['name'],
                    'price' => $pros['price'] - $pros['discount'],
                    'avatar' => $pros['avatar'],
                    'color' => $_POST['color'],
                    'size' => $_POST['size'],
                    'quantity' => $quantity
                ];
                $_SESSION['cart'][$id] = $item;
            }



            // viewClient('layout', ['page' => 'cart','vourchers'=>$vourchers ,'list_cate' => $list_cate, 'msg' => $msg,'display'=>$display,'recommened'=>$recommended,'count_favo'=>$count_favo]);
            break;
    }
}
viewClient('layout', ['page' => 'cart', 'list_cate' => $list_cate, 'msg' => $msg,'vourchers'=>$vourchers,'display'=>$display,'recommened'=>$recommended,'count_favo'=>$count_favo]);
