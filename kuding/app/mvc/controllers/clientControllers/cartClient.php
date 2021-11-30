<?php
require_once "./app/common/bridge.php";
callModel("productModels");
callModel("categoryModels");
callModel("addressModels");

$list_cate = cate_select_all();
$province = province_select_all();
// nếu caart empty thì gọi viu empty
// if (!isset($_SESSION['cart']) || $_SESSION['cart'] == '') {
//     viewClient('layout', ['page' => 'cart-empty']);
//     die;
// } else {
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "addCart":

            break;

        case "checkout":

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
            // xử lí address checkout
            if (isset($_GET['districtId'])) {
                echo '<option selected disable>-----Phường xã----</option>';
                $districtId = $_GET['districtId'];
                $ward = pdo_query("SELECT * FROM ward WHERE districtid='$districtId'");
                foreach ($ward as $item) {
                    echo '<option value"' . $item["wardid"] . '">' . $item["name"] . '</option>';
                }
                die;
            }

            viewClient('layout', ['page' => 'checkout', 'list_cate' => $list_cate, 'list_province' => $province]);
            break;
    }
}

viewClient('layout', ['page' => 'cart', 'list_cate' => $list_cate]);
// }
