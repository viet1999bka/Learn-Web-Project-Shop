<!-- Nội dung trang home index -->
<?php if (isset($_SESSION['alert'])) {
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
                    <a href="<?php echo BASEPATH ?>/admins/viewAdmin"><span>Admin</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewUser" style="background-color:lightcoral;"><span>User</span></a>
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
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên đăng nhập</th>
                        <th>Tên người dùng</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                    </tr>
                    <?php
                    $STT = 1;
                    foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $STT ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['date'] ?></td>
                            <td><?php echo $user['phone'] ?></td>
                            <td><?php echo $user['address'] ?></td>
                        </tr>
                    <?php $STT++;
                    endforeach; ?>
                </table>
            </form>
        </div>
    </div>
</div>