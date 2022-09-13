    <!-- Footer -->
    <div class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <h2 class="footer-content-header">Thành viên</h2>
                <ul>
                    <li><a>Dương Kim Trường</a></li>
                    <li><a>Phan Thế Việt</a></li>
                    <li><a>Phan Thành Long</a></li>
                    <li><a>Tô Đăng Khoa</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <h2 class="footer-content-header">Giới thiệu</h2>
                <ul>
                    <li><a>Giới thiệu</a></li>
                    <li><a>Tuyển dụng</a></li>
                    <li><a>Điều khoản</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <h2 class="footer-content-header">Theo dõi</h2>
                <ul>
                    <li><a><img src="<?php echo PATH_URL_IMG ?>github.png">Github</a></li>
                    <li><a><img src="<?php echo PATH_URL_IMG ?>facebook.png">Facebook</a></li>
                    <li><a><img src="<?php echo PATH_URL_IMG ?>instagram.png">Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2020 Shop. All rights reserved</p>
        </div>
    </div>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    </body>

    </html>