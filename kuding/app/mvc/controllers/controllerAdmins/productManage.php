<?php
require_once './app/common/bridge.php';
callModel("productModels");
callModel("categoryModels");

$list_cate = cate_select_all();
$list_pro = product_select_all(); 

$err = array();
$err['img'] = '';
$msg = '';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "addProduct":
            if (isset($_POST['btn_add'])) {
                extract($_POST);
                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['avatar'];
                if ($file['size'] != 0) {
                    if ($file['size'] > 2097152) {
                        $err['img'] = 'Chỉ cho phép tải ảnh dưới 2mb!';
                    } else {
                        $avatar = $file['name'];
                        $ext = pathinfo($avatar, PATHINFO_EXTENSION);
                        if (!in_array($ext, $ext_img)) {
                            $err['img'] = 'Ảnh tải lên phải là jpg, png hoặc jpeg';
                        }
                    }
                }else{
                    $err['img'] = "Ảnh chưa tải lên";
                }
                // insert
                // var_dump($name,$price,$category,$avatar,$desc);die;

                if(!array_filter($err)){
                    product_insert($name, $category, $price, $avatar, $desc);
                    $msg = "Thêm thành công sản phẩm";
                    // insert attribute
                }
            }
            viewAdmin("layout", ['page' => 'addProduct', 'list_cate' => $list_cate,'errImg'=>$err['img'],'msg'=>$msg]);
            break;

        default:
            viewAdmin("layout", ['page' => 'listProducts','list_pro'=>$list_pro,'list_cate' => $list_cate]);

            break;
    }
}
viewAdmin("layout", ['page' => 'listProducts','list_pro'=>$list_pro,'list_cate' => $list_cate]);
