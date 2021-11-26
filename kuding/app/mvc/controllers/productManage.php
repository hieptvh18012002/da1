<?php
require_once './app/common/bridge.php';
callModel("productModels");
callModel("categoryModels");

$list_cate = cate_select_all();
$list_pro = product_select_all();
$size_values = size_select_all();
$color_values = color_select_all();

$err = array();
$err['img'] = '';
$err['imgs'] = '';
$msg = '';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "filter_pro_admin":
            $cate_id = $_GET['categories'];
            $output = '';
            if ($cate_id == '') {
                $all_pro = product_select_all();
                // var_dump($result);die;
                $n = 1;
                foreach ($all_pro as $item) :
                    $output = '
                    <tr>
                        <td>' . $n . '</td>
                        <td>' . $item['pr_name'] . '</td>
                        <td>' . $item['ca_name'] . '</td>
                        <td>' . $item['price'] . ' vnd</td>
                        <td><img src="./public/images/products/' . $item['avatar'] . '" alt=""></td>
                        <td>' . $item['discount'] . 'vnd</td>
                        <td>' . substr($item['description'], 1, 100) . '</td>
                        <td>' . $item['status'] . '</td>
                        <td>
                            <a href="product?action=update"><i class="fas fa-pen-square text-warning fa-2x "></i></a>
                            <a href="product?action=del" onclick="return confirm(' . 'Bạn chắc chắn muốn xóa sản phẩm?' . ')"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>
                        </td>
                    </tr>';
                    $n++;
                endforeach;
            } else {
                $pro_by_cate = product_select_by_category($cate_id);
                // lấy pro by id cate rôi push ra ds
                $conn = get_connection();
                $stmt = $conn->prepare("SELECT p.id pro_id,p.name as pr_name,p.price,p.discount,p.avatar,p.description,p.status,c.name as ca_name FROM products p INNER JOIN categories c ON p.cate_id = c.id WHERE p.cate_id=$cate_id ORDER BY p.created_at DESC ");
                $stmt->execute();
                $result = $stmt->fetchAll();
                $row = $stmt->rowCount();
                // var_dump($result);die;
                // if row>0 -> echo
                if ($row > 0) {
                    $n = 1;
                    foreach ($result as $item) :
                        $output .= ' <tr>
                        <td>' . $n . ';</td>
                        <td>' . $item['pr_name'] . '</td>
                        <td>' . $item['ca_name'] . '</td>
                        <td>' . $item['price'] . ' vnd</td>
                        <td><img src="./public/images/products/' . $item['avatar'] . '" alt=""></td>
                        <td>' . $item['discount'] . 'vnd</td>
                        <td>' . substr($item['description'], 1, 100) . '</td>
                        <td>
                            ' . $item['status'] . '
                        </td>
                        <td>
                            <a href="product?action=update&id=' . $item['pro_id'] . '"><i class="fas fa-pen-square text-warning fa-2x "></i></a>
                            <a href="product?action=del&id=' . $item['pro_id'] . '" onclick="return confirm(' . 'Bạn chắc chắn muốn xóa sản phẩm?' . ')"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>
                        </td>
                    </tr>
                ';
                        $n++;
                    endforeach;
                } else {
                    $output = "Hết hàng";
                }
            }
            echo $output;
            die;
            break;
        case "addProduct":
            if (isset($_POST['btn_add'])) {
                extract($_POST);
                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['avatar'];
                if ($file['size'] != 0) {
                    if ($file['size'] > 2097152) {
                        $err['img'] = 'Chỉ cho phép tải ảnh dưới 2mb!';
                    } else {
                        $avatar = $file['name'];
                        $ext = pathinfo($avatar, PATHINFO_EXTENSION);
                        if (!in_array($ext, $ext_img)) {
                            $err['img'] = 'Ảnh tải lên phải là jpg, png hoặc jpeg';
                        }
                    }
                } else {
                    $err['img'] = "Ảnh chưa tải lên";
                }
                // ktra ảnh ct
                if ($_FILES['avatars']['size'] <= 0) {
                    $err['imgs'] = "Tải ít nhất 1 ảnh chi tiết";
                }
                // thêm sp
                if (!array_filter($err)) {
                    $created_at = date("Y-m-d H:i:s");
                    // insert tbl products
                    move_uploaded_file($file['tmp_name'], "./public/images/products/" . $avatar);
                    $conn = get_connection();
                    $stmt = $conn->prepare("INSERT INTO products (name,cate_id,price,avatar,description,created_at) VALUES('$name',$category,$price,'$avatar','$desc','$created_at')");
                    $stmt->execute();
                    // lấy id vừa insert
                    $id_pro = $conn->lastInsertId();
                    // -- insert pro_attribute
                    // lặp value and isert 2
                    foreach ($size as $s) {
                        pro_attr_insert($id_pro, 2, $s);
                    }
                    foreach ($color as $c) {
                        pro_attr_insert($id_pro, 1, $s);
                    }
                    // add nhiều ảnh
                    $files = $_FILES['avatars'];
                    $file_names = $files['name'];
                    //    lặp + up 
                    foreach ($file_names as $key => $item) {
                        move_uploaded_file($files['tmp_name'][$key], "./public/images/products/" . $item);
                    }
                    // insert pro_img
                    foreach ($file_names as $item) {
                        pro_img_insert($item, $id_pro);
                    }
                    $msg = "Thêm thành công sản phẩm";
                    // nếu k có err thì insert
                }
            }
            viewAdmin("layout", ['page' => 'addProduct', 'list_cate' => $list_cate, 'errImg' => $err, 'errImgs' => $err['imgs'], 'errImg' => $err['img'], 'size_values' => $size_values, 'color_values' => $color_values, 'msg' => $msg]);
            break;

        case "update":
            $pros = product_select_by_id($_GET['id']);
            $id = $_GET['id'];
            // lấy value của thuộc tính sp tương ứng;

            if (isset($_POST['btn_update'])) {
                extract($_POST);
                // code update
            }
            viewAdmin('layout', ['page' => 'updateProduct', 'pros' => $pros, 'list_cate' => $list_cate, 'size_values' => $size_values, 'color_values' => $color_values]);
            break;
        case "del":
            $pros = product_select_by_id($_GET['id']);
            // xóa sp
            product_delete($_GET['id']);
            unlink("./public/images/products/" . $pros['avatar']);
            // xóa attr sp
            pro_attr_del($_GET['id']);
            // xóa ảnh detail
            pro_img_del($_GET['id']);
            header('Location: product?msg=Xóa thành công sản phẩm');
            break;
            // attr
        case "addAttrProduct":
            $attrs = attr_select_all();
            // code add attr
            viewAdmin('layout', ['page' => 'addAttr', 'attrs' => $attrs]);
            die;
            break;
        case "viewListProduct":
            viewClient('layout', ['page' => 'product']);
            die;
            break;
        case "viewProductDetail":
            viewClient('layout', ['page' => 'product-details']);
            die;
            break;
        case "viewFavorite":
            // code sản phẩm yêu thích
            // nếu là khách thì lưu vào session >< đã đang nhập thì lưu db

            viewClient('layout', ['page' => 'favorite']);
            die;
            break;
    }
}
viewAdmin("layout", ['page' => 'listProducts', 'list_pro' => $list_pro, 'list_cate' => $list_cate]);
