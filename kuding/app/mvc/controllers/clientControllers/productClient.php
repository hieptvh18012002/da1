<?php
require_once './app/common/bridge.php';
callModel("productModels");
callModel("categoryModels");
callModel("commentModels");
callModel("vourcherModels");
// lấy list
$list_vour = vc_select_all();
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
       
        case "viewProductDetail":
            $pro_imgs = pro_img_select_by_id($_GET['id']);
            $pros = product_select_by_id($_GET['id']);
            $cmts = cmt_select_by_product($_GET['id']);
            $id = $_GET['id'];
            // tăng viu
            increaseViewProduct($id);
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
            // echo "<pre>";
            // foreach ($color_id as $c) {
            //     $color_name = select_name_value_pro($c);
            // }
            // var_dump($color_name);
            // die;
            // foreach ($size_id as $s) {
            //     $size_name .= select_name_value_pro($s);
            // }

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
                    header("location: productClient?action=viewProductDetail&id=" . $id);
                }
                if (strlen($content) > 400) {
                    $err['cmt'] = 'Không thể bình luận quá 400 kí tự.';
                } elseif (strlen($content) <= 0) {
                    $err['cmt'] = "Bạn chưa nhập nội dung!";
                }
            }
            // xóa cmt

            viewClient('layout', ['page' => 'product-details', 'list_img' => $pro_imgs, 'list_cate' => $list_cate, 'pros' => $pros, 'errCmt' => $err['cmt'], 'errImg' => $err['img'], 'list_cmt' => $cmts, 'list_vour' => $list_vour]);
            die;
            break;

        case "viewFavorite":
            // code sản phẩm yêu thích
            // nếu là khách thì lưu vào session >< đã đang nhập thì lưu db

            viewClient('layout', ['page' => 'favorite', 'list_cate' => $list_cate, 'list_vour' => $list_vour]);
            die;
            break;

        default:
            // show list
            //    tiêu đề 
            $title = '';
            $qr = "SELECT * FROM products WHERE status=1 ";
            $total_records = count_recored("SELECT * FROM products WHERE status=1");
            //  cate
            if (isset($_GET['filtercate'])) {
                $id_cate = $_GET['filtercate'];
                $total_records = pro_count_recored_cate($id_cate);
                $qr .= " AND cate_id='$id_cate'";
                $title = category_select_by_id($_GET['filtercate'])['name'];
            } elseif (isset($_GET['keyword'],$_GET['filter-cate'] )) {
                $keyword = $_GET['keyword'];
                $id_cate = $_GET['filter-cate'];
                $title = "Kết quả tìm kiếm '$keyword'";
                if($id_cate == 'all'){
                    $total_records = count_recored("SELECT * FROM products WHERE status=1 AND name LIKE '%$keyword%' ");
                    $qr .= " AND name LIKE '%$keyword%' ";
                }else{
                    $total_records = pro_count_recored_cate($id_cate);
                    $qr .= " AND cate_id='$id_cate' AND name LIKE '%$keyword%' ";

                }
            } else {
                $title = "Tất cả sản phẩm";
            }
            //  search
           
            // phân trang
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;


            // if (isset($_GET['filter'])) {

            //     $minimum_price = $_GET['minimum_price'];
            //     $maximum_price = $_GET['maximum_price'];
            //     if (isset($minimum_price, $maximum_price)) {
            //         $qr .= " AND price BETWEEN $minimum_price AND $maximum_price ";
            //     }
            $qr .= " LIMIT $start,$limit";
            $db = get_connection();
            $stmt = $db->prepare($qr);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $count = $stmt->rowCount();
            if($count <= 0){
                $msg = "Không tìm thấy sản phẩm phù hợp";
            }

            //     $output = '';

            //     if ($count > 0) {
            //         foreach ($result as $item) {
            //             $output .= '

            //         }
            //     } else {
            //         $output = "Không tìm thấy sản phẩm phù hợp";
            //     }
            //     echo $output;
            //     die;
            // }

            viewClient('layout', ['page' => 'product', 'list_cate' => $list_cate, 'title' => $title, 'list_vour' => $list_vour, 'list_pro' => $result, 'total_page' => $total_page, 'current_page' => $current_page,'msg'=>$msg,'count'=>$count]);
            die;
            break;
    }
}
viewClient("layout", ['page' => 'product', 'list_pro' => $list_pro, 'list_cate' => $list_cate]);
