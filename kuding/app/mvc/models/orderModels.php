<?php
// orders
function order_select_all()
{
    $sql  = "SELECT cl.fullname ,o.* FROM orders o
    INNER JOIN accounts cl ON o.client_id=cl.id ORDER BY o.created_at DESC";
    return pdo_query($sql);
}

function orderDetail_select_by_id($id)
{
    $sql  = "SELECT cl.fullname ,p.product_name,p.product_avatar,dt.* FROM order_detail dt INNER JOIN product_lists p ON p.product_id=dt.product_id JOIN orders o ON o.order_id=dt.order_id JOIN clients cl ON cl.client_id=o.client_id WHERE dt.order_id=$id ORDER BY o.created_at DESC";
    return pdo_query($sql);
}

function order_insert($client_id, $total, $phone, $address,$note, $created_at)
{
    $sql = "INSERT INTO orders(client_id,total_price,phone,address,note,created_at) VALUES($client_id,$total,'$phone','$address','$note','$created_at')";
    pdo_execute($sql);
}

function order_update_status($id,$status){
    $sql = "UPDATE orders SET status=$status WHERE order_id=$id";
    pdo_execute($sql);
}
// ============order detail
function orderDetail_insert($order_id,$pro_id	,$color,$size	,$quantity ,$price)
{
    $sql = "INSERT INTO order_details(order_id,pro_id,color,size,quantity,price) VALUES($order_id,$pro_id,'$color','$size',$quantity ,$price)";
    pdo_execute($sql);
}
