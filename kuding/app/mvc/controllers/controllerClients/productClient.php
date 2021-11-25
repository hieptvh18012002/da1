<?php

require_once "./app/common/bridge.php";
callModel("productModels");

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "viewProductDetail":

            viewClient('layout',['page'=>'product-details']);
            break;
    }
}


viewClient("layout",['page'=>'product']);