<?php

function favo_insert($pro_id,$client_id){
    $sql = "INSERT INTO pro_favorites SET pro_id=$pro_id,client_id=$client_id";
    pdo_execute($sql);
}
function favo_select_client($client){
    $sql = "SELECT p.name,pv.id,p.price,p.avatar FROM pro_favorites pv JOIN products p ON p.id=pv.pro_id WHERE pv.client_id=$client";
    return pdo_query($sql);
}
function favo_del($client_id,$pro_id){
    
}
