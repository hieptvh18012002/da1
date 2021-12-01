<?php

require_once "./app/common/bridge.php";
callModel("newsModels");
$err = array();
$err['img'] = '';
$msg = '';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "list":

            viewAdmin('layout', ['page' => 'listNews']);
            break;
        case "add":
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
                } else {
                    $err['img'] = "Ảnh chưa tải lên";
                }
                if(empty($err['img'])){
                    if($file['size'] > 0){
                        move_uploaded_file($file['tmp_name'], './public/images/upload/'.$avatar);
                    }
                    news_insert($title,$shortdesc,$desc,$avatar,$_SESSION['admin']['id'],$special);
                    $msg = 'Thêm tin tức thành công !';
                }
                
            }
            viewAdmin('layout', ['page' => 'addNews', 'msg' => $msg, 'err' => $err['img']]);
            break;
        default:

            break;
    }
}
