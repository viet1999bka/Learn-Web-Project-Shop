<?php
if (isset($_SESSION['user_notification'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['user_notification'] . "');</script>";
}
?>

<!-- Nội dung trang user change password -->
<div class="content">
    <div class="container-flex" style="margin-left: 90px;margin-right: 90px;">
        <!-- bên trái -->
        <div class="user-sidebar">
            <div class="user-brief">
                <img class="user-icon" src="<?php echo PATH_URL_IMG ?>account.png" alt="user">
                <div class="user-brief-right">
                    <div class="user-brief-username"><?php echo $user['username'] ?></div>
                    <a class="user-brief-edit" href="<?php echo BASEPATH ?>/users/profile">
                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="margin-right: 4px;">
                            <path d="M8.54 0L6.987 1.56l3.46 3.48L12 3.48M0 8.52l.073 3.428L3.46 12l6.21-6.18-3.46-3.48" fill="#9B9B9B" fill-rule="evenodd"></path>
                        </svg>
                        Sửa hồ sơ
                    </a>
                </div>
            </div>
            <div class="user-sidebar-menu">
                <div class="user-sidebar-menu-entry">
                    <img class="user-sidebar-menu-icon" src="<?php echo PATH_URL_IMG ?>account_user.png">
                    <a href="<?php echo BASEPATH ?>/users/profile"><span>Tài khoản của tôi</span></a>
                </div>
                <div class="user-sidebar-menu-list">
                    <a href="<?php echo BASEPATH ?>/users/profile"><span>Hồ sơ</span></a>
                    <a href="<?php echo BASEPATH ?>/users/password" style="color:rgb(238, 77, 45);"><span>Đổi mật khẩu</span></a>
                </div>
            </div>
            <div class="user-sidebar-menu">
                <div class="user-sidebar-menu-entry">
                    <img class="user-sidebar-menu-icon" src="<?php echo PATH_URL_IMG ?>list_bill.png">
                    <a><span>Đơn mua</span></a>
                </div>
            </div>
            <div class="user-sidebar-menu">
                <div class="user-sidebar-menu-entry">
                    <img class="user-sidebar-menu-icon" src="<?php echo PATH_URL_IMG ?>bell.png">
                    <a><span>Thông báo</span></a>
                </div>
            </div>
        </div>

        <!-- bên phải -->
        <div class="user-content">
            <div class="user-information">
                <div class="user-information-header">
                    <h2>Đổi mật khẩu</h2>
                    <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                </div>
                <div class="user-information-profile">
                    <form action="<?php echo BASEPATH ?>/users/updatePassword" autocomplete="off" method="POST">
                        <div class="user-information-profile-item">
                            <div class="user-information-profile-label">
                                Mật khẩu hiện tại
                            </div>
                            <div class="user-information-profile-input">
                                <input type="password" id="currentpassword" name="currentpassword" required placeholder="enter your current password">
                            </div>
                        </div>
                        <div class="user-information-profile-item">
                            <div class="user-information-profile-label">
                                Mật khẩu mới
                            </div>
                            <div class="user-information-profile-input">
                                <input type="password" id="newpassword" name="newpassword" required placeholder="enter your new password">
                            </div>
                        </div>
                        <div class="user-information-profile-item">
                            <div class="user-information-profile-label">
                                Xác nhận mật khẩu
                            </div>
                            <div class="user-information-profile-input">
                                <input type="password" id="repeatpassword" name="repeatpassword" required placeholder="enter your repeat password">
                            </div>
                        </div>
                        <button style="margin: 30px 250px 0px;" id="btn-checkout">Cập nhập</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
unset($_SESSION['user_notification']);
?>