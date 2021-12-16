<?php
    function checkAdmin ($admin_account, $admin_password) {
        $admin_password = md5($admin_password);

        $sql = "SELECT COUNT(*)
                FROM `khach_hang` 
                WHERE `tai_khoan` = '$admin_account'
                AND `mat_khau` = '$admin_password'
                AND `quan_tri_vien` = '1'";
                
        global $connect_database;
        $result = $connect_database->query($sql);
        $result = $result->fetch_array();
        $check_admin = $result[0];

        if ($check_admin === '1') {
            return true;

        } else {
            return false;
        }
    }

    function getAdminName ($admin_account, $admin_password) {
        $admin_password = md5($admin_password);

        $sql = "SELECT `ten_khach_hang`
                FROM `khach_hang` 
                WHERE `tai_khoan` = '$admin_account'
                AND `mat_khau` = '$admin_password'
                AND `quan_tri_vien` = '1'";
                
        global $connect_database;
        $result = $connect_database->query($sql);
        $result = $result->fetch_array();
        $admin_name = $result[0];

        return $admin_name;
    }
?>