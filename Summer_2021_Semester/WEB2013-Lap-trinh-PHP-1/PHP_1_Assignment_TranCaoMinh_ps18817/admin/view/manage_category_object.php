            <main>
                <section class="heading">
                    <span class="fs-2 fw-bold text-center">
                        <i class="fas fa-bullseye"></i>&nbsp;
                        CHỈNH SỬA ĐỐI TƯỢNG DANH MỤC
                    </span>
                </section>
 
                <section class="function">
                    <!-- khu vuc thao tac chuc nang -->
                    <div class="control-area">
                        <!-- form dien thong tin de sua danh muc -->
                        <div id="chuc_nang_2">
                            <form class="bg-warning" action="../controller/manage_database.php" method="get">
                                <div class="form-group mt-4">
                                    <label>Mã danh mục</label>
                                    <input name="ma_danh_muc_cu" type="hidden" 
                                        value="<?php echo $object_data_result['ma_danh_muc'];?>" />
                                    <input name="ma_danh_muc_moi" type="text" class="form-control fs-2" maxlength="10" required 
                                        value="<?php echo $object_data_result['ma_danh_muc'];?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Tên danh mục</label>
                                    <input name="ten_danh_muc" type="text" class="form-control fs-2" maxlength="100"
                                        required value="<?php echo $object_data_result['ten_danh_muc'];?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Ngày tạo</label>
                                    <input name="ngay_tao" type="date" class="form-control fs-2" required
                                        value="<?php echo $object_data_result['ngay_tao'];?>" />
                                </div>
                                <div class="form-group mt-4 mb-2">
                                    <button name="submit" type="submit" value="sua_danh_muc"
                                        class="btn btn-dark fs-2 py-2 px-4 mb-3">
                                        Sửa danh mục
                                    </button>
                                    <a class="btn btn-success fs-2 py-2 px-4 mb-3"
                                        href="../controller/manage_database.php?page=quan_ly_danh_muc">
                                        Quay về trang quản lý danh mục
                                    </a>
                                </div>
                            </form>
                        </div>