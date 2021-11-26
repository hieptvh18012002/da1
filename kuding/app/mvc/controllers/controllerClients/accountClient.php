<?php
require_once "./app/common/bridge.php";

callModel("accountModels");

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "login":
            // lấy tt acc = email
            $email = $_POST['email'];
            $mk = $_POST['mk'];
            $acc_exist = acc_select_by_email($email);
            if ($_POST['remember'] == 'null') {
                // nếu k check thì hủy cc cũ
                setcookie('emailClient', '', time() - 60, '/');
                setcookie('passwordClient', '', time() - 60, '/');
                if (is_array($acc_exist)) {
                    // ktra nếu đúng tk admin thì lỗi(admin login trang riêng)
                    if ($acc_exist['role_id'] != 3) {
                        // check pass
                        $pass = md5($_POST['mk']);
                        if ($pass == $acc_exist['password']) {
                            $_SESSION['customer'] = $acc_exist;
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
                    if ($acc_exist['role_id'] != 3) {
                        // check pass
                        $pass = md5($_POST['mk']);
                        if ($pass == $acc_exist['password']) {
                            setcookie('emailClient',$email,time() + 2592000,'/' );
                            setcookie('passwordClient',$mk,time() + 2592000,'/' );
                            $_SESSION['customer'] = $acc_exist;
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
    }
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        unset($_SESSION['customer']);
        header('location: homepage');
    }
}


viewClient('layout', ['page' => 'homepage']);
