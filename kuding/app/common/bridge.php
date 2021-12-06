<?php
require_once "./app/common/db.php";
require_once "./app/common/lib.php";

callModel('categoryModels');
callModel('productModels');
callModel('vourcherModels');
callModel("newsModels");
callModel("displayModels");
callModel("addressModels");
callModel("commentModels");
callModel("orderModels");
callModel("accountModels");