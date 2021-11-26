<?php
function product_select_all()
{
    $sql = "SELECT p.id pro_id,p.name as pr_name,p.price,p.discount,p.avatar,p.description,p.status,c.name as ca_name FROM products p INNER JOIN categories c ON p.cate_id = c.id ORDER BY p.created_at DESC";
    return pdo_query($sql);
}
function product_select_by_id($id)
{
    $sql = "SELECT * FROM products WHERE id=$id";
    return pdo_query_one($sql);
}
// attr
function size_select_all(){
    $sql = "SELECT * FROM size_values";
    return pdo_query($sql);
}
function color_select_all(){
    $sql = "SELECT * FROM color_values";
    return pdo_query($sql);
}
// 
function pro_select_color($pro_id,$attr_id,$value_id){
    $sql = "SELECT * FROM color_values";
    return pdo_query($sql);
}

function product_select_by_category($id)
{
    $sql = "SELECT * FROM products WHERE cate_id=$id ORDER BY created_at DESC";
    return pdo_query($sql);
}
function product_exits($id)
{
    $sql = "SELECT count(*) FROM products WHERE product_id=$id";
    return pdo_query_value($sql, $id) > 0;
}
function searchProducts($key)
{
    $sql = "SELECT * FROM products pl JOIN product_categories pc ON pl.category_id=pc.category_id WHERE special=0 AND pl.product_name  LIKE '%$key%'  OR pc.category_name LIKE '%$key%' ORDER BY pl.created_at DESC";
    return pdo_query($sql);
}
// sp liên quan -> sp cùng danh mục
function relateProduct($cate_id)
{
    $sql = "SELECT * FROM product_lists pl INNER JOIN products pc ON pl.category_id=pc.category_id WHERE pc.category_id=$cate_id
    ORDER BY pl.created_at DESC LIMIT 0,5";
    return pdo_query($sql);
}

// select top 10

function showFavoriteProduct()
{
    $sql = "SELECT * FROM products WHERE special=0 ORDER BY view DESC LIMIT 0,10";
    return pdo_query($sql);
}

function product_insert($name,$cate,$price,$avatar,$description)
{
    $sql = "INSERT INTO products (name,cate_id,price,avatar,description) VALUES('$name',$cate,$price,'$avatar','$description')";
    pdo_execute($sql);
}
// add pro_attribute
function pro_attr_insert($pro_id,$attr_id,$value_id){
    $sql = "INSERT INTO pro_attributes (pro_id,attr_id,value_id) VALUES($pro_id,$attr_id,$value_id)";
    pdo_execute($sql);
}
// lấy value attr từ value
function get_value_color($pro_id,$color_id){
    $sql = "SELECT c.id,c.value FROM `pro_attributes` p JOIN attributes a ON a.id=p.attr_id JOIN color_values c ON a.id=c.attr_id WHERE p.pro_id=$pro_id AND c.id=$color_id";
    return pdo_query($sql);
}
function get_value_size($pro_id,$size_id){
    $sql = "SELECT c.id,c.value FROM `pro_attributes` p JOIN attributes a ON a.id=p.attr_id JOIN color_values c ON a.id=c.attr_id WHERE p.pro_id=$pro_id AND c.id=$size_id
    ";
    return pdo_query($sql);
}


function product_update($id, $name, $price, $sale, $quantity, $avatar, $color, $battery, $description, $cate_id, $status)
{
    $sql = "UPDATE products SET product_name='$name',price='$price',sales='$sale',quantity='$quantity',product_avatar='$avatar',color='$color',battery='$battery',description='$description',category_id='$cate_id',status=$status WHERE product_id=$id";
    pdo_execute($sql);
}
function product_delete($id)
{
    if (is_array($id)) {
        foreach ($id as $id) {
            $sql = "DELETE FROM products WHERE id='$id'";
            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM products WHERE id='$id'";
        pdo_execute($sql);
    }
}
function pro_attr_del($id){
    $sql = "DELETE FROM pro_attributes WHERE pro_id='$id'";
    pdo_execute($sql);
}

function load_all_product()
{
    $sql = "SELECT * FROM `products` INNER JOIN product_categories ON products.category_id = product_categories.category_id WHERE special=0 ORDER BY products.product_id DESC";
    return pdo_query($sql);
}
function load_product_by_id($id)
{
    $sql = "SELECT product_categories.category_name, products.* FROM `products`  INNER JOIN product_categories ON products.category_id = product_categories.category_id WHERE product_categories.category_id='$id' AND special=0 ORDER BY products.product_id DESC";
    return pdo_query($sql);
}
// ad
function load_all_product_admin()
{
    $sql = "SELECT * FROM `products` INNER JOIN product_categories ON products.category_id = product_categories.category_id ORDER BY products.product_id DESC ";
    return pdo_query($sql);
}
function load_product_by_id_admin($id)
{
    $sql = "SELECT * FROM `products`  INNER JOIN product_categories ON products.category_id = product_categories.category_id WHERE product_categories.category_id='$id' ORDER BY products.product_id DESC ";
    return pdo_query($sql);
}


