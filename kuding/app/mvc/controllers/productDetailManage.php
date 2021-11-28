<?php
require_once "./mvc/bridge.php";
callModel("productModels");
callModel("categoryModels");
callModel("commentModels");
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
            viewClient("master", ['page' => 'productDetails']);
            break;
    }
}

// gọi view
viewClient("master", ['page' => 'productDetails', 'err' => $err, 'role' => $role]);
