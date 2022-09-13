<?php
if (isset($_SESSION['user_notification'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['user_notification'] . "');</script>";
}
?>

<!-- Nội dung trang user profile -->
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
                    <a href="<?php echo BASEPATH ?>/users/profile" style="color:rgb(238, 77, 45);"><span>Hồ sơ</span></a>
                    <a href="<?php echo BASEPATH ?>/users/password"><span>Đổi mật khẩu</span></a>
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
                    <h2>Hồ sơ của tôi</h2>
                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                </div>
                <div class="user-information-profile">
                    <form action="<?php echo BASEPATH ?>/users/updateInformation" autocomplete="off" method="POST">
                        <div class="user-information-profile-item">
                            <div class="user-information-profile-label">
                                Tên đăng nhập
                            </div>
                            <div class="user-information-profile-input">
                                <?php echo $user['username'] ?>
                            </div>
                        </div>
                        <div class="user-information-profile-item">
                            <div class="user-information-profile-label">
                                Tên
                            </div>
                            <div class="user-information-profile-input">
                                <input type="text" id="name" name="name" value="<?php echo $user['name'] ?>" required placeholder="enter your name">
                            </div>
                        </div>
                        <div class="user-information-profile-item">
                            <div class="user-information-profile-label">
                                Số điện thoại
                            </div>
                            <div class="user-information-profile-input">
                                <input type="tel" id="phone" name="phone" value="<?php echo $user['phone'] ?>" placeholder="ex: 0123456789" maxlength="10" pattern="[0-9]{10}">
                            </div>
                        </div>
                        <div class="user-information-profile-item">
                            <div class="user-information-profile-label">
                                Ngày sinh
                            </div>
                            <div class="user-information-profile-input">
                                <input type="date" id="date" name="date" value="<?php echo $user['date'] ?>" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="user-information-profile-item">
                            <div class="user-information-profile-label">
                                Địa chỉ
                            </div>
                            <div class="user-information-profile-input">
                                <input type="text" id="address" name="address" value="<?php echo $user['address'] ?>" placeholder="enter your address">
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