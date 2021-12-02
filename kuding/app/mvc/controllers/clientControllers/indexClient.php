<?php
require_once "./app/common/bridge.php";
callModel('categoryModels');
callModel('productModels');
callModel('vourcherModels');
callModel("vourcherModels");
//  xử lý tìm kiếm, ...
$list_cate = cate_select_all();
$pro_top10 = pro_select_top10();
$pro_topview = pro_select_view();
// lấy list
$list_vour = vc_select_all();
// sp đặc biệt để hiển thị 
$pro_special = pro_select_special();
// lấy vourcher
$vourchers = vc_select_show();
// xử lí nếu hết hạn thì update status -> 0
foreach ($list_vour as $vc) {
    // lặp + ktra nêú ngày hết hạn mã >= ngày hiện tại-> update hết hạn
    if (strtotime($vc['expired_date']) <= strtotime(date('Y-m-d h:i:s', time()))) {
        // update tình trạng về hết hiệu lực
        vc_update_status($vc['id'], 0);
    }
    // nếu số lượng =0 thì cập nhật status = 0;
    if ($vc['quantity'] == 0) {
        vc_update_status($vc['id'], 0);
    }
}
if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        default:
            viewClient('layout', ['page' => 'homepage', 'pro_special' => $pro_special]);
            break;
    }
} else
    viewClient('layout', ['page' => 'homepage', 'list_cate' => $list_cate, 'pro_special' => $pro_special, 'vourchers' => $vourchers, 'pro_top10' => $pro_top10, 'pro_topview' => $pro_topview]);
