                        <!-- chuc nang them danh muc -->
                        <div id="chuc_nang_5">
                            <?php
                                if ($action == 'them_danh_muc') {
                                    $ma_danh_muc = $_GET['ma_danh_muc'];
                                    $ten_danh_muc = $_GET['ten_danh_muc'];

                                } else {
                                    $ma_danh_muc = '';
                                    $ten_danh_muc = '';
                                }
                            ?> 
                            <form class="bg-success text-light" action="../controller/manage_database.php" method="get">
                                <div class="form-group mt-4">
                                    <label>Mã danh mục</label>
                                    <input name="ma_danh_muc" type="text" class="form-control fs-3" required maxlength="10" 
                                        value="<?php echo $ma_danh_muc; ?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Tên danh mục</label>
                                    <input name="ten_danh_muc" type="text" class="form-control fs-3" required maxlength="100"
                                        value="<?php echo $ten_danh_muc; ?>" />
                                </div>
                                <div class="form-group mt-4 mb-2">
                                    <button name="submit" type="submit" class="btn btn-dark fs-3 py-2 px-4" 
                                        value="them_danh_muc">
                                        Thêm danh mục
                                    </button>
                                </div>
                            </form>
                        </div>