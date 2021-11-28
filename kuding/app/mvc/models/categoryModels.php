<?php
// 

function cate_select_all(){
    $sql = "SELECT * FROM categories
    ";
    return pdo_query($sql);
}
function category_select_all(){
    $sql = "SELECT * FROM categories
    ";
    // SELECT c.name,c.avatar, COUNT(p.id) qty FROM categories c JOIN products p ON p.cate_id=c.id GROUP BY c.name,c.avatar
    return pdo_query($sql);

}
function category_select_by_id($category_id){
    $sql = "SELECT * FROM categories WHERE id=$category_id" ;
    return pdo_query_one($sql);

}
function category_exits($category_id){
    $sql = "SELECT count(*) FROM categories WHERE id=$category_id";
    return pdo_query_value($sql, $category_id) > 0;

}
function category_insert($name, $avatar)
{
    $sql = "INSERT INTO categories(name,avatar) VALUES('$name','$avatar')";
    pdo_execute($sql);
}
function category_update($id, $category_name, $avatar)
{
    $sql = "UPDATE categories SET name='$category_name',avatar='$avatar' WHERE id=$id";
    pdo_execute($sql);
}
function category_delete($category_id)
{
    $sql = "DELETE FROM categories WHERE id=$category_id";
    if (is_array($category_id)) {
        foreach ($category_id as $id) {
            pdo_execute($sql);
        }
    } else {
        pdo_execute($sql);
    }
}


