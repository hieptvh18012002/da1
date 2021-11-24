<?php
require_once "./app/common/bridge.php";
callModel('categoryModels');
$list_cate = category_select_all();

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "addCategory":

            viewAdmin('layout',['page'=>'addCategories']);
            break;
    }
}


viewAdmin('layout',['page'=>'listCategories','list_cate'=>$list_cate]);