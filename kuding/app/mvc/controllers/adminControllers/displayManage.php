<?php
require_once "./app/common/bridge.php";

callModel("displayModels");


viewAdmin('layout',['page'=>'display']);
