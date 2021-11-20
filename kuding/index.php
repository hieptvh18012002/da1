<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// xử lí request url

function urlProcess()
{
    if (isset($_GET['url'])) {
        return explode('/', trim($_GET['url']));
    }
}
$controllers = 'index';
$action = "show";
$params = [];
$url = urlProcess();
// kiểm tra và require controller phù hợp
if (isset($url[0])) {
    // client
    if (file_exists("./app/mvc/controllers/" . $url[0] . "Controller.php")) {
        $controllers = $url[0];
        require_once "./app/mvc/controllers/" . $controllers . "Controller.php";
    } else {
        require_once "./app/mvc/controllers/" . $controllers . "Controller.php";
    }
} else {
    require_once "./app/mvc/controllers/" . $controllers . "Controller.php";
}
