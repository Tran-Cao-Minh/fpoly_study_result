<?php
    // Chuc nang lay ten tat ca user_name de so sanh tranh bi trung
    function getAllUserName() { 
        global $connect_database;

        $sql = "SELECT `tai_khoan`
                FROM `khach_hang`";

        $all_user_name_data = $connect_database->query($sql);

        $all_user_name = '';
        foreach ($all_user_name_data as $user_name_data) {
            $all_user_name = $all_user_name . '|' . $user_name_data['tai_khoan'];
        }
        
        echo $all_user_name;
    }

    // Chuc nang lay thong tin user
    function getUserInformation($user_id, $user_password) {
        global $connect_database;

        $sql = "SELECT `ten_khach_hang`, `dia_chi`, `so_dien_thoai`, `email`
                FROM `khach_hang`
                WHERE `ma_khach_hang` = '$user_id'
                AND `mat_khau` = '$user_password'";

        $result = $connect_database->query($sql);

        if ($result->num_rows === 0) {
            return 'fail';

        } else {
            $user_information = $result->fetch_assoc();
            return $user_information;
        }
    }
?>