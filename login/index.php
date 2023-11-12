<?php
    session_start();
    require_once('../util.php');
    require_once(getRootUrl().'database.php');
    require_once(getRootUrl().'view/header.php');
    if(isset($_SESSION['user_login_name']) && isset($_SESSION['user_login_password'])) {
        header('Location: '.getRootUrl());
    }
    $have_access = true;
    require_once('login_handling.php');
?>

<div class="container">
    <form action="" method="post">
        <h3 class="title">Cellphone Shop - Đăng Nhập</h3>
        <table>
            <tr><td>
                <input type="text" name="login_name" id="login_name" value="<?php echo (isset($login_name) && $login_name != '') ? $login_name : ''?>" placeholder="Tên Đăng Nhập">
            </td></tr>
            <tr><td class="error" id="error_login_name">
                <?php if(isset($error_login_name) && $error_login_name != ''){echo $error_login_name;} ?>
            </td></tr>
            <tr><td>
                <input type="password" name="login_password" id="login_password" value="" placeholder="Mật Khẩu">
            </td></tr>
            <tr><td class="error" id="error_login_password">
                <?php if(isset($error_login_password) && $error_login_password != ''){echo $error_login_password;} ?>
            </td></tr>

            <tr><td class="td-checkbox" style="text-align: right;">
                <div class="pointer">
                    <label for="show">Hiện Mật Khẩu</label>
                    <input type="checkbox" name="show" id="show" value="off"
                        onchange="if(value=='off') {
                            document.querySelector('#login_password').type = 'text';
                            this.value = 'on';
                        } else {
                            document.querySelector('#login_password').type = 'password';
                            this.value = 'off';                                   
                        }"
                    >
                </div>
            </td></tr>
            
            <!--Khoảng cách--><tr><td style="padding: 20px;"> </td></tr>
            <tr><td colspan="2" class="form-button-container">
                <input name="login" type="submit" value="Đăng Nhập">
            </td></tr>
            <tr><td colspan="2" class="form-button-container">
                <input style="background-color: black; color: white;" name="signup" type="submit" value="Đăng Ký">
            </td></tr>
        </table>
    </form>
</div>
<?php require_once('../view/footer.php')?>