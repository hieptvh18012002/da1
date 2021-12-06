<?php
require_once './app/common/bridge.php';

// dd
$display = display_select_all();
// lấy list
$vourchers = vc_select_show();

$list_cate = cate_select_all();
$size_values = size_select_all();
$color_values = color_select_all();

$err = array();

$msg = '';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {      
        case "":

            break;
        

        
    }
}
viewClient("layout", ['page' => 'favorite', 'display'=>$display, 'list_cate' => $list_cate,'vourchers' => $vourchers]);