<?php
require_once "./app/common/bridge.php";
callModel("categoryModels");
callModel("productModels");
callModel("vourcherModels");

$vourchers = vc_select_show();
$list_cate = cate_select_all();



viewClient('layout',['page'=>'album','vourchers'=>$vourchers,'list_cate'=>$list_cate]);