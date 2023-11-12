<?php
    $login_name = isset($_POST['login_name']) ? $_POST['login_name'] : '';
    $login_password = isset($_POST['login_password']) ? $_POST['login_password'] : '';
    $re_login_password = isset($_POST['re_login_password']) ? $_POST['re_login_password'] : '';
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $user_birthday = isset($_POST['user_birthday']) ? $_POST['user_birthday'] : '';
    $user_tel = isset($_POST['user_tel']) ? $_POST['user_tel'] : '';
    $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';

    $error_login_name = $error_login_password = $error_re_login_password = '';

    if(isset($_POST['signup'])) {
        $stmt = $conn->prepare('SELECT user_login_name FROM accounts WHERE user_login_name = ?');
        $stmt->bind_param("s", $login_name);
        $stmt->execute();
        $rs = $stmt->get_result()->num_rows;

        if($rs == 1) {
            $login_name = '';
            $error_login_name = '*Tên đăng nhập đã tồn tại';
        } else {
            if(strlen($login_name) <= 6) {
                $login_name = '';
                $error_login_name = '*Tên đăng nhập quá ngắn';
            }
            if(strlen($login_password) <= 6) {
                $login_password = '';
                $re_login_password = '';
                $error_login_password = '*Mật khẩu quá ngắn';
            }
            if($re_login_password != $login_password) {
                $re_login_password = '';
                $error_re_login_password = '*Mật khẩu nhập lại sai';
            }
            
            if($error_login_name == '' && $error_login_password == '' && $error_re_login_password == '') {
                $stmt = $conn->prepare('INSERT INTO accounts (user_login_name, user_login_password, user_name, user_birthday, user_sdt, user_email)
                    VALUE (?, ?, ?, ?, ?, ?);
                ');
                $stmt->bind_param('ssssss', $login_name, $login_password, $user_name, $user_birthday, $user_tel, $user_email);
                $stmt->execute();
                echo '<script>
                    alert("Đăng Ký Thành Công!");
                    location.href = "?action=login";
                </script>';
            }
        }
    } else if(isset($_POST['login'])) {
        header("Location: ?action=login");
    } else {
        if(!isset($have_access)) {
            header('Location: ..');
        }
    }
    
?>