<?php

require_once "./app/common/bridge.php";


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "list":

            viewAdmin('layout',['page'=>'listNews']);
            break;
            case "add":
                
                viewAdmin('layout',['page'=>'addNews']);
            break;
        default:

            break;
    }
}
