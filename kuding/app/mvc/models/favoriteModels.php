<?php

function favo_insert($pro_id,$client_id){
    $sql = "INSERT INTO pro_favorites SET pro_id=$pro_id,client_id=$client_id";
    pdo_execute($sql);
}
// function favo_select_client(){
//     $sql = "SELECT  pro_favorites SET pro_id=$pro_id,client_id=$client_id";
//     pdo_query($sql);
// }
function favo_del($client_id,$pro_id){
    
}
