                <!-- khu vuc xem bang du lieu -->
                <section class="contain-table">
                    <div class="heading">
                        <h1 class="fw-bold text-center">
                            HIỂN THỊ DỮ LIỆU
                        </h1>
                    </div>
                    <table class="table table-light table-striped table-hover fs-3">
                        <thead class="table-secondary">
                            <tr>
                                <!-- chon cac cot duoc hien thi -->
                                <th id="chon_cot_hien_thi">
                                    <span>
                                        Xử lý nhanh
                                    </span>
                                </th>
                                <!-- lay ra cac ten cot lam th -->
                                <?php foreach ($all_columns_name as $columns_name) : ?>
                                <th>
                                    <span>
                                        <?php echo $columns_name['Comment'] . '&nbsp;'; ?>
                                        <!-- hien thi ky hieu cua cot neu duoc sap xep theo -->
                                        <?php 
                                                // tao bien co che sap xep mac dinh cua cot
                                                $co_che_sap_xep_cua_cot = 'DESC';
                                                // mac dinh la khong sap xep gi
                                                $ky_hieu_sap_xep = '<i class="fas fa-minus-circle text-warning"></i>';
                                                if (isset($sap_xep_theo_cot) && isset($co_che_sap_xep)) {
                                                    if (
                                                        $columns_name['Field'] == $sap_xep_theo_cot && 
                                                        $co_che_sap_xep == 'DESC'
                                                    ) {
                                                        // truong hop giam dan
                                                        $ky_hieu_sap_xep = '<i class="fas fa-arrow-alt-circle-down text-danger"></i>';
                                                        // chuyen doi co che sap xep de su dung cho form tu sap xep ben duoi
                                                        $co_che_sap_xep_cua_cot = 'ASC';
                                                    } else if (
                                                        $columns_name['Field'] == $sap_xep_theo_cot && 
                                                        $co_che_sap_xep == 'ASC'
                                                    ) { 
                                                        // truong hop tang dan
                                                        $ky_hieu_sap_xep = '<i class="fas fa-arrow-alt-circle-up text-success"></i>';
                                                    }
                                                }
                                                // hien ky hieu tuong ung
                                                echo $ky_hieu_sap_xep;
                                            ?>
                                        <!-- tao form bao phu de khi nhan vao thi tu sap xep theo cot -->
                                        <?php 
                                            if (!isset($so_cot_hien_thi)) {
                                                $so_cot_hien_thi = 25;
                                            }
                                            if (!isset($cot_duoc_loc)) {
                                                $cot_duoc_loc = '';
                                            }
                                            if (!isset($gia_tri_loc_start)) {
                                                $gia_tri_loc_start = '';
                                            }
                                            if (!isset($gia_tri_loc_end)) {
                                                $gia_tri_loc_end = '';
                                            }
                                            if (!isset($gia_tri_loc_xac_dinh)) {
                                                $gia_tri_loc_xac_dinh = '';
                                            }

                                        ?>
                                        <form action="../controller/manage_database.php" method="get">
                                            <input name="so_cot_hien_thi" type="hidden" 
                                                value="<?php echo $so_cot_hien_thi; ?>" />
                                            <input name="cot_duoc_loc" type="hidden" 
                                                value="<?php echo $cot_duoc_loc ?>" />
                                            <input name="gia_tri_loc_start" type="hidden" 
                                                value="<?php echo $gia_tri_loc_start;  ?>" />
                                            <input name="gia_tri_loc_end" type="hidden" 
                                                value="<?php echo $gia_tri_loc_end;  ?>" />
                                            <input name="gia_tri_loc_xac_dinh" type="hidden" 
                                                value="<?php echo $gia_tri_loc_xac_dinh; ?>" />
                                            <input name="sap_xep_theo_cot" type="hidden"
                                                value="<?php echo $columns_name['Field']; ?>" />
                                            <input name="co_che_sap_xep" type="hidden"
                                                value="<?php echo $co_che_sap_xep_cua_cot; ?>" />
                                            <input name="submit" type="submit" value="loc_du_lieu" />
                                        </form>
                                    </span>
                                </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- dung vong lap foreach de xem du lieu -->
                            <!-- lay ra cac hang lam tr -->
                            <?php foreach ($data_result as $row) : ?>
                            <tr>
                                <!-- nut sua, xoa danh muc tuong ung -->
                                <td>
                                    <span>
                                        <form action="../controller/manage_database.php" method="get">
                                            <input name="cot_can_tim_kiem" type="hidden" 
                                                value="<?php echo $primary_key; ?>" />
                                            <input name="gia_tri_can_tim" type="hidden"
                                                value="<?php echo $row[$primary_key]; ?>" />
                                            <button name="submit" type="submit" value="xoa_du_lieu"
                                                class="btn btn-danger fs-3 py-2 px-4">
                                                Xóa
                                            </button>
                                            <button name="submit" type="submit"
                                                value="den_trang_sua_doi_tuong"
                                                class="btn btn-warning fs-3 py-2 px-4">
                                                Sửa
                                            </button>
                                        </form>
                                    </span>
                                </td>
                                <!-- lay ra cac cot lam td -->
                                <?php foreach ($row as $cell) : ?>
                                <td>
                                    <span>
                                        <?php echo $cell; ?>
                                    </span>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>