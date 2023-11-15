<span>
    <?php /*NẾU ĐÃ ĐĂNG NHẬP*/ if(isset($_SESSION['user_login_name']) && isset($_SESSION['user_login_password'])) {?>
        <span class="greeting">Xin chào! 
            <?php 
                echo $_SESSION['user_name'].' ('
                .($_SESSION['is_admin']==1 ? 'Admin' : 'Khách').')';/*XÁC ĐỊNH XEM NGƯỜI ĐN LÀ ADMIN HAY KHÁCH*/
            ?>&ensp;
        </span> 
        <?php
            echo ($_SESSION['is_admin']!=1) ? '<a class="login-link" href="./user">Xem Thông Tin</a> /' 
                                            : '<a class="login-link" href="./manage">Đến Trang Quản Trị</a> /';
        ?>
        <a class="login-link" href="<?php echo getRootUrl();?>logout">Đăng Xuất</a>
    <?php } else /*NẾU CHƯA ĐĂNG NHẬP*/ {?>
        <a href="<?php echo getRootUrl();?>login" class="login-link">Đăng Nhập</a> /
        <a href="<?php echo getRootUrl();?>signup" class="login-link">Đăng Ký</a>
    <?php }?>
</span>