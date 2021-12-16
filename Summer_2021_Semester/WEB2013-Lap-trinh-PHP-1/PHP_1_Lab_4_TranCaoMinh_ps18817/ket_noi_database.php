<?php
    // KET NOI VOI DATABASE
    // tao bien chua thong tin ve database
    $ten_server = '127.0.0.1'; // khai bao server
    $ten_nguoi_dung = 'user_cao_minh_php'; // khai bao ten nguoi dung duoc tao trong database
    $mat_khau = '0937232138aA'; // khai bao mat khau
    $ten_database = 'lab_4_php_1'; // khai bao ten database

    // ket noi database
    $ket_noi_database = new mysqli($ten_server, $ten_nguoi_dung, $mat_khau, $ten_database);

    // neu co loi thi thong bao va thoat
    if ($ket_noi_database->connect_error) {
        exit('Không thể kết nối với database do lỗi: ' . $ket_noi_database->connect_error);
    }
?>