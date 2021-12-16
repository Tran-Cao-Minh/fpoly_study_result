<?php
    // KET NOI VOI DATABASE
    // tao bien chua thong tin ve database
    $ten_server = '127.0.0.1'; // khai bao server
    $ten_nguoi_dung = 'user_cao_minh_php'; // khai bao ten nguoi dung duoc tao trong database
    $mat_khau = '0937232138aA'; // khai bao mat khau
    $ten_database = 'ban_laptop'; // khai bao ten database

    // ket noi database
    $ket_noi_database = new mysqli($ten_server, $ten_nguoi_dung, $mat_khau, $ten_database);

    // neu co loi thi thong bao va thoat
    if ($ket_noi_database->connect_error) {
        exit('Không thể kết nối với database do lỗi: ' . $ket_noi_database->connect_error);
    }

    // LAY THAM SO VA CHEN DU LIEU VAO DATABASE 
    // lay cac bien tu url trang
    $ma_loai = $_GET['ma_loai'];
    $ten_loai = $_GET['ten_loai'];
    $thu_tu = $_GET['thu_tu'];
    $an_hien = $_GET['an_hien']; 
    // cau lenh sql chen du lieu
    $lenh_sql = "INSERT INTO `loai_san_pham` 
                (`ma_loai`, `ten_loai`, `thu_tu`, `an_hien`) 
                VALUES 
                ('$ma_loai', '$ten_loai', '$thu_tu', '$an_hien')";
    // neu thanh cong thi thong bao va thuc hien chen
    if ($ket_noi_database->query($lenh_sql) == true) {
        // thuc hien ket noi
        $ket_noi_database->query($lenh_sql);
        // thong bao thanh cong
        echo '<h1>Thêm danh mục thành công</h1>';
    } else {
        // thong bao khong thanh cong
        echo '<h1>Thêm danh mục thất bại</h1>' . $ket_noi_database->error;
    }
?>