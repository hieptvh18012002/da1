<?php
require_once "./app/common/bridge.php";
callModel("categoryModels");
callModel("productModels");
callModel("addressModels");
callModel("orderModels");
callModel("vourcherModels");
// lấy tỉnh
$province = province_select_all();
// vc
$vourchers = vc_select_show();
$list_cate = cate_select_all();
$vour_exist = '';
$vocher = '';

$err = '';
$price_new = '';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "checkout":
            // nếu chưa login thì bắt login
            if (!isset($_SESSION['customer'])) :
                header('location: cartClient?msg=Vui lòng đăng nhập và tiếp tục trải nghiệm 🥰');
            else :
                // render address
                if (isset($_GET['provinceId'])) {
                    echo '<option selected disable>-----Quận huyện----</option>';
                    $provinceId = $_GET['provinceId'];
                    $districts = pdo_query("SELECT * FROM district WHERE provinceid='$provinceId'");

                    foreach ($districts as $item) {
                        echo '<option value="' . $item["districtid"] . '">' . $item["name"] . '</option>';
                    }
                    die;
                }
                // lấy xã phường từ quận huyện
                if (isset($_GET['districtId'])) {
                    echo '<option selected disable>-----Phường xã----</option>';
                    $districtId = $_GET['districtId'];
                    $ward = pdo_query("SELECT * FROM ward WHERE districtid='$districtId'");
                    foreach ($ward as $item) {
                        echo '<option value"' . $item["wardid"] . '">' . $item["name"] . '</option>';
                    }
                    die;
                }
                // xử lí vourcher
                if (isset($_POST['btn_apply'])) {
                    $vocher = $_POST['vocher'];
                    $total_price = $_POST['total_price'];
                    // so khớp mã code input vs code có hợp lệ
                    $vour_exist = vc_select_code($vocher);
                    if (is_array($vour_exist)) {
                        // lấy client_id trong vc_detail xem client này đã dùng lần nào chưa?
                        $voucher_id = pdo_query_value("SELECT id FROM vourchers WHERE code='$vocher'");
                        $client_used = vc_detail_select_client($voucher_id, $_SESSION['customer']['id']);

                        if (is_array($client_used)) {
                            $err = "Bạn đã dùng mã giảm giá này rồi!";
                        } else {
                            // check loại giảm và giam tương ứng
                            if ($vour_exist['cate_code'] == 1) {
                                $price_discount = $total_price * (1 / $vour_exist['discount']);
                                $price_new = $total_price - $price_discount;
                            } else {
                                // giảm tiền
                                $price_new = $total_price - $vour_exist['discount'];
                            }
                        }
                    } else {
                        $err = 'Mã giảm giá không chính xác hoặc đã hết hiệu lực';
                    }
                }

                // xử lí order
                if (isset($_POST['btn_order'])) {
                    extract($_POST);
                    // nếu tổng tìn trừ giá giảm < 0 thì cho về 0
                    $total_price < 0 ? $total_price = 0 : $total_price;

                    // lấy id ng mua
                    if (isset($_SESSION['admin'])) {
                        $client_id = $_SESSION['admin']['id'];
                    } else {
                        $client_id = $_SESSION['customer']['id'];
                    }
                    // lấy name address từ id--> gán vào 1 biến để insert vào db
                    $district = district_select_id($huyen);
                    $province = province_select_id($tinh);
                    $address = $xa . ', ' . $district . ', ' . $province . ',' . ' --Địa chỉ cụ thể: ' . $address_spec;
                    isset($_POST['note']) ? $note = $_POST['note'] : $note = '';
                    // insert vào oder

                    $time = date('Y-m-d H:i:s');
                    $conn = get_connection();
                    // nếu có mã gg thì lấy giá đã giảm

                    $sql = "INSERT INTO orders(client_id,receiver,total_price,phone,address,note,created_at) VALUES($client_id,'$fullname',$total_price,'$phone','$address','$note','$time')";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    // lấy id vừa insert , insert vào od detail
                    $order_id = $conn->lastInsertId();
                    // lặp ss cart + insert
                    foreach ($_SESSION['cart'] as $item) {
                        orderDetail_insert($order_id, $item['id'], attr_value_select_id($item['color']), attr_value_select_id($item['size']), $item['quantity'], $item['price']);
                    }

                    // ============== xử lí trừ sl mã giảm giá khi ng ta dùng thành công mã===========

                    if (isset($used_voucher)) {
                        $vour_exist = vc_select_code($used_voucher);
                        // nếu dùng vc để mua hàng thành công-> trừ sl vc -1, lưu tt ng dùng vô db
                        vc_update_qty($used_voucher);
                        // insert info user to vc_detali
                        vc_detail_insert($vour_exist['id'], $_SESSION['customer']['id'], date('Y-m-d H:i:s'));
                    }
                    // hủy ss cart sau khi đã đặt hàng tc
                    unset($_SESSION['cart']);


                    header('location: accountClient?action=viewProfileClient&msg=Bạn đã đặt hàng thành công!');
                    die;
                }


                viewClient('layout', ['page' => 'checkout', 'list_cate' => $list_cate, 'list_province' => $province, 'vourchers' => $vourchers, 'errVc' => $err, 'price_new' => $price_new, 'vour_exist' => $vour_exist, 'vocher' => $vocher]);
            endif;

            break;

        case "viewdieukhoan":

            viewClient('layout', ['page' => 'dieukhoan', 'vourchers' => $vourchers, 'list_cate' => $list_cate,]);
            break;




        default:

            break;
    }
}
viewClient('layout', ['page' => 'checkout', 'vourchers' => $vourchers]);
