   <!-- nội dung trang đăng nhập -->
   <div class="content">
        <div class="container-form">
            <div class="signup">
                <h1 class="signup-heading">Thay đổi mật khẩu</h1>
                <form action="<?php echo BASEPATH ?>/admins/changePass/<?php echo $eAdmin['id'];?>" class="signup-form" autocomplete="off" method="POST">
                    <label for="pass" class="signup-label">Mật khẩu hiện tại</label>
                    <input type="password" id="pass" name="pass" class="signup-input" required>
                    <?php 
                    if(isset($dangerous)){
                        echo '<p class="dangerous-text" style="width:100%;">'.$dangerous.'</p>';
                    }
                    ?>
                    
                    <label for="newpass" class="signup-label">Mật khẩu mới</label>
                    <input type="password" id="newpass" name="newpass" class="signup-input" required>
                    <label for="repass" class="signup-label">Nhập lại mật khẩu</label>
                    <input type="password" id="repass" name="repass" class="signup-input" required>
                    <?php 
                    if(isset($rdangerous)){
                        echo '<p class="dangerous-text" style="width:100%;">'.$rdangerous.'</p>';
                    }
                    ?>
                    <button class="signup-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>