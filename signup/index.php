<?php
    session_start();
    require_once('../util.php');
    require_once(getRootUrl().'database.php');
    require_once(getRootUrl().'view/header.php');
    if(isset($_SESSION['user_login_name'])
    && isset($_SESSION['user_login_password'])) {
        header('Location: .');
    }
    $have_access = true;
    require_once('signup_handling.php');
?>

<div class="container">
    <form action="" method="post">
        <h3 class="title">Cellphone Shop - Đăng Ký Tài Khoản</h3>
        <table>
            <tr><td>
                *Tên Đăng Nhập
                <input type="text" name="login_name" id="login_name" value="<?php echo (isset($login_name) && $login_name != '') ? $login_name : ''?>" placeholder="Tên Đăng Nhập (Nhiều hơn 6 ký tự)">
            </td></tr>
            <tr><td class="error" id="error_login_name">
                <?php if(isset($error_login_name) && $error_login_name != ''){echo '<div style="margin-bottom: 20px;">'.$error_login_name.'</div>';} ?>
            </td></tr>

            <tr><td>
                *Mật Khẩu
                <input type="password" name="login_password" id="login_password" value="<?php echo (isset($login_password) && $login_password != '') ? $login_password : ''?>" placeholder="Mật Khẩu (Nhiều hơn 6 ký tự)">
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

            <tr><td>
                *Nhập Lại Mật Khẩu
                <input type="password" name="re_login_password" id="re_login_password" value="<?php echo (isset($re_login_password) && $re_login_password != '') ? $re_login_password : ''?>" placeholder="Nhập Lại Mật Khẩu">
            </td></tr> 
            <tr><td class="error" id="error_re_login_password">
                <?php if(isset($error_re_login_password) && $error_re_login_password != ''){echo $error_re_login_password;} ?>
            </td></tr>
            <tr><td class="td-checkbox" style="text-align: right;">
                <div class="pointer">
                    <label for="show2">Hiện Mật Khẩu</label>
                    <input type="checkbox" name="show2" id="show2" value="off"
                        onchange="if(value=='off') {
                            document.querySelector('#re_login_password').type = 'text';
                            this.value = 'on';
                        } else {
                            document.querySelector('#re_login_password').type = 'password';
                            this.value = 'off';                                   
                        }"
                    >
                </div>
            </td></tr>

            <tr><td>
                Tên (Tên này sẽ xuất hiện khi bạn bình luận)
                <input type="text" name="user_name" id="user_name" value="<?php echo (isset($user_name) && $user_name != '') ? $user_name : ''?>" placeholder="Tên">
            </td></tr>

            <tr><td>
                Ngày Tháng Năm Sinh
                <input type="date" name="user_birthday" id="user_birthday" value="<?php echo (isset($user_birthday) && $user_birthday != '') ? $user_birthday : ''?>" placeholder="Ngày Tháng Năm Sinh">
            </td></tr>

            <tr><td>
                Số Điện Thoại
                <input type="number" name="user_tel" id="user_tel" value="<?php echo (isset($user_tel) && $user_tel != '') ? $user_tel : ''?>" placeholder="Số Điện Thoại">
            </td></tr>

            <tr><td>
                Email
                <input type="email" name="user_email" id="user_email" value="<?php echo (isset($user_email) && $user_email != '') ? $user_email : ''?>" placeholder="Email">
            </td></tr>
            
            <!--Khoảng cách--><tr><td style="padding: 20px;"> </td></tr>
            <tr><td class="form-button-container">
                <input style="background-color: black; color: white;" name="signup" type="submit" value="Đăng Ký">
            </td></tr>
            <tr><td class="form-button-container">
                <input name="login" type="submit" value="Đăng Nhập">
            </td></tr>
        </table>
    </form>        
</div>
<?php require_once('../view/footer.php')?>