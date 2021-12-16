<?php 
    // tao bien thong bao toan cuc
    $notification = ''; 

    //---------------------------------------------------------------
    // CHUC NANG XU LY DU LIEU CHUNG
    // chuc nang loc du lieu de hien thi
    function locDuLieu (
        $ten_bang,
        $so_cot_hien_thi,
        $cot_duoc_loc,  
        $gia_tri_loc_start, 
        $gia_tri_loc_end, 
        $gia_tri_loc_xac_dinh,
        $sap_xep_theo_cot,
        $co_che_sap_xep 
    ) {
        if ($gia_tri_loc_xac_dinh == '') {
            if ($gia_tri_loc_start == '' && $gia_tri_loc_end == '') {
                $sql_hien_thi = "SELECT * 
                                FROM `$ten_bang` 
                                ORDER BY `$sap_xep_theo_cot` $co_che_sap_xep
                                LIMIT $so_cot_hien_thi";
    
            } else if ($gia_tri_loc_start != '' && $gia_tri_loc_end != '') {
                $sql_hien_thi = "SELECT * 
                                FROM `$ten_bang` 
                                WHERE `$cot_duoc_loc` >= '$gia_tri_loc_start' AND `$cot_duoc_loc` <= '$gia_tri_loc_end'
                                ORDER BY `$sap_xep_theo_cot` $co_che_sap_xep
                                LIMIT $so_cot_hien_thi";
    
            } else if ($gia_tri_loc_start != '' && $gia_tri_loc_end == '') {
                $sql_hien_thi = "SELECT * 
                                FROM `$ten_bang` 
                                WHERE `$cot_duoc_loc` >= '$gia_tri_loc_start'
                                ORDER BY `$sap_xep_theo_cot` $co_che_sap_xep
                                LIMIT $so_cot_hien_thi";
    
            } else if ($gia_tri_loc_start == '' && $gia_tri_loc_end != '') {
                $sql_hien_thi = "SELECT * 
                                FROM `$ten_bang` 
                                WHERE `$cot_duoc_loc` <= '$gia_tri_loc_start'
                                ORDER BY `$sap_xep_theo_cot` $co_che_sap_xep
                                LIMIT $so_cot_hien_thi";
            } 

        } else if ($gia_tri_loc_xac_dinh != '') {
            $sql_hien_thi = "SELECT * 
                            FROM `$ten_bang` 
                            WHERE `$cot_duoc_loc` = '$gia_tri_loc_xac_dinh'
                            ORDER BY `$sap_xep_theo_cot` $co_che_sap_xep
                            LIMIT $so_cot_hien_thi";
        }

        global $connect_database;
        global $notification;

        if ($connect_database->query($sql_hien_thi) == true) {
            $data_result = $connect_database->query($sql_hien_thi);

            $notification = 'Lọc dữ liệu thành công, trả về '. $data_result->num_rows . ' hàng kết quả '. '<br>'
                        . 'Lệnh SQL: <br>'
                        . $sql_hien_thi . '<br>';

            return $data_result;
        
        } else {
            $notification = 'Lọc dữ liệu không thành công do lỗi: <br>' . $connect_database->error . '<br>' 
                        . 'Bạn vui lòng kiểm tra lại câu lệnh sql của mình: <br>' . $sql_hien_thi;

            return false;
        }
    }

    // chuc nang sua du lieu
    function suaDuLieu(
        $ten_bang,
        $cot_can_tim_kiem, 
        $gia_tri_can_tim, 
        $cot_can_sua, 
        $gia_tri_muon_sua
    ) {
        global $notification;
        $notification = '';

        switch ($cot_can_sua) {
            case 'ten_file_anh':
                $notification = 'Không thể sửa nhiều giá trị cùng lúc tại cột "Tên File Ảnh", nếu bạn muốn thay đổi ' .
                                'hình ảnh sản phẩm vui lòng chọn mục "Sửa" tại cột "Thao Tác Nhanh" và Tải lên hình ảnh mới';
                break;

            case 'ngay_tao':
                $notification = 'Không thể sửa nhiều giá trị cùng lúc tại cột "Ngày Tạo", nếu bạn muốn thay đổi ' .
                                'ngày tạo vui lòng chọn mục "Sửa" tại cột "Thao Tác Nhanh" và chọn ngày tạo mới';
                break;

            case 'don_gia':
                if (is_numeric($gia_tri_muon_sua) == false || $gia_tri_muon_sua < 1000) {
                    $notification = 'Vui lòng nhập đơn giá là một số hợp lệ lớn hơn hoặc bằng 1000';
                }
                break;
            case 'so_luot_xem':
            case 'so_luong_da_ban':
            case 'so_luong_con_lai':
                if (is_numeric($gia_tri_muon_sua) == false || $gia_tri_muon_sua < 0) {
                    $notification = 'Vui lòng nhập đơn giá là một số hợp lệ lớn hơn hoặc bằng 0';
                }
                break;
        }

        
        global $connect_database;
        if ($notification == '') {
            $sql = "UPDATE `$ten_bang` 
                    SET `$cot_can_sua` = '$gia_tri_muon_sua' 
                    WHERE `$cot_can_tim_kiem` = '$gia_tri_can_tim'";

            $connect_database->query($sql);
            $affected_row_quantity = $connect_database->affected_rows;

            if ($affected_row_quantity > 0) {
                $notification = 'Sửa dữ liệu thành công <br>'
                            . 'Số hàng được sửa là ' . $affected_row_quantity . '<br>'
                            . 'Lệnh SQL: ' . '<br>'. $sql;
                $result = 'success';

            } else if ($affected_row_quantity == 0) {
                $notification = 'Không tồn tại hàng dữ liệu tương ứng hoặc giá trị sửa bị trùng lặp <br>'
                            . 'Không có hàng nào được sửa <br>'
                            . 'Lệnh SQL: ' . '<br>'. $sql;

            } else {
                $notification = 'Sửa dữ liệu không thành công do lỗi: <br>' . $connect_database->error . '<br>' 
                            . 'Bạn vui lòng kiểm tra lại câu lệnh sql của mình: <br>' . $sql;
            }
        } 

        if (isset($result) && $result = 'success') {
            if ($cot_can_tim_kiem != $cot_can_sua) {
                $sql_hien_thi = "SELECT * 
                                FROM `$ten_bang` 
                                WHERE `$cot_can_tim_kiem` = '$gia_tri_can_tim'
                                AND `$cot_can_sua` = '$gia_tri_muon_sua'
                                LIMIT 200";

            } else if ($cot_can_tim_kiem == $cot_can_sua) {
                $sql_hien_thi = "SELECT * 
                                FROM `$ten_bang` 
                                WHERE `$cot_can_tim_kiem` = '$gia_tri_muon_sua'
                                LIMIT 200";
            } 
        } else {
            $sql_hien_thi = "SELECT * 
                            FROM `$ten_bang` 
                            WHERE `$cot_can_tim_kiem` = '$gia_tri_can_tim'
                            LIMIT 200";
        }

        $data_result = $connect_database->query($sql_hien_thi);
        return $data_result;
    }

    // chuc nang xoa du lieu
    function xoaDuLieu(
        $ten_bang,
        $cot_can_tim_kiem, 
        $gia_tri_can_tim
    ) {
        global $connect_database;
        // rieng bang san pham can phai xoa luon hinh anh
        if ($ten_bang == 'san_pham') {
            $sql = "SELECT `ten_file_anh`
                    FROM `san_pham` 
                    WHERE `$cot_can_tim_kiem` = '$gia_tri_can_tim'";
            $cac_file_anh_can_xoa = $connect_database->query($sql);

            if ($cac_file_anh_can_xoa->num_rows > 0) {
                $_SESSION['affected_row_quantity'] = $cac_file_anh_can_xoa->num_rows;

                foreach ($cac_file_anh_can_xoa as $file_anh_can_xoa) {
                    unlink('../../images/products/' . $file_anh_can_xoa['ten_file_anh']);
                }
            }
        } 

        $sql = "DELETE FROM `$ten_bang` 
                WHERE `$cot_can_tim_kiem` = '$gia_tri_can_tim'";
        
        $connect_database->query($sql);

        global $notification;
        // do viec xoa hinh anh quan ham unlink lam cho khong the dem so hang bi anh huong truc tiep
        if ($ten_bang == 'san_pham') {
            $affected_row_quantity = $_SESSION['affected_row_quantity'];

        } else {
            $affected_row_quantity = $connect_database->affected_rows;
        }

        if ($affected_row_quantity > 0) {
            $notification = 'Xóa dữ liệu thành công' . "<br>"
                        . 'Số hàng bị xóa là ' . $affected_row_quantity . '<br>'
                        . 'Lệnh SQL: ' . '<br>'. $sql;

        } else if ($affected_row_quantity == 0) {
            $notification = 'Không tồn tại hàng dữ liệu tương ứng <br>'
                        . 'Không có hàng nào bị xóa <br>'
                        . 'Lệnh SQL: ' . '<br>'. $sql;

        } else {
            $notification = 'Xóa dữ liệu không thành công do lỗi: <br>' . $connect_database->error . '<br>' 
                        . 'Bạn vui lòng kiểm tra lại câu lệnh sql của mình: <br>' . $sql;
        }
    }

    //---------------------------------------------------------------
    // CHUC NANG XU LY CHO BANG DANH MUC
    // chuc nang them danh muc
    function themDanhMuc($ma_danh_muc, $ten_danh_muc) {
        $sql = "INSERT INTO `danh_muc` 
                VALUES 
                ('$ma_danh_muc', '$ten_danh_muc', CURRENT_DATE())";

        global $connect_database;
        global $notification;

        if ($connect_database->query($sql) == true) {
            $notification = 'Thêm danh mục thành công <br>'
                        . 'Lệnh SQL: <br>'
                        . $sql;

        } else {
            $notification = 'Thêm danh mục không thành công do lỗi: <br>' . $connect_database->error . '<br>' 
                        . 'Bạn vui lòng kiểm tra lại câu lệnh sql của mình: <br>' . $sql;
        }
    }

    // chuc nang sua doi tuong danh muc
    function suaDanhMuc (
        $ma_danh_muc_cu,
        $ma_danh_muc_moi,
        $ten_danh_muc,
        $ngay_tao 
    ) {
        $sql = "UPDATE `danh_muc` 
                SET `ma_danh_muc` = '$ma_danh_muc_moi',
                    `ten_danh_muc` = '$ten_danh_muc',  
                    `ngay_tao` = '$ngay_tao'
                WHERE `ma_danh_muc` = '$ma_danh_muc_cu'";

        global $connect_database;
        global $notification;

        if ($connect_database->query($sql) == true) {
            $notification = 'Sửa danh mục thành công' . "<br>"
                        . 'Lệnh SQL: ' . '<br>'. $sql;

            $sql_hien_thi = "SELECT * 
                            FROM `danh_muc` 
                            WHERE `ma_danh_muc` = '$ma_danh_muc_moi'";

        } else {
            $notification = 'Sửa danh mục không thành công do lỗi: <br>' . $connect_database->error . '<br>' 
                        . 'Bạn vui lòng kiểm tra lại câu lệnh sql của mình: <br>' . $sql;

            $sql_hien_thi = "SELECT * 
            FROM `danh_muc` 
            WHERE `ma_danh_muc` = '$ma_danh_muc_cu'";
        }
        $data_result = $connect_database->query($sql_hien_thi);

        return $data_result;
    }

    //---------------------------------------------------------------
    // CHUC NANG XU LY CHO BANG SAN PHAM
    // chuc nang them san pham
    function themSanPham(
        $ma_danh_muc,
        $ma_san_pham,
        $ten_san_pham,
        $don_gia, 
        $don_vi_tinh,
        $nha_xuat_ban,
        $ten_file_anh, 
        $mo_ta,
        $so_luong_con_lai,
        $phan_tram_giam_gia,
        $file_anh
    ) {
        // them so lieu khoi tao cho san pham
        $so_luot_xem = 0;
        $so_luong_da_ban = 0;

        $sql = "INSERT INTO `san_pham` 
                    VALUES(
                        '$ma_danh_muc', 
                        '$ma_san_pham', 
                        '$ten_san_pham', 
                        '$don_gia', 
                        '$don_vi_tinh', 
                        '$nha_xuat_ban', 
                        '$ten_file_anh', 
                        '$mo_ta', 
                        CURRENT_DATE(),
                        $so_luot_xem,
                        $so_luong_da_ban,
                        $so_luong_con_lai,
                        $phan_tram_giam_gia
                    )
                ";

        global $connect_database;
        global $notification;

        if ($connect_database->query($sql) == true) {
            move_uploaded_file($file_anh, '../../images/products/' . $ten_file_anh);

            $notification = 'Thêm sản phẩm thành công <br>'
                        . 'Lệnh SQL: <br>'
                        . $sql;

        } else {
            $notification = 'Thêm sản phẩm không thành công do lỗi: <br>' . $connect_database->error . '<br>' 
                        . 'Bạn vui lòng kiểm tra lại câu lệnh sql của mình: <br>' . $sql;
        }
    }

    // chuc nang sua doi tuong san pham
    function suaSanPham (
        $ma_danh_muc,
        $ma_san_pham_cu,
        $ma_san_pham_moi,
        $ten_san_pham,
        $don_gia, 
        $don_vi_tinh,
        $nha_xuat_ban,
        $ten_file_anh_cu,
        $ten_file_anh_moi,
        $mo_ta,
        $file_anh,
        $ngay_tao,
        $so_luot_xem,
        $so_luong_da_ban,
        $so_luong_con_lai,
        $phan_tram_giam_gia
    ) {
        $sql = "UPDATE `san_pham` 
                SET `ma_danh_muc` = '$ma_danh_muc',
                    `ma_san_pham` = '$ma_san_pham_moi',
                    `ten_san_pham` = '$ten_san_pham',
                    `don_gia` = '$don_gia',  
                    `don_vi_tinh` = '$don_vi_tinh',  
                    `nha_xuat_ban` = '$nha_xuat_ban',
                    `mo_ta` = '$mo_ta', ";
        if ($ten_file_anh_moi != '') {
            $sql .="`ten_file_anh` = '$ten_file_anh_moi', ";

        }
        $sql .= "   `ngay_tao` = '$ngay_tao',
                    `so_luot_xem` = '$so_luot_xem',
                    `so_luong_da_ban` = '$so_luong_da_ban',
                    `so_luong_con_lai` = '$so_luong_con_lai',
                    `phan_tram_giam_gia` = '$phan_tram_giam_gia'
                WHERE `ma_san_pham` = '$ma_san_pham_cu'";

        global $connect_database;
        global $notification;

        if ($connect_database->query($sql) == true) {
            if ($ten_file_anh_moi != '') {
                unlink('../../images/products/' . $ten_file_anh_cu);
                move_uploaded_file($file_anh, '../../images/products/' . $ten_file_anh_moi);
            }

            $notification = 'Sửa sản phẩm thành công' . "<br>"
                        . 'Lệnh SQL: ' . '<br>'. $sql;

            $sql_hien_thi = "SELECT * 
                            FROM `san_pham` 
                            WHERE `ma_san_pham` = '$ma_san_pham_moi'";

        } else {
            $notification = 'Sửa sản phẩm không thành công do lỗi: <br>' . $connect_database->error . '<br>' 
                        . 'Bạn vui lòng kiểm tra lại câu lệnh sql của mình: <br>' . $sql;
            
            $sql_hien_thi = "SELECT * 
                            FROM `san_pham` 
                            WHERE `ma_san_pham` = '$ma_san_pham_cu'";
        }
        $data_result = $connect_database->query($sql_hien_thi);

        return $data_result;
    }
?>