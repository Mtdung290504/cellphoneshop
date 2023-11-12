<?php
    $error_login_password 
    = $error_login_name 
    = $login_name 
    = $login_password
    = '';
    
    if(isset($_POST['signup'])) {
        header("Location: ".getRootUrl()."signup");                                                                                                                                                                                                                                                                                                                             
    } else if(isset($_POST['login'])) {
        $login_name = $_POST['login_name'];
        $login_password = $_POST['login_password'];
        
        $stmt = $conn->prepare('SELECT user_login_name FROM accounts WHERE user_login_name = ?');
        $stmt->bind_param("s", $login_name);
        $stmt->execute();
        $rs = $stmt->get_result()->num_rows;

        if($rs == 1) {
            $stmt = $conn->prepare('SELECT user_login_name, user_login_password, user_name, is_admin FROM accounts WHERE user_login_name = ? AND user_login_password = ?');
            $stmt->bind_param("ss", $login_name, $login_password);
            $stmt->execute();
            $stmt->store_result();
            $rs = $stmt->num_rows;
            if($rs == 1) {
                $user_login_name = $user_login_password = $user_name = $is_admin = '';
                $stmt->bind_result($user_login_name, $user_login_password, $user_name, $is_admin);
                $stmt->fetch();
                $_SESSION['user_login_name'] = $user_login_name;
                $_SESSION['user_login_password'] = $user_login_password;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['is_admin'] = $is_admin;
                header('Location: '.getRootUrl());
                exit;
            } else {
                $error_login_password = "*Sai mật khẩu";
                $login_password = '';
            }       
        } else if($rs == 0) {
            $error_login_name = "*Tên đăng nhập không tồn tại";
            $login_name = '';
            $login_password = '';
        }
    } else {
        if(!isset($have_access)) {
            header('Location: '.getRootUrl());
        }
    }
?>