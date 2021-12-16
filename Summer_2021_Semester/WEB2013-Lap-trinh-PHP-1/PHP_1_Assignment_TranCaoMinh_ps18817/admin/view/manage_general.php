            <main>
                <section class="heading">
                    <span class="fs-2 fw-bold text-center">
                        <?php echo $page_name; ?>
                    </span>
                </section>
 
                <section class="function">
                    <!-- thanh lua chon chuc nang -->
                    <div class="select-bar ">
                        <button class="btn" data-id="chuc_nang_1">
                            <span class="fs-3 fw-bold">
                                <i class="fas fa-filter"></i>&nbsp;
                                bộ lọc
                            </span>
                        </button>
                        <button class="btn" data-id="chuc_nang_2">
                            <span class="fs-3 fw-bold">
                                <i class="fas fa-trash-alt"></i>&nbsp;
                                xóa
                            </span>
                        </button>
                        <button class="btn" data-id="chuc_nang_3">
                            <span class="fs-3 fw-bold">
                                <i class="fas fa-wrench"></i>&nbsp;
                                sửa
                            </span>
                        </button>
                        <button class="btn" data-id="chuc_nang_5">
                            <span class="fs-3 fw-bold">
                                <i class="fas fa-folder-plus"></i>&nbsp;
                                thêm
                            </span>
                        </button>
                        <form action="../controller/manage_database.php" method="get">
                            <button class="btn" data-id="chuc_nang_4" 
                                type="submit" name="submit" 
                                value="hien_thi_du_lieu">
                                <span class="fs-3 fw-bold">
                                    <i class="fas fa-table"></i>&nbsp;
                                    hiện bảng
                                </span>
                            </button>
                        </form>
                    </div>
                    <!-- khu vuc thao tac chuc nang -->
                    <div class="control-area">
                        <!-- chuc nang loc danh muc -->
                        <div id="chuc_nang_1">
                            <?php
                                if ($action == 'loc_du_lieu') {
                                    $so_cot_hien_thi = $_GET['so_cot_hien_thi'];
                                    $cot_duoc_loc = $_GET['cot_duoc_loc'];
                                    $gia_tri_loc_start = $_GET['gia_tri_loc_start'];
                                    $gia_tri_loc_end = $_GET['gia_tri_loc_end'];
                                    $gia_tri_loc_xac_dinh = $_GET['gia_tri_loc_xac_dinh'];
                                    $sap_xep_theo_cot = $_GET['sap_xep_theo_cot'];
                                    $co_che_sap_xep = $_GET['co_che_sap_xep'];

                                } else {
                                    $cot_duoc_loc = '';  
                                    $gia_tri_loc_start = ''; 
                                    $gia_tri_loc_end = ''; 
                                    $gia_tri_loc_xac_dinh = '';
                                    $sap_xep_theo_cot = '';
                                    $co_che_sap_xep = '';
                                    $so_cot_hien_thi = '25';
                                }
                            ?>
                            <form class="bg-primary text-light" action="../controller/manage_database.php" method="get">
                                <div class="form-group mt-4">
                                    <label>Lọc theo giá trị của cột (Có thể bỏ qua)</label>
                                    <select name="cot_duoc_loc" class="form-select fs-3">
                                        <!-- hien thi cac cot qua php -->
                                        <?php foreach ($all_columns_name as $column_name) : ?>
                                            <option 
                                                <?php 
                                                    if ($column_name['Field'] == $cot_duoc_loc) {
                                                        echo 'value="' . $column_name['Field'] . '"' . ' selected';

                                                    } else {
                                                        echo 'value="' . $column_name['Field'] . '"';
                                                    }
                                                ?>
                                            >
                                                <?php echo $column_name['Comment']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-group mt-2">
                                    <label class="input-group-text fs-3">Từ giá trị (Nhỏ nhất):</label>
                                    <input name="gia_tri_loc_start" type="text" class="form-control fs-3" maxlength="100" 
                                        value="<?php echo $gia_tri_loc_start; ?>" />
                                </div>
                                <div class="input-group mt-2">
                                    <label class="input-group-text fs-3">Đến giá trị (Lớn nhất):</label>
                                    <input name="gia_tri_loc_end" type="text" class="form-control fs-3" maxlength="100" 
                                        value="<?php echo $gia_tri_loc_end; ?>" />
                                </div>
                                <div class="input-group mt-2">
                                    <label class="input-group-text fs-3">Hoặc nhập giá trị xác định:</label>
                                    <input name="gia_tri_loc_xac_dinh" type="text" class="form-control fs-3" maxlength="100" 
                                        value="<?php echo $gia_tri_loc_xac_dinh; ?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Sắp xếp theo cột</label>
                                    <select name="sap_xep_theo_cot" class="form-select fs-3" required>
                                        <!-- hien thi cac cot qua php -->
                                        <?php foreach ($all_columns_name as $column_name) : ?>
                                            <option 
                                                <?php 
                                                    if ($column_name['Field'] == $sap_xep_theo_cot) {
                                                        echo 'value="' . $column_name['Field'] . '"' . ' selected';

                                                    } else {
                                                        echo 'value="' . $column_name['Field'] . '"';
                                                    }
                                                ?>
                                            >
                                            <?php echo $column_name['Comment']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Chọn cơ chế sắp xếp</label>
                                    <select name="co_che_sap_xep" class="form-select fs-3" required>
                                        <option value="DESC" 
                                            <?php
                                                if ($co_che_sap_xep == 'DESC') {
                                                    echo 'selected';
                                                }
                                            ?>
                                        >
                                            Giảm dần
                                        </option>
                                        <option value="ASC"
                                            <?php
                                                if ($co_che_sap_xep == 'ASC') {
                                                    echo 'selected';
                                                }
                                            ?>
                                        >
                                            Tăng dần
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Số cột hiển thị tối đa</label>
                                    <input name="so_cot_hien_thi" type="number" class="form-control fs-3" max="500" min="1" 
                                        value="<?php echo $so_cot_hien_thi; ?>" />
                                </div>
                                <div class="form-group mt-4 mb-2">
                                    <button name="submit" type="submit" class="btn btn-dark fs-3 py-2 px-4"
                                        value="loc_du_lieu">
                                            Lọc dữ liệu
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- chuc nang xoa danh muc -->
                        <div id="chuc_nang_2">
                            <?php
                                if ($action == 'xoa_du_lieu') {
                                    $cot_can_tim_kiem = $_GET['cot_can_tim_kiem'];
                                    $gia_tri_can_tim = $_GET['gia_tri_can_tim'];

                                } else {
                                    $cot_can_tim_kiem = '';
                                    $gia_tri_can_tim = '';
                                }
                            ?>
                            <form class="bg-danger text-light" action="../controller/manage_database.php" method="get">
                                <div class="form-group mt-4">
                                    <label>Tìm kiếm theo cột</label>
                                    <select name="cot_can_tim_kiem" class="form-select fs-3" required>
                                        <!-- hien thi cac cot qua php -->
                                        <?php foreach ($all_columns_name as $column_name) : ?>
                                        <option
                                            <?php 
                                                    if ($column_name['Field'] == $cot_can_tim_kiem) {
                                                        echo 'value="' . $column_name['Field'] . '"' . ' selected';

                                                    } else {
                                                        echo 'value="' . $column_name['Field'] . '"';
                                                    }
                                            ?>
                                        >
                                            <?php echo $column_name['Comment']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Giá trị cần tìm</label>
                                    <input name="gia_tri_can_tim" type="text" class="form-control fs-3" required maxlength="100" 
                                        value="<?php echo $gia_tri_can_tim; ?>" />
                                </div>
                                <div class="form-group mt-4 mb-2">
                                    <button name="submit" type="submit" class="btn btn-dark fs-3 py-2 px-4"
                                        value="xoa_du_lieu">
                                        Xóa dữ liệu
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- chuc nang sua danh muc -->
                        <div id="chuc_nang_3">
                            <?php
                                if ($action == 'sua_du_lieu') {
                                    $cot_can_tim_kiem = $_GET['cot_can_tim_kiem'];
                                    $gia_tri_can_tim = $_GET['gia_tri_can_tim'];
                                    $cot_can_sua = $_GET['cot_can_sua'];
                                    $gia_tri_muon_sua = $_GET['gia_tri_muon_sua'];

                                } else {
                                    $cot_can_tim_kiem = '';
                                    $gia_tri_can_tim = '';
                                    $cot_can_sua = '';
                                    $gia_tri_muon_sua = '';
                                }
                            ?>
                            <form class="bg-warning" action="../controller/manage_database.php" method="get">
                                <div class="form-group mt-4">
                                    <label>Tìm kiếm theo cột</label>
                                    <select name="cot_can_tim_kiem" class="form-select fs-3" required>
                                        <!-- hien thi cac cot qua php -->
                                        <?php foreach ($all_columns_name as $column_name) : ?>
                                        <option 
                                            <?php 
                                                if ($column_name['Field'] == $cot_can_tim_kiem) {
                                                    echo 'value="' . $column_name['Field'] . '"' . ' selected';

                                                } else {
                                                    echo 'value="' . $column_name['Field'] . '"';
                                                }
                                            ?>
                                        >
                                            <?php echo $column_name['Comment']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Giá trị cần tìm</label>
                                    <input name="gia_tri_can_tim" type="text" class="form-control fs-3" required maxlength="100" 
                                        value="<?php echo $gia_tri_can_tim; ?>" />
                                </div>
                                <div class="form-group mt-4">
                                    <label>Chọn cột cần sửa</label>
                                    <select name="cot_can_sua" class="form-select fs-3" required>
                                        <!-- hien thi cac cot qua php -->
                                        <?php foreach ($all_columns_name as $column_name) : ?>
                                        <option
                                            <?php 
                                                if ($column_name['Field'] == $cot_can_sua) {
                                                    echo 'value="' . $column_name['Field'] . '"' . ' selected';

                                                } else {
                                                    echo 'value="' . $column_name['Field'] . '"';
                                                }
                                            ?>
                                        >
                                            <?php echo $column_name['Comment']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label>Giá trị muốn sửa</label>
                                    <input name="gia_tri_muon_sua" type="text" class="form-control fs-3" required maxlength="100" 
                                        value="<?php echo $gia_tri_muon_sua; ?>" />
                                </div>
                                <div class="form-group mt-4 mb-2">
                                    <button name="submit" type="submit" class="btn btn-dark fs-3 py-2 px-4" 
                                        value="sua_du_lieu">
                                        Sửa dữ liệu
                                    </button>
                                </div>
                            </form>
                        </div>