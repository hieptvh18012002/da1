<?php
require_once "./app/common/bridge.php";
callModel('productModels');

// code

viewClient('layout',['page'=>'homepage']);