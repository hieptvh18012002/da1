<?php
require_once "./app/common/bridge.php";
callModel('categoryModels');
callModel('productModels');
//  xử lý tìm kiếm, ...
$list_cate = cate_select_all();
if(isset($_GET['action'])){
    switch($_GET['action']){
        

            default:
                viewClient('layout',['page'=>'homepage']);
            break;
    }
}else
viewClient('layout',['page'=>'homepage','list_cate'=>$list_cate]);

