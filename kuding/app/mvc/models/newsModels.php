<?php
// add code
function news_insert($title,$shortdesc,$desc,$img_cate,$client_id,$special){
    $sql = "INSERT INTO news (title,shortdesc,content,image,client_id,special) VALUES ('$title','$shortdesc','$desc','$img_cate','$client_id','$special')";
    
    pdo_execute($sql);
}

function news_select_all(){
    $sql = "SELECT * FROM news ORDER BY created_at ASC";
    return pdo_query($sql);
}

function news_select_created_at(){
    $sql = "SELECT * FROM news ORDER BY created_at DESC LIMIT 0,4";
    return pdo_query($sql);
}

function news_select_by_id($id){
    $sql = "SELECT * FROM news WHERE id=$id ORDER BY created_at DESC LIMIT 0,4";
    return pdo_query_one($sql);
}


?>