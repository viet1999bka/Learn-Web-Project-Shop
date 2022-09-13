<?php
if (isset($_SESSION['dangerous_bill'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['dangerous_bill'] . "');</script>";
}
?>

<!-- nội dung trang thanh toán -->
<div class="content">
    <div class="container-flex">
        <!-- bên phải hiển thị thông tin đặt hàng -->
        <div class="bill-form">
            <div class="signup">
                <h1 class="signup-heading">Thông tin thanh toán</h1>
                <form action="<?php echo BASEPATH ?>/bills/add" method="POST" class="signup-form" autocomplete="off">
                    <label for="name" class="signup-label">Name</label>
                    <input type="text" id="name" name="name" class="signup-input" required placeholder="enter your receiver">
                    <label for="phone" class="signup-label">Phone</label>
                    <input type="tel" id="phone" name="phone" class="signup-input" required placeholder="ex: 0123456789" maxlength="10" pattern="[0-9]{10}">
                    <label for="province" class="signup-label">Province</label>
                    <select class="select-info" id="province" name="province" required>
                        <option value="0">Vui lòng chọn Thành phố/Tỉnh</option>
                        <?php
                        foreach ($provinces as $province) {
                            echo '<option value="' . $province['name'] . '">' . $province['name'] . '</option>';
                        }
                        ?>
                    </select>
                    <label for="district" class="signup-label">District</label>
                    <select class="select-info" id="district" name="district" required>

                    </select>
                    <label for="ward" class="signup-label">Ward</label>
                    <select class="select-info" id="ward" name="ward" required>

                    </select>
                    <label for="street" class="signup-label">Street</label>
                    <input type="text" id="street" name="street" class="signup-input" required placeholder="enter your street">
                    <label for="payment" class="signup-label">Payment Method</label>
                    <select class="select-info" id="payment" name="payment">
                        <option value="Thanh toan khi nhan hang">Thanh toán khi nhận hàng</option>
                    </select>
                    <button class="signup-submit">Đặt hàng</button>
                </form>
            </div>
        </div>

        <!-- bên phải hiển thị thông tin đơn hàng -->
        <div class="bill-cart">
            <div class="container-cart-bill">
                <div>
                    <h1 class="signup-heading">Thông tin đơn hàng</h1>
                </div>
                <table class="cart-detail">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($carts as $cart) {
                            $totalMoney = $cart['price'] * $cart['quantity'];
                            echo   '<tr>
                                        <td>
                                            <div class="product-img">
                                                <img id="img-product" src="' . BASEPATH . $cart['image'] . '">
                                            </div>
                                        </td>
                                        <td>' . $cart['name'] . '</td>
                                        <td>' . $cart['price'] . '</td>
                                        <td>' . $cart['quantity'] . '</td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="checkout">
                    <label>Tổng tiền hàng: </label><span id="totalMoney"><?php echo $totalMoney ?>$</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hàm cập nhập danh sách quận/huyện theo thành phố/tỉnh đã chọn -->
<script type="text/javascript">
    document.getElementById("province").addEventListener("change", function() {
        document.getElementById("district").innerHTML = "";
        var province_name = document.getElementById("province").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("district").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "district/" + province_name, true);
        xmlhttp.send();
    });
</script>

<!-- Hàm cập nhập danh sách phường/xã theo quận/huyện đã chọn -->
<script type="text/javascript">
    document.getElementById("district").addEventListener("change", function() {
        document.getElementById("ward").innerHTML = "";
        var district_name = document.getElementById("district").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ward").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ward/" + district_name, true);
        xmlhttp.send();
    });
</script>

<?php
unset($_SESSION['dangerous_bill']);
?>