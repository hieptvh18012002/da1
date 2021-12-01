<?php
// add code
function news_insert($title,$shortdesc,$desc,$img_cate,$client_id,$special){
    $sql = "INSERT INTO news (title,shortdesc,content,image,client_id,special) VALUES ('$title','$shortdesc','$desc','$img_cate','$client_id','$special')";
    
    pdo_execute($sql);
}

?>