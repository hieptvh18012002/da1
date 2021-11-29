<!-- handle -->
<?php
require_once "./app/common/bridge.php";
callModel("accountModels");
$list_acc = acc_select_all();
$err = '';
$er = array();
$er['pass'] = '';
$err_pass = '';
$err_pass_old = '';
$msg = '';
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
        
        
       
        case "addAccount":

            viewAdmin("layout", ['page' => 'addAccount']);
            break;

        case "updateAccount":

            break;
        case "delAccount":

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
