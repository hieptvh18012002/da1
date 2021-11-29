<?php

// add code
function vc_insert($name,$code,$discount,$quantity,$cate_code,$active_date,$expired_date){
    $sql = "INSERT INTO vourchers (name,code,discount,quantity,cate_code,active_date,expired_date) VALUES ('$name','$code',$discount,$quantity,$cate_code,'$active_date','$expired_date')";
    pdo_execute($sql);
}
// update
function vc_update_status($id,$status){
    $sql = "UPDATE vourchers SET status=$status WHERE id=$id";
    pdo_execute($sql);
}


// select

function vc_select_all(){
    $sql = "SELECT * FROM vourchers ORDER BY active_date DESC";

    return pdo_query($sql);
}
// lấy 2 vc hiển thị banner
function vc_select_show(){
    $sql = "SELECT * FROM vourchers WHERE status=1 ORDER BY active_date DESC LIMIT 0,2";

    return pdo_query($sql);
}

function vc_select_code($code){
    $sql = "SELECT * FROM vourchers WHERE code='$code'";

    return pdo_query_one($sql);
}

// del

function vc_del($id){
    $sql = "DELETE FROM vourchers WHERE id=$id";
    pdo_execute($sql);
}

