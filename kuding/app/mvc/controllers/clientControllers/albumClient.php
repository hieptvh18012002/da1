<?php
require_once "./app/common/bridge.php";
callModel("categoryModels");
$list_cate = cate_select_all();



viewClient('layout',['page'=>'album','list_cate'=>$list_cate]);