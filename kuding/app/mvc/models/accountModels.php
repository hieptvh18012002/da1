<?php

// select 
function acc_select_all(){
    $sql = "SELECT * FROM accounts ORDER BY created_at DESC";
    return pdo_query($sql);
}
function acc_select_by_email($e){
    $sql = "SELECT * FROM accounts WHERE email='$e'";
    return pdo_query_one($sql);
}
//  insert
function acc_insert($name,$birthday,$email,$pass,$role_id,$gender){
    $sql = "INSERT INTO accounts (fullname,birthday,email,password,role_id,gender) VALUES('$name','$birthday','$email','$pass','$role_id','$gender')";
    pdo_execute($sql);
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