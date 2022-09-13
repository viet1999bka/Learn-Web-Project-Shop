<?php
if (isset($_SESSION['access_bill'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['access_bill'] . "');</script>";
}
if (isset($_SESSION['empty_bill'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['empty_bill'] . "');</script>";
}
?>

<div class="content">
    <!-- slideshow -->
    <div class="slideshow-container">
        <div class="slide">
            <img class="slide-img" src="<?php echo PATH_URL_IMG ?>banner1.jpg">
        </div>
        <div class="slide">
            <img class="slide-img" src="<?php echo PATH_URL_IMG ?>banner2.jpg">
        </div>
        <div class="slide">
            <img class="slide-img" src="<?php echo PATH_URL_IMG ?>banner3.jpg">
        </div>
        <div class="slide">
            <img class="slide-img" src="<?php echo PATH_URL_IMG ?>banner4.png">
        </div>
        <div class="slide">
            <img class="slide-img" src="<?php echo PATH_URL_IMG ?>banner5.jpg">
        </div>
        <div class="slide">
            <img class="slide-img" src="<?php echo PATH_URL_IMG ?>banner6.jpg">
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <!-- Danh mục -->
    <div class="container-home">
        <div class="container-home-header">
            <a href="<?php echo BASEPATH ?>/categories/viewall">Danh mục sản phẩm</a>
        </div>
        <ul class="categories-menu">
            <?php
            if (!empty($categories)) {
                foreach ($categories as $category) {
            ?>
                    <li>
                        <a href="<?php echo BASEPATH ?>/categories/view/<?php echo $category['id'] ?>"><span><?php echo $category['name'] ?></span></a>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>

    <!-- Top 5 sản phẩm đắt nhất -->
    <div class="container-home">
        <div class="container-home-header">
            <a>Top sản phẩm đắt tiền</a>
        </div>
        <div class="container-flex">
            <div class="products">
                <div class="products-list">
                    <?php
                    if (!empty($productsExpensive)) {
                        foreach ($productsExpensive as $productExpensive) {
                    ?>
                            <div class="product" style="width: 20%;">
                                <div class="product-view">
                                    <div class="product-img">
                                        <a href="<?php echo BASEPATH ?>/products/view/<?php echo $productExpensive['id'] ?>"><img id="img-product" src="<?php echo BASEPATH . $productExpensive['image'] ?>"></a>
                                    </div>
                                    <div class="product-info">
                                        <div id="name-product"><?php echo $productExpensive['name'] ?></div>
                                        <div id="price-product"><?php echo $productExpensive['price'] ?>$</div>
                                        <div id="btn-add-to-cart">
                                            <a href="<?php echo BASEPATH ?>/products/view/<?php echo $productExpensive['id'] ?>">
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

    <!-- Top 5 sản phẩm đắt nhất -->
    <div class="container-home">
        <div class="container-home-header">
            <a>Top sản phẩm rẻ tiền</a>
        </div>
        <div class="container-flex">
            <div class="products">
                <div class="products-list">
                    <?php
                    if (!empty($productsCheap)) {
                        foreach ($productsCheap as $productCheap) {
                    ?>
                            <div class="product" style="width: 20%;">
                                <div class="product-view">
                                    <div class="product-img">
                                        <a href="<?php echo BASEPATH ?>/products/view/<?php echo $productCheap['id'] ?>"><img id="img-product" src="<?php echo BASEPATH . $productCheap['image'] ?>"></a>
                                    </div>
                                    <div class="product-info">
                                        <div id="name-product"><?php echo $productCheap['name'] ?></div>
                                        <div id="price-product"><?php echo $productCheap['price'] ?>$</div>
                                        <div id="btn-add-to-cart">
                                            <a href="<?php echo BASEPATH ?>/products/view/<?php echo $productCheap['id'] ?>">
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
</div>

<script type="text/javascript">
    var slideIndex = 0;
    showSlide(slideIndex);

    function plusSlides(n) {
        slideIndex += n;
        showSlide(slideIndex);
    }

    function showSlide(n) {
        var slides = document.getElementsByClassName("slide");
        if (n > slides.length - 1) {
            slideIndex = 0;
        }
        if (n < 0) {
            slideIndex = slides.length - 1;
        }
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex].style.display = "block";
    }
</script>



<?php
unset($_SESSION['access_bill']);
unset($_SESSION['empty_bill']);
?>