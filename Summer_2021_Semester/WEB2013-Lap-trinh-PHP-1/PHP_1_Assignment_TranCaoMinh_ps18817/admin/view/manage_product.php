                        <!-- chuc nang them san pham -->
                        <div id="chuc_nang_5">
                            <?php
                                if ($action == 'them_san_pham') {
                                    $ma_danh_muc = $_POST['ma_danh_muc'];
                                    $ma_san_pham = $_POST['ma_san_pham'];
                                    $ten_san_pham = $_POST['ten_san_pham'];
                                    $don_gia = $_POST['don_gia']; 
                                    $don_vi_tinh = $_POST['don_vi_tinh'];
                                    $nha_xuat_ban = $_POST['nha_xuat_ban'];
                                    $mo_ta = $_POST['mo_ta'];
                                    $so_luong_con_lai = $_POST['so_luong_con_lai'];
                                    $phan_tram_giam_gia = $_POST['phan_tram_giam_gia'];

                                } else {
                                    $ma_danh_muc = '';
                                    $ma_san_pham = '';
                                    $ten_san_pham = '';
                                    $don_gia = ''; 
                                    $don_vi_tinh = '';
                                    $nha_xuat_ban = '';
                                    $mo_ta = '';
                                    $so_luong_con_lai = '';
                                    $phan_tram_giam_gia = '15';
                                }
                            ?> 
                            <form class="bg-success text-light" action="../controller/manage_database.php" method="post"
                                enctype="multipart/form-data" >
                                <div class="form-group mt-4">
                                    <label>Thuộc danh mục</label>
                                    <select name="ma_danh_muc" class="form-select fs-2" required>
                                        <!-- hien thi cac ma danh muc qua php -->
                                        <?php foreach ($all_category as $category) : ?>
                                            <option 
                                                <?php 
                                                    if ($category['ma_danh_muc'] == $ma_danh_muc) {
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
                                    <input name="ma_san_pham" type="text" class="form-control fs-2" required maxlength="10" 
                                        value="<?php echo $ma_san_pham; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Tên sản phẩm</label>
                                    <input name="ten_san_pham" type="text" class="form-control fs-2" required maxlength="100" 
                                        value="<?php echo $ten_san_pham; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Đơn giá (VND)</label>
                                    <input name="don_gia" type="number" class="form-control fs-2" required min="1000" max="9999999900" step="100"
                                        value="<?php echo $don_gia; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Đơn vị tính</label>
                                    <input name="don_vi_tinh" type="text" class="form-control fs-2" required maxlength="100" 
                                        value="<?php echo $don_vi_tinh; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Nhà xuất bản</label>
                                    <input name="nha_xuat_ban" type="text" class="form-control fs-2" required maxlength="100"
                                        value="<?php echo $nha_xuat_ban; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input name="file_anh" type="file" class="form-control fs-2" required accept="image/*" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea name="mo_ta" class="form-control fs-2" required maxlength="999" rows="9"><?php echo $mo_ta; ?></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Số lượng sản phẩm hiện có</label>
                                    <input name="so_luong_con_lai" type="number" class="form-control fs-2" required min="0" max="9999999999" step="1"
                                        value="<?php echo $so_luong_con_lai; ?>"/>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Phần trăm giảm giá</label>
                                    <input name="phan_tram_giam_gia" type="number" class="form-control fs-2" required min="0" max="100" step="1"
                                        value="<?php echo $phan_tram_giam_gia; ?>"/>
                                </div>
                                <div class="form-group mt-4 mb-2">
                                    <button name="submit" type="submit" class="btn btn-dark fs-3 py-2 px-4" 
                                        value="them_san_pham">
                                        Thêm sản phẩm
                                    </button>
                                </div>
                            </form>
                        </div>