<!-- FOOTER -->
        <footer>
            <div class="footer-bar">
                <div class="logo">
                    <img src="../../images/general/logo-thienHaBook-hoanThien-b.png" alt="">
                </div>
                <div class="contact">
                    <div class="title">LIÊN HỆ</div>
                    <div class="location">
                        <i class="fas fa-map-marker-alt"></i>
                        2252/22C, Tân Chánh Hiệp, Q.12, TP. HCM
                    </div>
                    <div class="email">
                        <i class="fas fa-envelope"></i>
                        info@thienhabook.com
                    </div>
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        1900636465
                    </div>
                    <nav class="social-media-bar">
                        <a href="https://www.facebook.com/TranCaoMinhFPT">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram-square"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube-square"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-pinterest-square"></i>
                        </a>
                    </nav>
                </div>
                <div class="payment-methods">
                    <div class="title">PHƯƠNG THỨC THANH TOÁN</div>
                    <div class="contain-img">
                        <img src="../../images/general/visa.svg" alt="">
                        <img src="../../images/general/mastercard.svg" alt="">
                        <img src="../../images/general/jcb.svg" alt="">
                        <img src="../../images/general/cash.svg" alt="">
                        <img src="../../images/general/internet-banking.svg" alt="">
                        <img src="../../images/general/installment.svg" alt="">
                    </div>
                </div>
            </div>
        </footer>
        <button id="to-top">
            <i class="fas fa-chevron-circle-left"></i>
        </button>
        <div id="full-screen-notification">
            <div class="contain-notification">
                <div class="notification">
                    <span class="content">
                        <!-- noi dung duoc quyet dinh boi file js -->
                    </span>
                </div>
                <!-- <img src="../../images/general/create-by-TCM.png" alt=""> -->
                <div class="close">
                    <i class="far fa-times-circle"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- link js -->
    <!-- dung php tao cac link js -->
    <?php foreach ($link_javascript_arr as $link_javascript) : ?>
        <script src="<?php echo $link_javascript; ?>"></script>
    <?php endforeach; ?>
</body>

</html>
<!-- END FOOTER -->