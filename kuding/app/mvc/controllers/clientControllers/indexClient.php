<?php
require_once "./app/common/bridge.php";
callModel('categoryModels');
callModel('productModels');
callModel('vourcherModels');
//  xử lý tìm kiếm, ...
$list_cate = cate_select_all();
$pro_top10 = pro_select_top10();
$pro_topview = pro_select_view();
// sp đặc biệt để hiển thị 
$pro_special = pro_select_special();
// lấy vourcher
$vourchers = vc_select_show();
if(isset($_GET['action'])){
    switch($_GET['action']){
        
            default:
                viewClient('layout',['page'=>'homepage','pro_special'=>$pro_special]);
            break;
    }
}else
viewClient('layout',['page'=>'homepage','list_cate'=>$list_cate,'pro_special'=>$pro_special,'vourchers'=>$vourchers,'pro_top10'=>$pro_top10,'pro_topview'=>$pro_topview]);
