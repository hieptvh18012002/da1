<?php
require_once "./app/common/bridge.php";
callModel('categoryModels');
callModel('productModels');
//  xử lý tìm kiếm, ...
$list_cate = cate_select_all();
// sp đặc biệt để hiển thị 
$pro_special = pro_select_special();
if(isset($_GET['action'])){
    switch($_GET['action']){
        

            default:
                viewClient('layout',['page'=>'homepage','pro_special'=>$pro_special]);
            break;
    }
}else
viewClient('layout',['page'=>'homepage','list_cate'=>$list_cate,'pro_special'=>$pro_special]);

