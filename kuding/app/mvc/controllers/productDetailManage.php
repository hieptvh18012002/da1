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
           $id= $_POST['cmt_id'];
            pdo_execute("DELETE FROM comments WHERE cmt_id='$id'");
            echo "<script>" . 'alert("Xóa thành công 1 comment")' . "</script>";
            viewClient("master", ['page' => 'productDetails']);
            break;
        
    }
}

// gọi view
viewClient("master", ['page' => 'productDetails', 'err' => $err, 'role' => $role]);
