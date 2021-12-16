<?php
    function getProductDetailData ($ma_san_pham) {
        $sql = "SELECT 
                    `ten_san_pham`, 
                    `ten_file_anh`, 
                    `nha_xuat_ban`, 
                    `don_gia`, 
                    `phan_tram_giam_gia`,
                    `mo_ta`,
                    `so_luot_xem`
                FROM `san_pham`
                WHERE `ma_san_pham` = '$ma_san_pham'";
        global $connect_database;
        
        $data_result = $connect_database->query($sql);
        $data_result = $data_result->fetch_array(MYSQLI_ASSOC); 

        return $data_result;
    }

    function increaseProductView ($ma_san_pham) {
        $sql = "UPDATE `san_pham` 
                SET `so_luot_xem` = (`so_luot_xem` + 1)
                WHERE `ma_san_pham` = '$ma_san_pham'";
        global $connect_database;
        
        $connect_database->query($sql);
    }

    function getCommentOfProduct($ma_san_pham) {
        $sql = "SELECT 
                    `noi_dung`, 
                    `ten_khach_hang`, 
                    `ngay_tao`
                FROM `binh_luan` bl
                INNER JOIN `khach_hang` kh
                ON bl.`ma_khach_hang` = kh.`ma_khach_hang`
                WHERE `ma_san_pham` = '$ma_san_pham'
                ORDER BY `ma_binh_luan` DESC";
        global $connect_database;
        
        $data_result = $connect_database->query($sql);

        return $data_result;
    }
?>