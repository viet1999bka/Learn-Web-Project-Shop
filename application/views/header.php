<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="<?php echo BASEPATH ?>/public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASEPATH ?>/public/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-top">
            <div class="navbar-link">
                <a href="#">Thông báo</a>
                <a href="#">Trợ giúp</a>
                <?php
                if (!isset($_SESSION['user_name'])) {
                    echo '<a href="' . BASEPATH . '/accounts/login">Đăng nhập</a>
                          <a href="' . BASEPATH . '/accounts/register">Đăng ký</a>';
                } else {
                    echo '<div class="dropdown">
                        <span> 
                        <img class="logo-user" src="' . PATH_URL_IMG . 'user.png" alt="cart logo">' . $_SESSION['user_name'] . '</img>
                        </span>
                        <br>    
                        <div class="dropdown-content">
                        <a href="' . BASEPATH . '/users/profile">Thông tin khách hàng</a>
                        <br>
                        <br>
                        <a href="' . BASEPATH . '/accounts/logout">Đăng xuất</a>
                        </div>
                        </div>';
                }
                ?>
            </div>
        </div>
        <div class="header-content">
            <div class="logo">
                <a href="<?php echo BASEPATH ?>/home/index"><img src="<?php echo PATH_URL_IMG ?>logo.png" alt="shop logo"></a>
            </div>
            <div class="search">
                <div class="search-input">
                    <form action="<?php echo BASEPATH ?>/products/search" method="POST" id="search" autocomplete="off">
                        <input type="text" id="keyword" name="keyword" value="<?php if (isset($keyword)) {
                                                                                    echo $keyword;
                                                                                } ?>" placeholder="Enter keyword here">
                    </form>
                </div>
                <button class="search-button" form="search"><img src="<?php echo PATH_URL_IMG ?>search.png" alt="search logo"></button>
            </div>
            <div class="cart">
                <a href="<?php echo BASEPATH ?>/carts/viewall"><img src="<?php echo PATH_URL_IMG ?>cart.png" alt="cart logo"> </a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var str = "<?php echo $words; ?>";
        var key = str.split(",");
        autocomplete(document.getElementById("keyword"), key);

        function autocomplete(inp, arr) {
            var currentFocus;
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                closeAllLists();
                if (!val) {
                    return false;
                }
                currentFocus = -1;
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                this.parentNode.appendChild(a);
                for (i = 0; i < arr.length; i++) {
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        b = document.createElement("DIV");
                        b.setAttribute("class", "items");
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        b.addEventListener("click", function(e) {
                            inp.value = this.getElementsByTagName("input")[0].value;
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    currentFocus++;
                    addActive(x);
                } else if (e.keyCode == 38) {
                    currentFocus--;
                    addActive(x);
                } else if (e.keyCode == 13) {
                    e.preventDefault();
                    if (currentFocus > -1) {
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                if (!x) return false;
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(elmnt) {
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });
        }
    </script>