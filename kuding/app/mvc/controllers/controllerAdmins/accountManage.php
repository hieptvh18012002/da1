<!-- handle -->
<?php
require_once "./app/common/bridge.php";
callModel("accountModels");

$err = '';
if (isset($_GET['action'])) :
    switch ($_GET['action']) {
        case "loginAdmin":
            extract($_POST);
            // lấy tt acc về check
            if (isset($remember)) {
                $acc_exsits = pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
                // check email
                if (is_array($acc_exsits)) {
                    // check pass
                    if (password_verify($password, $acc_exsits['password'])) {
                        // 2592000(30 ngay)
                        setcookie('emailAdmin', $email, time() + 2592000, '/');
                        setcookie('passwordAdmin', $password, time() + 2592000, '/');
                        $_SESSION['admin'] = $acc_exsits;
                        header("location: indexAdmin");
                        die;
                    } else
                        $err = "Tài khoản hoặc mật khẩu không chính xác!";
                } else
                    $err = "Tài khoản hoặc mật khẩu không chính xác!";
            } else {
                setcookie('emailAdmin', '', time() - 60, '/');
                setcookie('passwordAdmin', '', time() - 60, '/');
                $acc_exsits = pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
                if (is_array($acc_exsits)) {
                    // check pass
                    if (password_verify($password, $acc_exsits['password'])) {
                        $_SESSION['admin'] = $acc_exsits;
                        header("location: indexManage");
                        die;
                    }
                    $err = "Mật khẩu sai!";
                } else
                    $err = "Tài khoản hoặc mật khẩu không chính xác!";
            }
            break;
        case "register":
            // khách hàng đăng kí

            break;
        case "login":
            // khách hàng lg

            break;
        case "addAccount":
            // admin thêm khách hàng/nv

            break;
    }
endif;


viewAdmin("login", ['err' => $err]);
