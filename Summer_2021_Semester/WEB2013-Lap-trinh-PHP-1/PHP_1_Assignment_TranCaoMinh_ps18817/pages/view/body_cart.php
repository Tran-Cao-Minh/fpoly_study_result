<!-- BODY -->
        <main>
            <!-- truong hop gio hang trong -->
            <section class="cart-empty" style="display: none;">
                <div class="heading">
                    <span>
                        GIỎ HÀNG TRỐNG
                    </span>
                </div>
                <div class="contain-img">
                    <img src="../../images/cart/empty-cart.png" alt="">
                </div>
                <div class="note">
                    <span>
                        Chưa có sản phẩm trong giỏ hàng của bạn.
                    </span>
                </div>
                <a href="../controller/index.php?action=san_pham">
                    <button class="continue-shopping">
                        TIẾP TỤC MUA SẮM
                    </button>
                </a>
            </section>
            <!-- truong hop gio hang co san pham -->
            <section class="cart-detail" style="display: none;">
                <div class="heading">
                    <span>
                        CHI TIẾT GIỎ HÀNG
                    </span>
                </div>
                <ul class="prod-list">
                    <!-- se them vao prod item qua file js -->
                </ul>
                <div class="pay-area">
                    <div class="discount-code">
                        <div class="title">
                            <span>
                                NHẬP MÃ KHUYẾN MÃI (NẾU CÓ):
                            </span>
                            <button class="view-more">
                                XEM THÊM
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <div class="enter-code">
                            <input type="text">
                            <button class="apply">
                                ÁP DỤNG
                            </button>
                        </div>
                    </div>
                    <div class="total">
                        <div class="content">
                            <span class="title">
                                TỔNG SỐ TIỀN:
                            </span>
                            <span class="price">
                                <!-- tong so tien duoc tinh tai file js -->
                            </span>
                        </div>
                        <button class="pay">
                            THANH TOÁN
                        </button>
                    </div>
                </div>
            </section>
        </main>
<!-- END BODY -->