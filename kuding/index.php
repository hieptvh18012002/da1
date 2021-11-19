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
$action = "index";
$params = [];
$url = urlProcess();
// kiểm tra và require controller phù hợp
if (isset($url[0])) {
    // client
    if (file_exists("./app/mvc/controllers/clientControllers/" . $url[0] . "Controller.php")) {
        $controllers = $url[0];
        require_once "./app/mvc/controllers/clientControllers/" . $controllers . "Controller.php";
        // admin
    } else if (file_exists("./app/mvc//controllers/adminControllers/" . $url[0] . "Controller.php")) {
        $controllers = $url[0];
        require_once "./app/mvc/controllers/adminControllers/" . $controllers . "Controller.php";
    } else {
        require_once "./app/mvc/controllers/clientControllers/" . $controllers . "Controller.php";
    }
} else {
    require_once "./app/mvc/controllers/clientControllers/" . $controllers . "Controller.php";
}
