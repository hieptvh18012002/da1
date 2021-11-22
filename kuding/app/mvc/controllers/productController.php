<?php
require_once './app/common/bridge.php';
callModel("productModels");

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "addProduct":
            viewAdmin("layout",['page'=>'addProduct']);
            break;

            default:
            viewAdmin("layout",['page'=>'listProducts']);

            break;
    }
}
viewAdmin("layout",['page'=>'listProducts']);
