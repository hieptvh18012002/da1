<?php
require_once "./app/common/bridge.php";

$display = display_select_all();
$list_cate = cate_select_all();
$vourchers = vc_select_show();
// list news
$list_news = news_select_all();
$list_news_new = news_select_created_at();


if(isset($_GET['action'])){
    switch($_GET['action']){
        case "viewDetail":
            $news_detail = news_select_by_id($_GET['id']);

            
            viewClient('layout',['page'=>'post','vourchers'=>$vourchers,'list_cate'=>$list_cate,'news_detail'=>$news_detail,'display'=>$display]);
            break;
    }
}

viewClient("layout",['page'=>'list-news','list_cate'=>$list_cate,'list_news'=>$list_news,'list_news_new'=>$list_news_new,'vourchers'=>$vourchers,'display'=>$display]);