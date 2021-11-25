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
$msg = '';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "filter_pro_admin":
            $cate_id = $_GET['categories'];
            $output = '';
            $result = "";
            if ($cate_id == '') {
                $result = product_select_all();
                // var_dump($result);die;
                $n = 1;
                foreach ($result as $item) :
                    $output .= '
                    <tr>
                        <td>' . $n . ';</td>
                        <td>' . $item['pr_name'] . '</td>
                        <td>' . $item['ca_name'] . '</td>
                        <td>'.$item['price'].' vnd</td>
                        <td><img src="./public/images/products/' . $item['avatar'] . '" alt=""></td>
                        <td>'.$item['discount'].'vnd</td>
                        <td>'.substr($item['description'],1,100).'</td>
                        
                        <td>
                            <a href="#update"><i class="fas fa-pen-square text-warning fa-2x "></i></a>
                            <a href="#del" onclick="return confirm(' . 'Bạn chắc chắn muốn xóa sản phẩm?' . ')"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>
                        </td>
                    </tr>
            ';
                    $n++;
                endforeach;
            } else {

                $pro_by_cate = product_select_by_category($cate_id);
                // lấy pro by id cate rôi push ra ds
                $conn = get_connection();
                $stmt = $conn->prepare("SELECT * FROM products WHERE cate_id=$cate_id ORDER BY created_at DESC");
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
                        <td>' . $item['name'] . '</td>
                        <td>' . $item['name'] . '</td>
                        <td>number_format(' . $item['price'] . ',0,' . ',' . ',' . ') vnd</td>
                        <td><img src="./public/images/products/' . $item['avatar'] . '" alt=""></td>
                        <td>number_format(' . $item['discount'] . ',0,' . ',' . ',' . ')vnd</td>
                        <td>substr(' . $item['description'] . ',1,100)</td>
                        <td>
                            <?php if (' . $item['status'] . ' == 0) : ?>
                                <label class="badge badge-danger">Hết hàng</label>
                            <?php else : ?>
                                <label class="badge badge-success">Còn hàng</label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="#update"><i class="fas fa-pen-square text-warning fa-2x "></i></a>
                            <a href="#del" onclick="return confirm(' . 'Bạn chắc chắn muốn xóa sản phẩm?' . ')"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>
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
                // insert
                // var_dump($name,$price,$category,$avatar,$desc);die;

                if (!array_filter($err)) {
                    $created_at = date("Y-m-d H:i:s");
                    // insert tbl products
                    move_uploaded_file($_FILES['avatar']['tmp_name'], "./public/images/products/" . $avatar);
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
                    $msg = "Thêm thành công sản phẩm";
                }
            }
            viewAdmin("layout", ['page' => 'addProduct', 'list_cate' => $list_cate, 'errImg' => $err['img'], 'size_values' => $size_values, 'color_values' => $color_values, 'msg' => $msg]);
            break;

        default:
            viewAdmin("layout", ['page' => 'listProducts', 'list_pro' => $list_pro, 'list_cate' => $list_cate]);

            break;
    }
}
viewAdmin("layout", ['page' => 'listProducts', 'list_pro' => $list_pro, 'list_cate' => $list_cate]);
