<?php
require_once "./app/common/bridge.php";
callModel("categoryModels");
callModel("productModels");
callModel("vourcherModels");
callModel("displayModels");

// dd
$display = display_select_all();
$vourchers = vc_select_show();
$list_cate = cate_select_all();



viewClient('layout',['page'=>'album','vourchers'=>$vourchers,'display'=>$display,'list_cate'=>$list_cate]);