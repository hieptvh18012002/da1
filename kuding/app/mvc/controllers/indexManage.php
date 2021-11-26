<?php
require_once "./app/common/bridge.php";
// check login

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "indexAdmin":
            if(!isset($_SESSION['admin'])){
                header("location: account?action=loginAdmin");
            }else
            viewAdmin("layout",['page'=>'index']);

            break;

            default:
                viewClient('layout',['page'=>'homepage']);
            break;
    }
}else
viewClient('layout',['page'=>'homepage']);

