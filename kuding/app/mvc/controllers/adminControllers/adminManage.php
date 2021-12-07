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
$percent_un_order = number_format($unprocess_order / $total_order * 100, 2, '.', ',');
// tổng sl sp theo danh mục
$qty_product_cate = pdo_query_value("SELECT c.name,COUNT(p.id) as 'quantity' FROM products p,categories c WHERE c.id=p.cate_id GROUP BY c.name;
");
// doanh thu(get các sp đã bán(exist trong product_detail, ...))
viewAdmin("layout", [
    'page' => 'index',
    'total_orders' => $total_order,
    'unprocess_order' => $unprocess_order,
    'percent_un_order' => $percent_un_order
]);
