            <main>
                <section class="heading">
                    <span class="fs-2 fw-bold text-center">
                        <i class="fas fa-bullseye"></i>&nbsp;
                        CHỈNH SỬA ĐỐI TƯỢNG SẢN PHẨM
                    </span>
                </section>
 
                <section class="function">
                    <!-- khu vuc thao tac chuc nang -->
                    <div class="control-area">
                        <!-- form dien thong tin de sua danh muc -->
                        <div id="chuc_nang_2">
                            <form class="bg-warning" action="../controller/manage_database.php" method="post"
                                enctype="multipart/form-data" >
                                <div class="form-group mt-4">
                                    <label>Thuộc danh mục</label>
                                    <select name="ma_danh_muc" class="form-select fs-2" required>
                                        <!-- hien thi cac ma danh muc qua php -->
                                        <?php foreach ($all_category as $category) : ?>
                                            <option 
                                                <?php 
                                                    if ($category['ma_danh_muc'] == $object_data_result['ma_danh_muc']) {
                                                        echo 'value="' . $category['ma_danh_muc'] . '"' . ' selected';

                                                    } else {
                                                        echo 'value="' . $category['ma_danh_muc'] . '"';
                                                    }
                                                ?>
                                            >
                                                <?php echo ucfirst($category['ten_danh_muc']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Mã sản phẩm</label>
                                    <input name="ma_san_pham_cu" type="hidden" 
                                        value="<?php echo $object_data_result['ma_san_pham'];?>" />
                                    <input name="ma_san_pham_moi" type="text" class="form-control fs-2" required maxlength="10" 
                                        value="<?php echo $object_data_result['ma_san_pham'];?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Tên sản phẩm</label>
                                    <input name="ten_san_pham" type="text" class="form-control fs-2" required maxlength="100" 
                                        value="<?php echo $object_data_result['ten_san_pham'];?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Đơn giá (VND)</label>
                                    <input name="don_gia" type="number" class="form-control fs-2" required min="1" max="1000000" step="0.1"
                                        value="<?php echo $object_data_result['don_gia'];?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Đơn vị tính</label>
                                    <input name="don_vi_tinh" type="text" class="form-control fs-2" required maxlength="100" 
                                        value="<?php echo $object_data_result['don_vi_tinh'];?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Nhà xuất bản</label>
                                    <input name="nha_xuat_ban" type="text" class="form-control fs-2" required maxlength="100"
                                        value="<?php echo $object_data_result['nha_xuat_ban'];?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Hình ảnh sản phẩm hiện tại</label>
                                    <input type="text" readonly class="form-control fs-2" name="ten_file_anh_cu"
                                        value="<?php echo $object_data_result['ten_file_anh'];?>" />
                                    <div class="contain-img">
                                        <img src="../../images/products/<?php echo $object_data_result['ten_file_anh'];?>" alt="">
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Tải lên ảnh mới nếu bạn muốn thay đổi ảnh sản phẩm</label>
                                    <input name="file_anh" type="file" class="form-control fs-2" accept="image/*"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea name="mo_ta" class="form-control fs-2" required maxlength="999" rows="9"><?php echo $object_data_result['mo_ta'];?></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Ngày tạo</label>
                                    <input name="ngay_tao" type="date" class="form-control fs-2" required
                                        value="<?php echo $object_data_result['ngay_tao'];?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Số lượt xem</label>
                                    <input name="so_luot_xem" type="number" class="form-control fs-2" required min="0" max="9999999999" step="1"
                                        value="<?php echo $object_data_result['so_luot_xem']; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Số lượng sản phẩm đã bán</label>
                                    <input name="so_luong_da_ban" type="number" class="form-control fs-2" required min="0" max="9999999999" step="1"
                                        value="<?php echo $object_data_result['so_luong_da_ban']; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Số lượng sản phẩm hiện có</label>
                                    <input name="so_luong_con_lai" type="number" class="form-control fs-2" required min="0" max="9999999999" step="1"
                                        value="<?php echo $object_data_result['so_luong_con_lai']; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Phần trăm giảm giá</label>
                                    <input name="phan_tram_giam_gia" type="number" class="form-control fs-2" required min="0" max="9999999999" step="1"
                                        value="<?php echo $object_data_result['phan_tram_giam_gia']; ?>"/>
                                </div>
                                <div class="form-group mt-4 mb-2">
                                    <button name="submit" type="submit" value="sua_san_pham"
                                        class="btn btn-dark fs-2 py-2 px-4 mb-3">
                                        Sửa sản phẩm
                                    </button>
                                    <a class="btn btn-success fs-2 py-2 px-4 mb-3"
                                        href="../controller/manage_database.php?page=quan_ly_san_pham">
                                        Quay về trang quản lý sản phẩm
                                    </a>
                                </div>
                            </form>
                        </div>