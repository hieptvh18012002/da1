<?php

require_once "./app/common/bridge.php";


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "list":

            viewAdmin('layout',['page'=>'listNews']);
            break;
            case "add":
                if(isset($_POST['btn'])){
                    // 
                    $msg = "success";
                }
                viewAdmin('layout',['page'=>'addNews','msg'=>$msg]);
            break;
        default:

            break;
    }
}
