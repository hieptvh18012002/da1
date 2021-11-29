<?php
require_once "./mvc/bridge.php";
callModel("productModels");
callModel("categoryModels");
callModel("commentModels");
callModel("vourcherModels");
// lấy list
$list_vour = vc_select_all();
$role = '';
$err = '';
// hành động
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
            // hành động của admin;
        case "del_cmt":
            $id = $_GET['cmt_id'];
            $pro_id = $_POST['pro_id'];

            pdo_execute("DELETE FROM comments WHERE id='$id'");
            header('location: ');
            viewClient("master", ['page' => 'productDetails','list_vour'=>$list_vour]);
            break;
    }
}

// gọi view
viewClient("master", ['page' => 'productDetails', 'err' => $err, 'role' => $role]);
