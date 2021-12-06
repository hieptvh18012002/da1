<?php
require_once "./app/common/bridge.php";

$list_order = order_select_all();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "viewDetail":
            $id = $_GET['id'];
            $bill = orderDetail_select_by_id($id);
            $receiver = order_select_client($id);

            // thay đổi tình trạng đơn
            if (isset($_POST['btn_sb'])) {
                extract($_POST);
                order_update_status($bill_id, $status);
                header('location: order?action=viewDetail&msg=Cập nhật tình trạng đơn thành công‼&id=' . $bill_id);
            }

            viewAdmin('layout', ['page' => 'orderDetail', 'bill' => $bill, 'receiver' => $receiver]);
            break;

        default:

            viewAdmin('layout', ['page' => 'listOrder', 'list_order' => $list_order]);
            break;
    }
}

viewAdmin('layout', ['page' => 'listOrder', 'list_order' => $list_order]);
