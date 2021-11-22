<?php
// 

function category_select_all(){
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);

}
function category_select_by_id($category_id){
    $sql = "SELECT * FROM categories WHERE category_id=$category_id" ;
    return pdo_query_one($sql);

}
function category_exits($category_id){
    $sql = "SELECT count(*) FROM categories WHERE category_id=$category_id";
    return pdo_query_value($sql, $category_id) > 0;

}
function category_insert($name, $avatar)
{
    $sql = "INSERT INTO categories(category_name,category_avatar) VALUES('$name','$avatar')";
    pdo_execute($sql);
}
function category_update($id, $category_name, $avatar)
{
    $sql = "UPDATE categories SET category_name='$category_name',category_avatar='$avatar' WHERE category_id=$id";
    pdo_execute($sql);
}
function category_delete($category_id)
{
    $sql = "DELETE FROM product_categories WHERE category_id=$category_id";
    if (is_array($category_id)) {
        foreach ($category_id as $id) {
            pdo_execute($sql);
        }
    } else {
        pdo_execute($sql);
    }
}

function searchCategories($key)
{
    $sql = "SELECT * FROM product_categories WHERE category_name LIKE '%$key%' ORDER BY created_at DESC";
    return pdo_query($sql);
}
// ========== validate form 
function checkAllFormCate($name, $avatar)
{
    if ($name != '' && $avatar != '') {
        return true;
    }
}

function checkAvatarNull($file)
{
    if ($file['size'] < 0) {
        return false;
    }
}
// thốg kê
function showQuantityCate()
{
    $sql = "SELECT lo.category_name, lo.category_id, COUNT(*) quantity, MIN(hh.price) price_min,MAX(hh.price) price_max, AVG(hh.price) price_avg FROM products hh JOIN categories lo ON lo.category_id=hh.category_id GROUP BY lo.category_id, lo.category_name";
    return pdo_query($sql);
}
