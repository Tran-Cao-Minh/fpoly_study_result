<?php
    // KET NOI VOI DATABASE
    // tao bien chua thong tin ve database
    $server = '127.0.0.1'; // khai bao server
    $user_name = 'user_cao_minh_php'; // khai bao ten nguoi dung duoc tao trong database
    $password = '0937232138aA'; // khai bao mat khau
    $database_name = 'db_asm_php_1'; // khai bao ten database

    // ket noi database
    $connect_database = new mysqli($server, $user_name, $password, $database_name);

    // neu co loi thi thong bao va thoat
    if ($connect_database->connect_error) {
        exit('Không thể kết nối với database do lỗi: ' . $connect_database->connect_error);
    }
?>