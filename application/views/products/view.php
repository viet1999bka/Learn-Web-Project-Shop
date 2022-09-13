<?php
if (isset($_SESSION['access_add_product'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['access_add_product'] . "');</script>";
}
if (isset($_SESSION['dangerous_add_product'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['dangerous_add_product'] . "');</script>";
}
?>
<!-- nội dung trang xem chi tiết sản phẩm -->
<div class="content">
    <div class="container-product">
        <form class="form-cart" action="<?php echo BASEPATH ?>/carts/add" method="POST">
            <input id="product_id" name="product_id" value="<?php echo $product['id'] ?>" hidden>
            <div class="left">
                <div class="product-img">
                    <img id="img-product" src="<?php echo BASEPATH . $product['image'] ?>">
                </div>
            </div>
            <div class="right">
                <div class="product-detail">
                    <h3>Tên sản phẩm:</h3><span><?php echo $product['name'] ?></span>
                </div>
                <div class="product-detail">
                    <h3>Giá sản phẩm:</h3><span><?php echo $product['price'] ?>$</span>
                </div>
                <div class="product-detail">
                    <h3>Chi tiết sản phẩm:</h3>
                    <p>
                        <?php echo $product['detail'] ?>
                    </p>
                </div>
                <div class="product-detail">
                    <label>Số lượng: </label><input style="width: 44px;" type="number" id="quantity" name="quantity" value="1" min="1">
                </div>
                <div class="product-detail">
                    <div id="btn-add-to-cart"><button>Add to cart</button></div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
unset($_SESSION['access_add_product']);
unset($_SESSION['dangerous_add_product']);
?>