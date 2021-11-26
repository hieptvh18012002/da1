<?php
require_once "./app/common/bridge.php";
//  xử lý tìm kiếm, ...

if(isset($_GET['action'])){
    switch($_GET['action']){
        

            default:
                viewClient('layout',['page'=>'homepage']);
            break;
    }
}else
viewClient('layout',['page'=>'homepage']);

