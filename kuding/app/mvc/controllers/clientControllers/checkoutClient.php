<?php
require_once "./app/common/bridge.php";
callModel("categoryModels");
callModel("productModels");
callModel("addressModels");
// lấy tỉnh
$province = province_select_all();
$list_cate = cate_select_all();
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
                // xử lí order
                if (isset($_POST['btn_order'])) {
                    extract($_POST);

                    
                }

                viewClient('layout', ['page' => 'checkout', 'list_cate' => $list_cate, 'list_province' => $province]);
            endif;

            break;

            case "viewdieukhoan":

                viewClient('layout',['page'=>'dieukhoan','list_cate' => $list_cate,]);
                break;




        default:

            break;
    }
}
viewClient('layout', ['page' => 'checkout']);
