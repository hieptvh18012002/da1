<?php
require_once "./app/common/bridge.php";

$display = display_select_all();
$vourchers = vc_select_show();
$list_cate = cate_select_all();



viewClient('layout',['page'=>'album','vourchers'=>$vourchers,'list_cate'=>$list_cate,'display'=>$display]);