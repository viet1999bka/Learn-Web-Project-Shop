   <!-- nội dung trang đăng nhập -->
   <div class="content">
        <div class="container-form">
            <div class="signup">
                <h1 class="signup-heading">Thay đổi tài khoản</h1>
                <form action="<?php echo BASEPATH ?>/admins/editAdmin/<?php echo $eAdmin['id']; ?>" class="signup-form" autocomplete="off" method="POST">
                    <label for="name" class="signup-label">Name</label>
                    <input type="name" id="name" name="name" class="signup-input" value="<?php echo $eAdmin['name'] ?>"required>
                    <label for="date" class="signup-label">Date</label>
                    <input type="date" id="date" name="date" class="signup-input" value="<?php echo $eAdmin['date'] ?>"required>
                    <label for="phone" class="signup-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="signup-input" value="<?php echo $eAdmin['phone'] ?>"required maxlength="10" pattern="[0-9]{10}">
                    <label for="address" class="signup-label">Address</label>
                    <input type="text" id="address" name="address" class="signup-input" value="<?php echo $eAdmin['address'] ?>"required>
                    
                    <button class="signup-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>