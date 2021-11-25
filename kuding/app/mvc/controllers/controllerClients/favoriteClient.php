<?php
require_once './app/common/bridge.php';
callModel('productModels');


viewClient('layout',['page'=>'favorite']);