<?php
require_once "./app/common/bridge.php";
callModel("categoryModels");
callModel("productModels");
callModel("addressModels");
callModel("orderModels");
callModel("vourcherModels");
// lấy tỉnh
$province = province_select_all();
$list_cate = cate_select_all();

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
                 if(isset($_POST['btn_apply'])){
                    extract($_POST);
                    // so khớp mã code input vs code có hợp lệ
                    $vour_exist = vc_select_code($vocher);
                    if(is_array($vour_exist)){
                        // check loại giảm và giam tương ứng
                        if($vour_exist['cate_code'] == 1){
                            $price_new = $total_price*(1/$vour_exist['discount']);
                        }else{
                            // giảm tiền
                            $price_new = $total_price - $vour_exist['discount'];
                        }

                    }else{
                        $err = 'Mã giảm giá không chính xác hoặc đã hết hiệu lực';
                    }
                    // sau khi trừ -> tổng tiền mới ra mh
                    // ============== xử lí trừ sl mã giảm giá khi ng ta dùng thành công mã===========
                    // code...
                }
                // xử lí order
                if (isset($_POST['btn_order'])) {
                    extract($_POST);

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
                    // hủy ss cart sau khi đã đặt hàng tc
                    unset($_SESSION['cart']);
                    header('location: accountClient?action=viewProfileClient&msg=Bạn đã đặt hàng thành công!');
                    die;
                }
               

                viewClient('layout', ['page' => 'checkout', 'list_cate' => $list_cate, 'list_province' => $province,'errVc'=>$err,'price_new'=>$price_new]);
            endif;

            break;

        case "viewdieukhoan":

            viewClient('layout', ['page' => 'dieukhoan', 'list_cate' => $list_cate,]);
            break;




        default:

            break;
    }
}
viewClient('layout', ['page' => 'checkout']);
