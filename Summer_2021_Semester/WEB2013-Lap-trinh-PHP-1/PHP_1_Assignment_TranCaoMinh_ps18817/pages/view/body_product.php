<!-- BODY -->
        <div class="container">
            <aside>
                <div class="aside-cover"></div>
                <section class="select-bar">   
                    <!-- hien ra khi width thiet bi < 1024 -->
                    <button class="close-aside">
                        <i class="fas fa-window-close"></i>
                    </button>
                    <!-- mac dinh -->
                    <span class="heading">THỂ LOẠI:</span>
                    <ul class="select-list" id="category-list">
                        <!-- lay du lieu the loai tu database -->
                        <?php
                            require_once('../../admin/model/connect_database.php');
                            require_once('../../admin/model/get_data.php');

                            $ten_cac_cot = ['ma_danh_muc', 'ten_danh_muc'];
                            $all_category = layDuLieuCot('danh_muc', $ten_cac_cot);
                        ?>
                        <li class="select-item">
                            <input type="checkbox" id="all_category" checked>
                            <span class="checkbox-style">
                                <i class="fas fa-check"></i>
                            </span>
                            <label for="all_category">Tất cả</label>
                        </li>
                        <!-- hien thi danh sach the loai -->
                        <?php foreach ($all_category as $category): ?>
                            <li class="select-item">
                                <input type="checkbox" 
                                    id="<?php echo $category['ma_danh_muc']; ?>">
                                <span class="checkbox-style">
                                    <i class="fas fa-check"></i>
                                </span>
                                <label for="<?php echo $category['ma_danh_muc']; ?>">
                                    <?php echo ucfirst($category['ten_danh_muc']); ?>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <span class="heading">MỨC GIÁ:</span>
                    <ul class="select-list" id="price-range-list">
                        <li class="select-item">
                            <input type="checkbox" id="all_price" checked>
                            <span class="checkbox-style">
                                <i class="fas fa-check"></i>
                            </span>
                            <label for="all_price">Tất cả</label>
                        </li>
                        <li class="select-item">
                            <input type="checkbox" id="duoi_50_ngan">
                            <span class="checkbox-style">
                                <i class="fas fa-check"></i>
                            </span>
                            <label for="duoi_50_ngan">Dưới 50 ngàn</label>
                        </li>
                        <li class="select-item">
                            <input type="checkbox" id="tu_50_den_100_ngan">
                            <span class="checkbox-style">
                                <i class="fas fa-check"></i>
                            </span>
                            <label for="tu_50_den_100_ngan">Từ 50 đến 100 ngàn</label>
                        </li>
                        <li class="select-item">
                            <input type="checkbox" id="tu_100_den_150_ngan">
                            <span class="checkbox-style">
                                <i class="fas fa-check"></i>
                            </span>
                            <label for="tu_100_den_150_ngan">Từ 100 đến 150 ngàn</label>
                        </li>
                        <li class="select-item">
                            <input type="checkbox" id="tu_150_den_200_ngan">
                            <span class="checkbox-style">
                                <i class="fas fa-check"></i>
                            </span>
                            <label for="tu_150_den_200_ngan">Từ 150 đến 200 ngàn</label>
                        </li>
                        <li class="select-item">
                            <input type="checkbox" id="tren_200_ngan">
                            <span class="checkbox-style">
                                <i class="fas fa-check"></i>
                            </span>
                            <label for="tren_200_ngan">Trên 200 ngàn</label>
                        </li>
                    </ul>
                </section>
                <section class="advertise">
                    <img src="../../images/prod/ad.jpg" alt="">
                </section>
            </aside>
            <main>
                <section class="filter-bar">
                    <div class="contain-filter-sort">
                        <span class="title">SẮP XẾP THEO :</span>
                        <div class="filter-sort">
                            <span class="filter-sort-choosen" value="moi_nhat">Mới nhất</span>
                            <i class="fas fa-sort"></i>
                            <div class="space"></div>
                        </div>
                        <ul class="filter-sort-list" style="display: none;">
                            <li value="moi_nhat">Mới nhất</li>
                            <li value="noi_bat_nhat">Nổi bật nhất</li>
                            <li value="ban_chay_nhat">Bán chạy nhất</li>
                            <li value="gia_tang_dan">Giá tăng dần</li>
                            <li value="gia_giam_dan">Giá giảm dần</li>
                        </ul>
                    </div>
                    <button class="filter-btn">
                        BỘ LỌC <i class="fas fa-filter"></i>
                    </button>
                </section>
                <?php if (isset($_GET['key_word'])): ?>
                    <section class="search-key-word">
                        <span class="title">Kết quả tìm kiếm của từ khóa :</span>
                        <span class="key-word">
                            <?php echo $_GET['key_word']; ?>
                        </span> 
                    </section>
                <?php endif; ?>
                <section class="filter-tag-list">
                    <span class="title">Lọc theo :</span>
                    <span class="filter-by-all">
                        TẤT CẢ
                    </span> 
                </section>
                <section class="contain-prod-list">
                    <!-- them cac san pham qua file send_product_request.js -->
                </section>
            </main>
        </div>
<!-- END BODY -->