<?php
require_once "./app/common/bridge.php";
callModel("categoryModels");
callModel("newsModels");
callModel("productModels");
$list_cate = cate_select_all();

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "viewDetail":

            viewClient('layout',['page'=>'post','list_cate'=>$list_cate]);
            break;
    }
}

viewClient("layout",['page'=>'list-news','list_cate'=>$list_cate]);