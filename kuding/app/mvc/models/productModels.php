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
function pro_img_select_by_id($id)
{
    $sql = "SELECT * FROM pro_imgs WHERE pro_id=$id";
    return pdo_query($sql);
}

// attr
function attr_select_all(){
    $sql = "SELECT * FROM attributes";
    return pdo_query($sql);
}
function attr_id_select_all(){
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT id FROM attributes");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function size_select_all(){
    $sql = "SELECT * FROM attr_values WHERE attr_id=2";
    return pdo_query($sql);
}
function color_select_all(){
    $sql = "SELECT * FROM attr_values WHERE attr_id=1";
    return pdo_query($sql);
}
function attr_value_select_all(){
    $sql = "SELECT * FROM attr_values";
    return pdo_query($sql);
}
// lấy value attr pro
function color_select_pro($id_pro){
    $sql = "SELECT value_id FROM pro_attributes WHERE pro_id=$id_pro AND attr_id=2";
    return pdo_query($sql);
}
function size_select_pro($id_pro){
    $sql = "SELECT value_id FROM pro_attributes WHERE pro_id=$id_pro AND attr_id=1";
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

function pro_img_insert($url,$pro_id)
{
    $sql = "INSERT INTO pro_imgs (url,pro_id) VALUES('$url','$pro_id')";
    pdo_execute($sql);
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
function attr_value_insert($attr_id,$value){
    $sql = "INSERT INTO attr_values (attr_id,value) VALUES($attr_id,'$value')";
    pdo_execute($sql);
}
// add attr
function attr_insert($value){
    $sql = "INSERT INTO attributes (name) VALUES('$value')";
    pdo_execute($sql);
}

// lấy value value từ pro_attr
function get_value_pro(){

}

function product_update($id,$name,$cate,$price,$discount,$image,$description)
{
    $sql = "UPDATE products SET name='$name',cate_id='$cate',price='$price',discount='$discount',avatar='$image',description='$description' WHERE id=$id";
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
function pro_img_del($id){
    $sql = "DELETE FROM pro_imgs WHERE pro_id='$id'";
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


