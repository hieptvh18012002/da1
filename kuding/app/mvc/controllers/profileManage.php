<?php
require_once './app/common/bridge.php';
callModel("productModels");
callModel("categoryModels");

$list_cate = cate_select_all();

viewAdmin("layout",['page'=>'profile','list_cate'=>$list_cate]);