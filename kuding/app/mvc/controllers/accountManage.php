<!-- handle -->
<?php
require_once "./app/common/bridge.php";
callModel("accountModels");
$list_acc = acc_select_all();
$err = '';
if (isset($_GET['action'])) :
    switch ($_GET['action']) {
        case "loginAdmin":
            if (isset($_POST['btnLogin'])) {
                extract($_POST);
                // lấy tt acc về check
                // case ng dùng check remember
                if (isset($remember)) {
                    $acc_exsits = pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
                    $pass = md5($password);
                    // check email
                    if (is_array($acc_exsits)) {
                        // check pass
                        if ($pass == $acc_exsits['password']) {
                            // 2592000(30 ngay)
                            setcookie('emailAdmin', $email, time() + 2592000, '/');
                            setcookie('passwordAdmin', $password, time() + 2592000, '/');
                            $_SESSION['admin'] = $acc_exsits;
                            unset($_SESSION['customer']);
                            header("location: admin");
                            die;
                        } else
                            $err = "Tài khoản hoặc mật khẩu không chính xác!";
                    } else
                        $err = "Tài khoản hoặc mật khẩu không chính xác!";
                } else { // ko check rmb
                    setcookie('emailAdmin', '', time() - 60, '/');
                    setcookie('passwordAdmin', '', time() - 60, '/');
                    $acc_exsits = pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
                    $pass = md5($password);
                    if (is_array($acc_exsits)) {
                        // check pass
                        if ($pass == $acc_exsits['password']) {
                            $_SESSION['admin'] = $acc_exsits;
                            unset($_SESSION['customer']);
                            header("location: admin");
                            die;
                        }
                        $err = "Mật khẩu sai!";
                    } else
                        $err = "Tài khoản hoặc mật khẩu không chính xác!";
                }
            }
            viewAdmin('login', ['err' => $err]);
            die;
            break;
        case "loginClient":
            // lấy tt acc = email
            $email = $_GET['email'];
            $mk = $_GET['mk'];
            $acc_exist = acc_select_by_email($email);
            if ($_GET['remember'] == 'null') {
                // nếu k check thì hủy cc cũ
                setcookie('emailClient', '', time() - 60, '/');
                setcookie('passwordClient', '', time() - 60, '/');
                if (is_array($acc_exist)) {
                    // ktra nếu đúng tk admin thì lỗi(admin login trang riêng)
                    if ($acc_exist['role_id'] == 1) {
                        // check pass
                        $pass = md5($_GET['mk']);
                        if ($pass == $acc_exist['password']) {
                            $_SESSION['customer'] = $acc_exist;
                            unset($_SESSION['admin']);
                            echo "<script>location.reload()</script>";
                        } else {
                            echo "Mật khẩu không chính xác!";
                        }
                    } else {
                        echo "Tài khoản không chính xác!";
                    }
                } else
                    echo "Tài khoản không chính xác!";
                die;
            } else {
                if (is_array($acc_exist)) {
                    // ktra nếu đúng tk admin thì lỗi(admin login trang riêng)
                    if ($acc_exist['role_id'] == 1) {
                        // check pass
                        $pass = md5($_GET['mk']);
                        if ($pass == $acc_exist['password']) {
                            setcookie('emailClient', $email, time() + 2592000, '/');
                            setcookie('passwordClient', $mk, time() + 2592000, '/');
                            $_SESSION['customer'] = $acc_exist;
                            unset($_SESSION['admin']);
                            echo "<script>location.reload()</script>";
                        } else {
                            echo "Mật khẩu không chính xác!";
                        }
                    } else {
                        echo "Tài khoản không chính xác!";
                    }
                } else
                    echo "Tài khoản không chính xác!";
                die;
            }


            break;
        case "register":
            // khách hàng đăng kí
            $gender = 0;
            if ($_GET['male'] == "check") {
                $gender = 0;
            } else {
                $gender = 1;
            }
            // ktra email đã tồn tại
            $acc_exist = acc_select_by_email($_GET['email']);
            var_dump($acc_exist);die;
            if(is_array($acc_exist)){
                echo "Đù má đăng kí tài khoản khác hộ";
            }else{
                //   mh pass
                $pass = md5($_GET['mk']);
                acc_insert($_GET['fullname'], $_GET['birthday'], $_GET['email'], $pass, 1, $gender);
                echo "<script>alert('Đăng kí tài khoản thành công!')</script>";
                die;

            }
            break;
        case "viewProfileClient":
            // code update profile cá nhân
            viewClient('layout', ['page' => 'profile']);
            die;
            break;
        case "addAccount":

            viewAdmin("layout", ['page' => 'addAccount']);
            break;

        case "updateAccount":

            break;
        case "delAccount":

            break;

        case "logoutClient":
            unset($_SESSION['customer']);
            header('location: homepage');
            echo "<script>alert('Bạn đã đăng xuất thành công!')</script>";
            break;
        case "logout":
            // admin thêm khách hàng/nv
            session_destroy();
            echo "<script>window.location.replace(\"index?msg=Đăng xuất thành công!\")</script>;";
            die;
            break;
        default:
            viewAdmin('layout', ['page' => 'listAccount', 'list_acc' => $list_acc]);
            break;
    }
endif;


viewAdmin("layout", ['page' => 'listAccount', 'msg' => $msg, 'err' => $err, 'list_acc' => $list_acc]);
