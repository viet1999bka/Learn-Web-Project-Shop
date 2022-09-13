    <!-- Nội dung trang tìm kiếm sản phẩm -->
    <div class="content">
        <div class="search-title">
            <h1 id="search-title-content"><?php echo $count ?> kết quả tìm kiếm cho từ khóa "<?php echo $keyword ?>"</h1>
        </div>
        <div class="container-flex">
            <div class="products">
                <div class="products-list" id="products-list-search">
                    <?php
                    if (!empty($products)) {
                        foreach ($products as $product) {
                    ?>
                            <div class="product">
                                <div class="product-view">
                                    <div class="product-img">
                                        <a href="<?php echo BASEPATH ?>/products/view/<?php echo $product['id'] ?>"><img id="img-product" src="<?php echo BASEPATH . $product['image'] ?>"></a>
                                    </div>
                                    <div class="product-info">
                                        <div id="name-product"><?php echo $product['name'] ?></div>
                                        <div id="price-product"><?php echo $product['price'] ?>$</div>
                                        <div id="btn-add-to-cart">
                                            <a href="<?php echo BASEPATH ?>/products/view/<?php echo $product['id'] ?>">
                                                <button>Xem chi tiết</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>