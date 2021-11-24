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
$controller = 'index';
$action = "show";
$params = [];
$url = urlProcess();
// kiểm tra và require controller phù hợp
if (isset($url[0])) {
     // client
     if (file_exists("./app/mvc/controllers/controllerClients/" . $url[0] . ".php")) {
        $controller = $url[0];
        require_once "./app/mvc/controllers/controllerClients/" . $controller . ".php";
        // admin
    } else if (file_exists("./app/mvc/controllers/controllerAdmins/" . $url[0] . "Manage.php")) {
        $controller = $url[0];
        require_once "./app/mvc/controllers/controllerAdmins/" . $controller . "Manage.php";
    } else {
        require_once "./app/mvc/controllers/controllerClients/" . $controller . ".php";
    }
} else {
    require_once "./app/mvc/controllers/controllerClients/" . $controller . ".php";
}
