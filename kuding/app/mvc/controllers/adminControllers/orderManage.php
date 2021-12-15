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
                $current_status = pdo_query_value("SELECT status FROM orders WHERE id=$bill_id");
                // nếu status gửi vào == status của đơn thì k lj cả(tránh trừ nhiều lần qty sp/1 đơn)
                if ($status == $current_status) {
                    // chả lj cả =))
                    echo "m định tạo bug à con;))";die;
                } else {
                    // check nếu đã giao hàng thì giảm qty của các sp được bán(lấy ra mảng)
                    $get_pro_bill = pdo_query("SELECT ot.pro_id,ot.quantity FROM orders o JOIN order_details ot ON ot.order_id=o.id WHERE o.id = $bill_id");
                    //  lặp + trừ sl
                    // từ bill id -> lấy ra các sp dc mua trong order detail
                    if ($status == 2) {
                        foreach ($get_pro_bill as $item) {
                            $qty = $item['quantity'];
                            $pro_id = $item['pro_id'];
                            // lấy và ktra xem qty sản phẩm còn lại trong kho còn >= slg ng ta đặt hay k?
                            $qty_pros = pdo_query_value("SELECT quantity FROM products WHERE id=$pro_id");
                            if ($qty_pros >= $qty) {
                                pdo_execute("UPDATE products SET quantity=(quantity-$qty) WHERE id=$pro_id");
                                order_update_status($bill_id, $status);
                            } else {
                                header('location: order?action=viewDetail&danger=Cập nhật không thành công vì số lượng mặt hàng hiện tại trong kho không đủ cung cấp!&id='.$bill_id);
                                die;
                            }
                        }
                    } else {

                        order_update_status($bill_id, $status);
                    }
                }

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
