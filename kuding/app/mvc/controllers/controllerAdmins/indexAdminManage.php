<?php
require_once "./app/common/bridge.php";
// check login
if(!isset($_SESSION['admin'])){
    header("location: account?action=loginAdmin");
}else

viewAdmin("layout",['page'=>'index']);