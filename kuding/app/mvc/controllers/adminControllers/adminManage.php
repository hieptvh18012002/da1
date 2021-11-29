<?php
require_once "./app/common/bridge.php";

if (!isset($_SESSION['admin'])) {
    header("location: account?action=loginAdmin");
} else
//  xử lí thống kê render ra index admin

    viewAdmin("layout", ['page' => 'index']);
