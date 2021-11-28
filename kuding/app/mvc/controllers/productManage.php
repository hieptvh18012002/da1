<?php
require_once './app/common/bridge.php';
callModel("productModels");
callModel("categoryModels");
callModel("commentModels");

$list_cate = cate_select_all();
$list_pro = product_select_all();
$size_values = size_select_all();
$color_values = color_select_all();

$err = array();
$err['img'] = '';
$err['cmt'] = '';
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
                        pro_attr_insert($id_pro, 1, $c);
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
            // lấy value của thuộc tính sp tương ứng;--> value thuộc tính lấy dc nó trả về kiểu array object
            $size_id_of_pro = '';
            $color_id_of_pro = '';
            // chuyển mảng 2 chieefu về thành chuỗi
            foreach (color_select_pro($id) as $c) {
                $color_id_of_pro .= $c['value_id'] . ' ';
            }
            foreach (size_select_pro($id) as $s) {
                $size_id_of_pro .= $s['value_id'] . ' ';
            }
            // chuyển chuỗi vừa đổi -> mảng 1 chiều để so khớp bằng in_array
            $color_id = explode(' ', $color_id_of_pro);
            $size_id = explode(' ', $size_id_of_pro);
            if (isset($_POST['btn_update'])) {
                extract($_POST);
                // code update
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
                }
                if (empty($err['img'])) {
                    // update pro
                    product_update($id, $name, $category, $price, $discount, $avatar, $desc);
                    if ($file['size'] > 0) {
                        move_uploaded_file($file['tmp_name'], './public/images/products/' . $avatar);
                    }
                    // update attr value
                    // lặp value 
                    foreach ($color as $c) {
                        pro_attr_update($id, 1, $c);
                    }
                    echo "xong";
                    die;
                    foreach ($size as $s) {
                        pro_attr_update($id, 2, $s);
                    }
                    header('location: product?action=update&id=' . $id);
                    $msg = "Cập nhật thành công sản phẩm";
                }
                // product_update($id,$name,$category,$price,$discount,$avatar,)
            }
            viewAdmin('layout', ['page' => 'updateProduct', 'pros' => $pros, 'list_cate' => $list_cate, 'size_values' => $size_values, 'color_values' => $color_values, 'color_id' => $color_id, 'size_id' => $size_id, 'errImg' => $err['img'], 'msg' => $msg]);
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
            $attr_values = attr_value_select_all();
            // $attr_id = attr_id_select_all();
            $err_at = '';
            // code add attr
            if (isset($_POST['btn_add_value'])) {
                $value = strtoupper($_POST['value']);
                $attr = $_POST['attr'];
                if ($attr == 1) {
                    // thêm cl
                    // check value đã tồn tại
                    foreach ($color_values as $c) {
                        if ($c['value'] == $value) {
                            $err_at = "Giá trị của thuộc tính đã tồn tại!";
                            break;
                        }
                    }
                } else {
                    // check sz esx
                    foreach ($size_values as $s) {
                        if ($s['value'] == $value) {
                            $err_at = "Giá trị của thuộc tính đã tồn tại!";
                            break;
                        }
                    }
                }
                // nếu k er thì insert
                if (empty($err_at)) {
                    attr_value_insert($attr, $value);
                    $msg = "Thêm thành công giá trị của thuộc tính";
                    header("location: product?action=addAttrProduct");
                }
            }

            viewAdmin('layout', ['page' => 'addAttr', 'attrs' => $attrs, 'msg' => $msg, 'err' => $err_at]);
            die;
            break;
        case "viewListProduct":
            //    tiêu đề 
            $title = '';
            $qr = "SELECT * FROM products WHERE status=1 ";
            if (isset($_GET['filtercate'])) {
                $qr .= " AND cate_id=".$_GET['filtercate'];
                $title = category_select_by_id($_GET['filtercate'])['name'];
            }else{
                $title = "Tất cả sản phẩm";
            }

            if (isset($_GET['filter'])) {
               
                $minimum_price = $_GET['minimum_price'];
                $maximum_price = $_GET['maximum_price'];
                if (isset($minimum_price, $maximum_price)) {
                    $qr .= " AND price BETWEEN $minimum_price AND $maximum_price ";
                }
                $db =get_connection();
                $stmt = $db->prepare($qr);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $count = $stmt->rowCount();
                $output = '';

                if($count > 0){
                    foreach ($result as $item) {
                        $output .= '
                            <div class="proC__item">
                                <div class="proC__item__img">
                                    <a href="product?action=viewProductDetail&id='.$item['id'].'">
                                        <img src="public/images/products/'.$item['avatar'].'" alt="" width="100%">
                                    </a>
                                </div>
                                <div class="proC__item__Name">
                                    <p>'.$item['name'].'</p>
                                </div>
                                <div class="proC__item__PC">
                                    <div class="proC__item__price">
                                        <p>'.number_format($item['price'], 0, ',', '.').' vnd</p>
                                    </div>
                                    <div class="proC__item__color">
                                        <p>3</p>
                                        <img src="public/images/layout/colorwheel-2.png" alt="">
                                    </div>
                                </div>
                                <div class="proC__love">
                                    <div class="proC__love__icon">
                                        <i class="far fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                }else{
                    $output = "Không tìm thấy sản phẩm phù hợp";
                }
                echo $output;
                die;
            }

            viewClient('layout', ['page' => 'product', 'list_cate' => $list_cate, 'title' => $title]);
            die;
            break;
        case "viewProductDetail":
            $pro_imgs = pro_img_select_by_id($_GET['id']);
            $pros = product_select_by_id($_GET['id']);
            $cmts = cmt_select_by_product($_GET['id']);
            $id = $_GET['id'];
            // show value attr
            // lấy value_id
            // lấy value của thuộc tính sp tương ứng;--> value thuộc tính lấy dc nó trả về kiểu array object
            $size_id_of_pro = '';
            $color_id_of_pro = '';
            // chuyển mảng 2 chieefu về thành chuỗi
            foreach (color_select_pro($id) as $c) {
                $color_id_of_pro .= $c['value_id'] . ' ';
            }
            foreach (size_select_pro($id) as $s) {
                $size_id_of_pro .= $s['value_id'] . ' ';
            }
            // chuyển chuỗi vừa đổi -> mảng 1 chiều để so khớp bằng in_array 
            //   xóa phần tử "" cuỗi mảng
            $color_id = explode(' ', $color_id_of_pro);
            $arr1 = count($color_id);
            unset($color_id[$arr1 - 1]);
            $size_id = explode(' ', $size_id_of_pro);
            //  lặp và select name value
            $color_name = '';
            $size_name = '';
            echo "<pre>";
            foreach ($color_id as $c) {
                $color_name = select_name_value_pro($c);
            }
            var_dump($color_name);
            die;
            foreach ($size_id as $s) {
                $size_name .= select_name_value_pro($s);
            }

            // cmt
            if (isset($_POST['btn_cmt'])) {
                // lấy img
                $content = $_POST['content'];
                $id = $_GET['id'];
                $ext_img = ['jpg', 'png', 'jpeg'];
                $file = $_FILES['image'];
                if ($file['size'] != 0) {
                    if ($file['size'] > 2097152) {
                        $err['img'] = 'Chỉ cho phép tải ảnh dưới 2mb!';
                    } else {
                        $image = $file['name'];
                        $ext = pathinfo($image, PATHINFO_EXTENSION);
                        if (!in_array($ext, $ext_img)) {
                            $err['img'] = 'Ảnh tải lên phải là jpg, png hoặc jpeg';
                        }
                    }
                } else {
                    $image = '';
                }
                if (strlen($content) > 400) {
                    $err['cmt'] = 'Không thể bình luận quá 400 kí tự.';
                } elseif (strlen($content) <= 0) {
                    $err['cmt'] = "Bạn chưa nhập nội dung!";
                }
                // ko có er thì ms gán id và insert
                if (!array_filter($err)) {
                    if (isset($_SESSION['customer'])) {
                        $id_commenter = $_SESSION['customer']['id'];
                    } else {
                        $id_commenter = $_SESSION['admin']['id'];
                    }
                    move_uploaded_file($file['tmp_name'], "./public/images/upload/" . $image);
                    cmt_insert($content, $id_commenter, $id, $image, date("Y-m-d H:i:s"));
                    header("location: product?action=viewProductDetail&id=" . $id);
                }
                if (strlen($content) > 400) {
                    $err['cmt'] = 'Không thể bình luận quá 400 kí tự.';
                } elseif (strlen($content) <= 0) {
                    $err['cmt'] = "Bạn chưa nhập nội dung!";
                }
            }
            viewClient('layout', ['page' => 'product-details', 'list_img' => $pro_imgs, 'list_cate' => $list_cate, 'pros' => $pros, 'errCmt' => $err['cmt'], 'errImg' => $err['img'], 'list_cmt' => $cmts]);
            die;
            break;

        case "viewFavorite":
            // code sản phẩm yêu thích
            // nếu là khách thì lưu vào session >< đã đang nhập thì lưu db

            viewClient('layout', ['page' => 'favorite', 'list_cate' => $list_cate]);
            die;
            break;
    }
}
viewAdmin("layout", ['page' => 'listProducts', 'list_pro' => $list_pro, 'list_cate' => $list_cate]);
