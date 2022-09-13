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
                    <a href="<?php echo BASEPATH ?>/admins/viewAdmin"><span>Admin</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewUser"><span>User</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewCategory"><span>Categories</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewProduct" style ="background-color:lightcoral;"><span>Products</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewBill"><span>Bills</span></a>
                </li>
            </ul>
        </div>
        <!-- bên phải -->
        <div class="config">
            <form method="get">
                <button formaction="<?php echo BASEPATH ?>/admins/addProduct"> <img src="<?php echo PATH_URL_IMG ?>add.png"></button>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Chi tiết</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    <?php
                    $STT = 1;
                    foreach ($products as $product) {
                        // $arr[3] will be updated with each value from $arr...
                        echo "<tr>
                        <td>{$STT}</td>
                        <td>{$product['name']}</td>
                        <td>{$product['detail']}</td>
                        <td>{$product['price']} $</td><td><img src='".BASEPATH."{$product['image']}'></td>
                              <td> <button formaction='".BASEPATH."/admins/editProduct/".$product['id']."'><img src='".PATH_URL_IMG.
                                "edit.png'></button><button formaction='".BASEPATH."/admins/delProduct/".$product['id']."'><img src='".PATH_URL_IMG."edit-del.png'></button></td>
                        </tr> ";
                        $STT++;
                    }
                    ?>
                </table>
            </form>
        </div>
    </div>
</div>