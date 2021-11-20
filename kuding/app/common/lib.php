<?php
function callModel($model)
{
    require_once "./app/mvc/models/" . $model . ".php";
}
function viewClient($view, $data = [])//$data để gọi page con
{
    require_once "./app/mvc/views/viewClients/" . $view . ".php";
}
function viewAdmin($view, $data = [])//$data để gọi page con
{
    require_once "./app/mvc/views/viewAdmins/" . $view . ".php";
}

// save_value
function save_value($label_field) {
    // hai dấu $ để khai báo chuỗi $label
    global $$label_field;
    if (isset($$label_field))
        echo $$label_field;
}
