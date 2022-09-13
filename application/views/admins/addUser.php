   <!-- nội dung trang đăng nhập -->
   <div class="content">
        <div class="container-form">
            <div class="signup">
                <h1 class="signup-heading">Add User Account</h1>
                <form action="<?php echo BASEPATH ?>/admins/addUser" class="signup-form" autocomplete="off" method="POST">
                    <label for="username" class="signup-label">User name</label>
                    <input type="text" id="username" name="username" class="signup-input" required placeholder="enter your username">
                    <?php 
                    if(isset($dangerous)){
                        echo '<p class="dangerous-text" style="width:100%;">'.$dangerous.'</p>';
                    }
                    ?>
                    <label for="password" class="signup-label">Password</label>
                    <input type="password" id="password" name="password" class="signup-input" required placeholder="enter your password">
                    <label for="name" class="signup-label">Name</label>
                    <input type="name" id="name" name="name" class="signup-input" required placeholder="enter your name">
                    <label for="date" class="signup-label">Date</label>
                    <input type="date" id="date" name="date" class="signup-input" required placeholder="enter your date">
                    <label for="phone" class="signup-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="signup-input" required placeholder="enter your phone" maxlength="10" pattern="[0-9]{10}">
                    <label for="address" class="signup-label">Address</label>
                    <input type="text" id="address" name="address" class="signup-input" required placeholder="enter your address">
                    <button class="signup-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>