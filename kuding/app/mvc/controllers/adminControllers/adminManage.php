<?php
require_once "./app/common/bridge.php";

if (!isset($_SESSION['admin'])) {
    header("location: account?action=loginAdmin");
} else
    //  xử lí thống kê render ra index admin

    $total_order = pdo_query_value("SELECT count(*) FROM orders");
// số đơn hàng chưa xử lí
$unprocess_order = pdo_query_value("SELECT count(*) FROM orders where status=0");
// % đơn hàng chưa process
$percent_un_order = $unprocess_order / $total_order * 100;
viewAdmin("layout", [
    'page' => 'index',
    'total_orders' => $total_order,
    'unprocess_order' => $unprocess_order,
    'percent_un_order'=>$percent_un_order
]);
