   <!-- nội dung trang đăng nhập -->
   <div class="content">
        <div class="container-form">
            <div class="signup">
                <h1 class="signup-heading">Profile</h1>
                <form action="<?php echo BASEPATH ?>/admins/editAdmin/<?php echo $eAdmin['id']; ?>" class="signup-form" autocomplete="off" method="GET">
                    <label for="username" class="signup-label">Tên đăng nhập</label>
                    <input type="text" id="username" name="username" class="signup-input" value="<?php echo $eAdmin['username'] ?>"required readonly>
                    <label for="name" class="signup-label">Họ và tên</label>
                    <input type="name" id="name" name="name" class="signup-input" value="<?php echo $eAdmin['name'] ?>"required readonly>
                    <label for="date" class="signup-label">Ngày sinh</label>
                    <input type="date" id="date" name="date" class="signup-input" value="<?php echo $eAdmin['date'] ?>"required readonly>
                    <label for="phone" class="signup-label">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" class="signup-input" value="<?php echo $eAdmin['phone'] ?>"required maxlength="10" pattern="[0-9]{10}" readonly>
                    <label for="address" class="signup-label">Địa chỉ</label>
                    <input type="text" id="address" name="address" class="signup-input" value="<?php echo $eAdmin['address'] ?>"required readonly>
                    <button class="signup-submit">Thay đổi thông tin</button>
                    <button formaction="<?php echo BASEPATH ?>/admins/changePass/<?php echo $eAdmin['id']; ?>" class="signup-submit">Thay đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </div>