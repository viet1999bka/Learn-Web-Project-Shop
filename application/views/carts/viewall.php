<?php
if (isset($_SESSION['dangerous_bill'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['dangerous_bill'] . "');</script>";
}
if (isset($_SESSION['dangerous_edit_cart'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['dangerous_edit_cart'] . "');</script>";
}
if (isset($_SESSION['dangerous_delete_cart'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['dangerous_delete_cart'] . "');</script>";
}
?>

<!-- nội dung trang giỏ hàng -->
<div class="content">
    <div class="container-cart">
        <?php
        $totalMoney = 0;
        if (!empty($carts)) {
        ?>
            <table class="cart-detail">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($carts as $cart) {
                        $totalMoney += $cart['price'] * $cart['quantity'];
                        echo   '<tr>
                                    <form action="' . BASEPATH . '/carts/edit/' . $cart['id'] . '" method="POST">
                                        <input id="product_id" name="product_id" value="' . $cart['product_id'] . '" hidden>
                                    <td>
                                        <div class="product-img">
                                            <img id="img-product" src="' . BASEPATH . $cart['image'] . '">
                                        </div>
                                    </td>
                                    <td>' . $cart['name'] . '</td>
                                    <td id="price" type="number">' . $cart['price'] . '</td>
                                    <td><input style="width: 44px;" id="quantity" type="number" name="quantity" value="' . $cart['quantity'] . '" min="1"></td>
                                    <td>
                                        <button id="editCart" class="btn-delete"><img src="' . PATH_URL_IMG . 'update.png"></button>
                                    </form>
                                        <a href="' . BASEPATH . '/carts/delete/' . $cart['id'] . '"><button class="btn-delete"><img src="' . PATH_URL_IMG . 'delete.png"></button></a>
                                    </td>
                                </tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div class="checkout">
                <label>Tổng tiền hàng: </label><span id="totalMoney"><?php echo $totalMoney ?>$</span>
                <a href="<?php echo BASEPATH ?>/bills/index"><button id="btn-checkout">Thanh toán</button></a>
            </div>
        <?php
        } else {
        ?>
            <div class="empty-cart">
                <div class="empty-cart-img">
                    <img src="<?php echo PATH_URL_IMG ?>/empty-cart.png">
                </div>
                <div class="empty-cart-text">
                    <p>Giỏ hàng của bạn còn trống</p>
                </div>
                <div class="empty-cart-button">
                    <a href="<?php echo BASEPATH ?>/home/index"><button>Mua hàng ngay</button></a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
unset($_SESSION['dangerous_bill']);
unset($_SESSION['dangerous_edit_cart']);
unset($_SESSION['dangerous_delete_cart']);
?>