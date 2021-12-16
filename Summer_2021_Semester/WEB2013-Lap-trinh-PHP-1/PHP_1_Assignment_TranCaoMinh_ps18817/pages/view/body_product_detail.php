<?php
    require_once('../../admin/model/connect_database.php');
    require_once('../model/get_product_detail_data.php');

    if (isset($_GET['ma_san_pham'])) {
        $ma_san_pham = $_GET['ma_san_pham'];
        $product = getProductDetailData($ma_san_pham); //get_product_detail_data.php

    } else {
        $product = '';
    }

?>
    <!-- BODY -->
        <section class="page-name">
            <span>
                sản phẩm chi tiết
            </span>

            <?php if($product == ''): ?> 
                <div class="product-id-false">
                    <i class="fas fa-swatchbook"></i>
                    <span>
                        Không có sản phẩm thuộc mã sản phẩm này <br>
                        Bạn vui lòng quay lại trang chủ nhé!
                    </span>
                    <a href="./index.php">
                        quay về trang chủ
                    </a>
                </div>
            <?php endif; ?>
        </section>

        <?php if($product != ''): ?>
            <section class="product-detail">
                <div class="contain-img">
                    <img src="../../images/products/<?php echo $product['ten_file_anh']; ?>" 
                        alt="<?php echo $product['ten_san_pham']; ?>">
                </div>
                <div class="contain-information"> 
                    <span class="product-name">
                        <?php echo $product['ten_san_pham']; ?>
                    </span>
                    <span class="publishing-house">
                        Nhà xuất bản: <b><?php echo $product['nha_xuat_ban']; ?></b>
                    </span>
                    <div class="product-price">
                        <span class="price">
                            <?php echo number_format($product['don_gia'], 0, ',', '.'); ?>đ
                        </span>
                        <span class="old-price">
                            <?php 
                                // tinh gia goc theo phan tram giam gia
                                $old_price = ($product['don_gia'] / (100 - $product['phan_tram_giam_gia']));
                                $old_price = ceil($old_price) * 100;
                                echo number_format($old_price, 0, ',', '.'); 
                            ?>đ
                        </span>
                        <span class="sale-percent">
                            <?php echo $product['phan_tram_giam_gia']; ?>%
                        </span>
                    </div>
                    <span class="view">
                        Số lượt xem:
                        <?php echo $product['so_luot_xem']; ?>
                        <i class="fas fa-eye"></i>
                    </span>
                    <button class="add-to-cart" type="button">
                        thêm vào&nbsp;
                        <i class="fas fa-cart-plus"></i>
                    </button>
                    <span class="title">
                        Mô tả:
                    </span>
                    <pre class="description"><?php echo $product['mo_ta']; ?></pre>
                </div>
            </section>
            <section class="contain-comment">
                <div class="post-comment">
                    <div class="input-area">
                        <i class="fas fa-user"></i>
                        <textarea rows="3" maxlength="200" placeholder="Nhập bình luận của bạn ..."></textarea>
                    </div>
                    <div class="post-area">
                        <button class="post" type="submit" data-product_id="<?php echo $ma_san_pham; ?>">
                            đăng bình luận &nbsp;
                            <i class="fas fa-comments"></i>
                        </button>
                    </div>
                </div>
                <?php
                    increaseProductView($ma_san_pham);
                    $comment_list = getCommentOfProduct($ma_san_pham);
                ?>
                <ul class="comment-list">
                    <?php foreach ($comment_list as $comment): ?>
                        <li class="comment-item">
                            <div class="comment-information">
                                <span class="user-name">
                                    <?php echo $comment['ten_khach_hang']; ?> -&nbsp;
                                </span>
                                <span class="post-date">
                                    Ngày: 
                                    <?php 
                                        $ngay_tao = date_create($comment['ngay_tao']);
                                        echo date_format($ngay_tao, "d-m-Y"); 
                                    ?>
                                </span>
                            </div>
                            <span class="content">
                                <?php echo $comment['noi_dung']; ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>
        <!-- END BODY -->