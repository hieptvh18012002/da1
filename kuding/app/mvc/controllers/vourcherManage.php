<?php

require_once "./app/common/bridge.php";

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "add":

            viewAdmin('layout',['page'=>'addVourcher']);
            break;
    }
}
viewAdmin('layout',['page'=>'listVourcher']);