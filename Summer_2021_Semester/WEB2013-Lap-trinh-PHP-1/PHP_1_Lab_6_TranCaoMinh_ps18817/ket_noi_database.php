<?php
    // KET NOI VOI DATABASE
    $ten_server = '127.0.0.1'; 
    $ten_nguoi_dung = 'user_cao_minh_php'; 
    $mat_khau = '0937232138aA'; 
    $ten_database = 'lab_6_php_1'; 

    $ket_noi_database = new mysqli($ten_server, $ten_nguoi_dung, $mat_khau, $ten_database);

    if ($ket_noi_database->connect_error) {
        exit('Không thể kết nối với database do lỗi: ' . $ket_noi_database->connect_error);
    }
?>