<!-- Nội dung trang home index -->
<div class="content">
    <div class="container-flex">
        <!-- bên trái -->
        <div class="catagories">
            <div class="catagories-header">
                <img src="<?php echo PATH_URL_IMG ?>list.png">
                <span>Tất cả danh mục</span>
            </div>
            <ul class="catagories-list">
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewAdmin"><span>Admin</span></a>
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
                    <a href="<?php echo BASEPATH ?>/admins/viewBill" style ="background-color:lightcoral;"><span>Bills</span></a>
                </li>
            </ul>
        </div>
        <!-- bên phải -->
        <div class="config">
            <form method="get">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Product</th>
                        <th>Hình</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                    <?php
                    $STT = 1;
                    foreach ($debills as $bill) {
                        // $arr[3] will be updated with each value from $arr...
                        echo "<tr>
                        <td>{$STT}</td>
                        <td>{$bill['product']}</td><td><img src='".
                         BASEPATH.
                         "{$bill['image']}'></td>
                        <td>{$bill['cost']} $</td>
                        <td>{$bill['quantity']}</td>
                        </tr> ";
                        $STT++;
                    }
                    ?>
                </table>
            </form>
        </div>
    </div>
</div>