<?php

// select 
function acc_select_by_email($e){
    $sql = "SELECT * FROM accounts WHERE email='$e'";
    return pdo_query_one($sql);
}

// random quên mật khẩu
function random_string($length)
{
    $str = '';
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }
    return $str;
}