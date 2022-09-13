<!-- Nội dung trang home index -->
<?php if(isset($_SESSION['alert'])){
    echo "<script type='text/javascript'>alert('{$_SESSION['alert']}');</script>";
    unset($_SESSION['alert']);
} ?>
<div class="content">
    <div class="container-flex">
        <!-- bên trái -->
        <div class="catagories">
            <div class="catagories-header">
                <img src="<?php echo PATH_URL_IMG ?>list.png">
                <span>Tất cả chức năng</span>
            </div>
            <ul class="catagories-list">
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewAdmin" style ="background-color:lightcoral;"><span>Admin</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewUser"><span>User</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewCategory"><span>Categories</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewProduct"><span>Products</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewBill"><span>Bills</span></a>
                </li>
            </ul>
        </div>
        <!-- bên phải -->
        <div class="config">
            <form method="get">
                <button formaction="<?php echo BASEPATH ?>/admins/addAdmin"> <img src="<?php echo PATH_URL_IMG ?>add.png"></button>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    <?php
                    $STT = 1;
                    foreach ($admins as $admin): ?>
                        <tr>
                           <td><?php echo $STT ?></td>
                           <td><?php echo $admin['username']?></td>
                           <td><?php echo $admin['name']?></td>
                           <td><?php echo $admin['date']?></td>
                           <td><?php echo $admin['phone']?></td>
                           <td><?php echo $admin['address']?></td>
                           <td><button formaction="<?php echo BASEPATH."/admins/editAdmin/".$admin['id'] ?>"><img src="<?php echo PATH_URL_IMG;?>change.png"></button><button formaction="<?php echo BASEPATH."/admins/changePass/".$admin['id'] ?>"><img src="<?php echo PATH_URL_IMG;?>pass.png"></button></td>
                       </tr>
                   <?php $STT++;endforeach;?>
                </table>
            </form>
        </div>
    </div>
</div>