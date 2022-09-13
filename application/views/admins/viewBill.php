<!-- Nội dung trang home index -->
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
                    <a href="<?php echo BASEPATH ?>/admins/viewProduct"><span>Products</span></a>
                </li>
                <li>
                    <a href="<?php echo BASEPATH ?>/admins/viewBill" style="background-color:lightcoral;"><span>Bills</span></a>
                </li>
            </ul>
        </div>
        <!-- bên phải -->
        <div class="config">
            <form method="get">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tài khoản</th>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Phương thức thanh toán</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Thời gian đặt</th>
                        <th>Tình trạng</th>
                        <th>Chi tiết</th>
                    </tr>
                    <?php
                    $STT = 1;
                    if (!empty($bills)) {
                        foreach ($bills as $bill) {
                            echo "<tr>
                                <td>{$STT}</td>
                                <td>{$bill['username']}</td>
                                <td>{$bill['name']}</td>
                                <td>{$bill['phone']}</td>
                                <td>{$bill['address']}</td>
                                <td>{$bill['payment']}</td>
                                <td>{$bill['cost']}$</td>
                                <td>{$bill['order_time']}</td>
                                <td>{$bill['status']}</td>
                                <td> <button formaction='" . BASEPATH . "/admins/detailBill/" . $bill['id'] . "'><img src='" .PATH_URL_IMG . "viewdetail.png'></button></td>
                            </tr> ";
                            $STT++;
                        }
                    }
                    ?>
                </table>
            </form>
        </div>
    </div>
</div>