<?php
require_once "./app/common/bridge.php";
// check login
if(!isset($_SESSION['admin'])){
    header("location: account");
}else

viewAdmin("layout",['page'=>'index']);