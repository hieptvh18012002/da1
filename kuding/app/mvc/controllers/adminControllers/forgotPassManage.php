<?php
require_once "./app/common/bridge.php";
callModel('accountModels');
callModel('categoryModels');
callModel('productModels');
callModel('displayModels');
callModel('vourcherModels');

$display = display_select_all();
$vourchers = vc_select_show();
$list_cate = cate_select_all();

// handle
$err = array();
$err['email'] = '';
$output = '';
if (isset($_POST['forgot_btn'])) {
    // code
    extract($_POST);

    if ($email == '') {
        $err['email'] = "Vui lòng nhập vào email của bạn đăng kí.";
    } else {
        $qr = pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
        // nếu là ng dùng mới có thể quên mk kiểu này
        if (is_array($qr)) {
            $id = $qr['id'];
            // newpass
            $output = random_string(6);
            // update lại pass mới
            $new_pass = md5($output);
            acc_update_pass($id, $new_pass);
        } else {
            $err['email'] = "Nhập đúng email mà bạn đã đăng kí!";
        }
    }
}
// call view
viewClient('layout', ['page' => 'forgot-pass','display'=>$display, 'list_cate' => $list_cate, 'err' => $err['email'], 'output' => $output,'vourchers'=>$vourchers]);
