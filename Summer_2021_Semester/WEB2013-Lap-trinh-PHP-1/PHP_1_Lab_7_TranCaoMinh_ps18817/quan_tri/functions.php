<?php
    // ket noi database
    $host = "localhost";   //địa chỉ mysql server sẽ kết nối đến
    $dbname = "lab_7_php_1"; //tên database sẽ kết nối đến
    $userdb = "root";    //username để kết nối đến database
    $passdb = "";        // mật khẩu để kết nối đến database

    $conn=new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $userdb, $passdb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ham lay du lieu danh sach the loai
    function layDanhSachTheLoai() {
        $sql = "SELECT `id_tl`, `ten_tl`, `thu_tu`, `an_hien`, `lang`
                FROM `the_loai`
                ORDER BY `thu_tu`";
        global $conn;
        $kq = $conn->query($sql);
        return $kq;
    }

    // ham them the loai
    function themTheLoai($ten_tl, $thu_tu, $an_hien, $lang) {
        $sql = "INSERT INTO `the_loai` 
                    (`ten_tl`, `thu_tu`, `an_hien`, `lang`)
                VALUES
                    ('{$ten_tl}', '{$thu_tu}', '{$an_hien}', '{$lang}')";
        global $conn;
        $kq = $conn->exec($sql);

        if ($kq != 0) {
            return true;
        }
        else {
            return false;
        }
    }

    // ham xoa the loai
    function xoaTheLoai($id_tl) {
        $sql = "DELETE FROM `the_loai`
                WHERE `id_tl` = '{$id_tl}'";
        global $conn;
        $kq = $conn->exec($sql);
    }

    // ham lay thong tin chi tiet the loai
    function layChiTietTheLoai($id_tl) {
        $sql = "SELECT `ten_tl`, `thu_tu`, `an_hien`, `lang`
                FROM `the_loai`
                WHERE `id_tl` = '{$id_tl}'";
        global $conn;
        $kq = $conn->query($sql);
        if ($kq == null) {
            return false;
        }
        else {
            return $kq->fetch();
        }
    }

    // ham cap nhat the loai
    function capNhatTheLoai($id_tl, $ten_tl, $thu_tu, $an_hien, $lang) {
        $sql = "UPDATE `the_loai`
                SET `ten_tl` = '{$ten_tl}', 
                    `thu_tu` = '{$thu_tu}', 
                    `an_hien` = '{$an_hien}', 
                    `lang` = '{$lang}'
                WHERE `id_tl` = '{$id_tl}'";
        global $conn;
        $kq = $conn->exec($sql);

        if ($kq != 0) {
            return true;
        }
        else {
            return false;
        }
    }
?>