<?php
// prf admin
require_once './app/common/bridge.php';
callModel("productModels");
callModel("categoryModels");

$list_cate = cate_select_all();
// update info
if(isset($_POST['btnUpdate'])){
    extract($_POST);
    $pass = md5($password);
    acc_update($id,$fullname, $birthday, $pass, $role, $gender,$phone);
    header('location: profile?msg=Cập nhật thành công tài khoản!');
}
if(isset($_POST['btnChangePass'])){
    
}
viewAdmin("layout",['page'=>'profile','list_cate'=>$list_cate]);