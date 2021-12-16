<?php
    // chuc nang lay du lieu doi tuong
    function layDuLieuDoiTuong (
        $ten_bang,
        $cot_can_tim_kiem, 
        $gia_tri_can_tim
    ) {
        $sql = "SELECT * 
                FROM `$ten_bang`
                WHERE `$cot_can_tim_kiem` = '$gia_tri_can_tim'";
        global $connect_database;
        
        $object_data_result = $connect_database->query($sql);
        $object_data_result = $object_data_result->fetch_array(MYSQLI_ASSOC); 

        return $object_data_result;
    }
 
    // chuc nang lay ten cot cua bang 
    function layTenCot ($ten_bang) {
        global $connect_database;
        $all_columns_name = $connect_database->query("SHOW FULL COLUMNS FROM `$ten_bang`");

        return $all_columns_name;
    }

    // chuc nang lay du lieu
    function layDuLieu (
        $ten_bang,
        $cot_duoc_loc = '',  
        $gia_tri_loc_xac_dinh = ''
    ) {
        if ($gia_tri_loc_xac_dinh == '' && $cot_duoc_loc == '') {
            $sql_hien_thi = "SELECT * 
                            FROM `$ten_bang` 
                            LIMIT 25";

        } else if ($gia_tri_loc_xac_dinh != '' && $cot_duoc_loc != '') { 
            $sql_hien_thi = "SELECT * 
                            FROM `$ten_bang` 
                            WHERE `$cot_duoc_loc` = '$gia_tri_loc_xac_dinh'
                            LIMIT 25";
        }

        global $connect_database;
        $data_result = $connect_database->query($sql_hien_thi);

        return $data_result;
    }

    // chuc nang lay tat ca doi tuong cua mot cot
    function layDuLieuCot ($ten_bang, $ten_cac_cot) {
        if (gettype($ten_cac_cot) == 'array') {
            $sql = "SELECT ";
            foreach ($ten_cac_cot as $ten_cot) {
                $sql .= "`$ten_cot`, ";
            }
            $sql = substr($sql, 0, -2);
            $sql .= "FROM `$ten_bang`";

        } else {
            $sql = "SELECT `$ten_cac_cot` 
                    FROM `$ten_bang`";
        }

        global $connect_database;
        $data_result = $connect_database->query($sql);

        return $data_result;
    }
?>