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

            $notification = 'L???c d???? li????u th??nh c??ng, tr??? v??? '. $data_result->num_rows . ' h??ng k???t qu??? '. '<br>'
                        . 'L???nh SQL: <br>'
                        . $sql_hien_thi . '<br>';

            return $data_result;
        
        } else {
            $notification = 'L???c d???? li????u kh??ng th??nh c??ng do l???i: <br>' . $connect_database->error . '<br>' 
                        . 'B???n vui l??ng ki???m tra l???i c??u l???nh sql c???a m??nh: <br>' . $sql_hien_thi;

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
                $notification = 'Kh??ng th???? s????a nhi????u gia?? tri?? cu??ng lu??c ta??i c????t "T??n File A??nh", n????u ba??n mu????n thay ??????i ' .
                                'hi??nh a??nh sa??n ph????m vui lo??ng cho??n mu??c "S????a" ta??i c????t "Thao Ta??c Nhanh" va?? Ta??i l??n hi??nh a??nh m????i';
                break;

            case 'ngay_tao':
                $notification = 'Kh??ng th???? s????a nhi????u gia?? tri?? cu??ng lu??c ta??i c????t "Nga??y Ta??o", n????u ba??n mu????n thay ??????i ' .
                                'nga??y ta??o vui lo??ng cho??n mu??c "S????a" ta??i c????t "Thao Ta??c Nhanh" va?? cho??n nga??y ta??o m????i';
                break;

            case 'don_gia':
                if (is_numeric($gia_tri_muon_sua) == false || $gia_tri_muon_sua < 1000) {
                    $notification = 'Vui lo??ng nh????p ????n gia?? la?? m????t s???? h????p l???? l????n h??n ho????c b????ng 1000';
                }
                break;
            case 'so_luot_xem':
            case 'so_luong_da_ban':
            case 'so_luong_con_lai':
                if (is_numeric($gia_tri_muon_sua) == false || $gia_tri_muon_sua < 0) {
                    $notification = 'Vui lo??ng nh????p ????n gia?? la?? m????t s???? h????p l???? l????n h??n ho????c b????ng 0';
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
                $notification = 'S???a d???? li????u th??nh c??ng <br>'
                            . 'S???? ha??ng ????????c s????a la?? ' . $affected_row_quantity . '<br>'
                            . 'L???nh SQL: ' . '<br>'. $sql;
                $result = 'success';

            } else if ($affected_row_quantity == 0) {
                $notification = 'Kh??ng t????n ta??i ha??ng d???? li????u t????ng ????ng ho????c gia?? tri?? s????a bi?? tru??ng l????p <br>'
                            . 'Kh??ng co?? ha??ng na??o ????????c s????a <br>'
                            . 'L???nh SQL: ' . '<br>'. $sql;

            } else {
                $notification = 'S???a d???? li????u kh??ng th??nh c??ng do l???i: <br>' . $connect_database->error . '<br>' 
                            . 'B???n vui l??ng ki???m tra l???i c??u l???nh sql c???a m??nh: <br>' . $sql;
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
            $notification = 'X??a d???? li????u th??nh c??ng' . "<br>"
                        . 'S???? ha??ng bi?? xo??a la?? ' . $affected_row_quantity . '<br>'
                        . 'L???nh SQL: ' . '<br>'. $sql;

        } else if ($affected_row_quantity == 0) {
            $notification = 'Kh??ng t????n ta??i ha??ng d???? li????u t????ng ????ng <br>'
                        . 'Kh??ng co?? ha??ng na??o bi?? xo??a <br>'
                        . 'L???nh SQL: ' . '<br>'. $sql;

        } else {
            $notification = 'X??a d???? li????u kh??ng th??nh c??ng do l???i: <br>' . $connect_database->error . '<br>' 
                        . 'B???n vui l??ng ki???m tra l???i c??u l???nh sql c???a m??nh: <br>' . $sql;
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
            $notification = 'Th??m danh m???c th??nh c??ng <br>'
                        . 'L???nh SQL: <br>'
                        . $sql;

        } else {
            $notification = 'Th??m danh m???c kh??ng th??nh c??ng do l???i: <br>' . $connect_database->error . '<br>' 
                        . 'B???n vui l??ng ki???m tra l???i c??u l???nh sql c???a m??nh: <br>' . $sql;
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
            $notification = 'S???a danh m???c th??nh c??ng' . "<br>"
                        . 'L???nh SQL: ' . '<br>'. $sql;

            $sql_hien_thi = "SELECT * 
                            FROM `danh_muc` 
                            WHERE `ma_danh_muc` = '$ma_danh_muc_moi'";

        } else {
            $notification = 'S???a danh m???c kh??ng th??nh c??ng do l???i: <br>' . $connect_database->error . '<br>' 
                        . 'B???n vui l??ng ki???m tra l???i c??u l???nh sql c???a m??nh: <br>' . $sql;

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

            $notification = 'Th??m sa??n ph????m th??nh c??ng <br>'
                        . 'L???nh SQL: <br>'
                        . $sql;

        } else {
            $notification = 'Th??m sa??n ph????m kh??ng th??nh c??ng do l???i: <br>' . $connect_database->error . '<br>' 
                        . 'B???n vui l??ng ki???m tra l???i c??u l???nh sql c???a m??nh: <br>' . $sql;
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

            $notification = 'S???a sa??n ph????m th??nh c??ng' . "<br>"
                        . 'L???nh SQL: ' . '<br>'. $sql;

            $sql_hien_thi = "SELECT * 
                            FROM `san_pham` 
                            WHERE `ma_san_pham` = '$ma_san_pham_moi'";

        } else {
            $notification = 'S???a sa??n ph????m kh??ng th??nh c??ng do l???i: <br>' . $connect_database->error . '<br>' 
                        . 'B???n vui l??ng ki???m tra l???i c??u l???nh sql c???a m??nh: <br>' . $sql;
            
            $sql_hien_thi = "SELECT * 
                            FROM `san_pham` 
                            WHERE `ma_san_pham` = '$ma_san_pham_cu'";
        }
        $data_result = $connect_database->query($sql_hien_thi);

        return $data_result;
    }
?>