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

    // ham lay danh sach loai tin
    function layDanhSachLoaiTin($so_cua_trang, $so_luong_loai_tin_hien_thi) {
        $limit_start = ($so_cua_trang - 1) * $so_luong_loai_tin_hien_thi;

        $sql = "SELECT `id_lt`, `ten`, `thu_tu`, `an_hien`, `lang`, `id_tl`
                FROM `loai_tin`
                ORDER BY `thu_tu`
                LIMIT {$limit_start}, {$so_luong_loai_tin_hien_thi}";
        global $conn;
        $kq = $conn->query($sql);
        return $kq;
    }

    // ham lay ten the loai theo id_tl
    function layTenTheLoai($id_tl) {
        $sql = "SELECT `ten_tl` 
                FROM `the_loai`
                WHERE `id_tl` = '{$id_tl}'";
        global $conn;
        $kq = $conn->query($sql);

        $row = $kq->fetch();
        return $row['ten_tl'];
    }

    // ham them loai tin
    function themLoaiTin($ten, $thu_tu, $an_hien, $lang, $id_tl) {
        $sql = "INSERT INTO `loai_tin` 
                    (`ten`, `thu_tu`, `an_hien`, `lang`, `id_tl`)
                VALUES
                    ('{$ten}', '{$thu_tu}', '{$an_hien}', '{$lang}', '{$id_tl}')";
        global $conn;
        $kq = $conn->exec($sql);

        if ($kq != 0) {
            return true;
        }
        else {
            return false;
        }
    }

    // ham xoa loai tin
    function xoaLoaiTin($id_lt) {
        $sql = "DELETE FROM `loai_tin`
                WHERE `id_lt` = '{$id_lt}'";
        global $conn;
        $kq = $conn->exec($sql);
    }

    // ham lay thong tin chi tiet loai tin
    function layChiTietLoaiTin($id_lt) {
        $sql = "SELECT `ten`, `thu_tu`, `an_hien`, `lang`, `id_tl`
                FROM `loai_tin`
                WHERE `id_lt` = '{$id_lt}'";
        global $conn;
        $kq = $conn->query($sql);
        if ($kq == null) {
            return false;
        }
        else {
            return $kq->fetch();
        }
    }

    // ham cap nhat loai tin
    function capNhatLoaiTin($id_lt, $ten, $thu_tu, $an_hien, $lang, $id_tl) {
        $sql = "UPDATE `loai_tin`
                SET `ten` = '{$ten}', 
                    `thu_tu` = '{$thu_tu}', 
                    `an_hien` = '{$an_hien}', 
                    `lang` = '{$lang}',
                    `id_tl` = '{$id_tl}'
                WHERE `id_lt` = '{$id_lt}'";
        global $conn;
        $kq = $conn->exec($sql);

        if ($kq != 0) {
            return true;
        }
        else {
            return false;
        }
    }

    // ham dem tat ca loai tin hien co
    function demLoaiTin() {
        // cau lenh sql xu ly
        $lenh_sql = "SELECT COUNT(*)
                    FROM `loai_tin`";
        global $conn;
        $kq = $conn->query($lenh_sql);

        // lay so san pham dem duoc
        $so_loai_tin = $kq->fetch();
        $so_loai_tin = $so_loai_tin[0];
        return $so_loai_tin;
    }

    // ham tao link phan trang
    function taoLinkPhanTrang(
        $url_goc, 
        $so_luong_loai_tin_hien_thi, 
        $so_cua_trang, 
        $tong_so_luong_loai_tin, 
        $phan_bu
    ) {
        // quyet dinh chia theo tong so trang
        $tong_so_trang = ceil($tong_so_luong_loai_tin/$so_luong_loai_tin_hien_thi);
        if ($tong_so_trang <= 1) {
            return 'a';
        }

        // tao danh sach link chia trang
        $danh_sach_link = '<ul class="danh-sach-trang">';

        // neu trang hien tai lon hon 1 thi hien trang truoc do
        if ($so_cua_trang > 1) {
            // viet ra link trang dau tien
            $trang_dau_tien = "<li><a href='$url_goc'&so_cua_trang=1> << </a></li>";    
            
            // lay so cua trang truoc
            $so_cua_trang_truoc = $so_cua_trang - 1;
            // viet ra link trang truoc 
            $trang_truoc ="<li><a href='$url_goc&so_cua_trang=$so_cua_trang_truoc'> < </a></li>";
            
            // noi cac bien co duoc vao danh_sach_link
            $danh_sach_link = $danh_sach_link . $trang_dau_tien . $trang_truoc;
        }
        
        // hien thi cac so cua trang lien ke co the nhan vao
        $from = $so_cua_trang - $phan_bu;
        $to = $so_cua_trang + $phan_bu;
        // neu from hoac to co vuot gioi han cho phep thi gan lai
        if ($from < 1) {
            $from = 1;
        }
        if ($to > $tong_so_trang) {
            $to = $tong_so_trang;
        }
        // tao vong lap viet ra cac trang co the xem
        for ($i = $from; $i <= $to; $i++) {
            // neu trung trang hien tai
            if ($i == $so_cua_trang) {
                // khong tao link va gan mau cho trang hien tai
                $chuoi = "<li><span class='trang-duoc-chon'> $i </span></li>";
            } else {
                // neu khong phai trang hien tai thi tao link binh thuong
                $chuoi = "<li><a href='$url_goc&so_cua_trang=$i'> $i </a></li>";
            }

            // noi trang vua co trong chuoi vao danh_sach_link
            $danh_sach_link .= $chuoi;
        }

        // neu trang hien tai nho hon tong so trang thi hien thi trang tiep theo
        if ($so_cua_trang < $tong_so_trang) {
            // lay so cua trang sau
            $so_cua_trang_sau = $so_cua_trang + 1;
            // viet ra link trang sau
            $trang_sau = "<li><a href='$url_goc&so_cua_trang=$so_cua_trang_sau'> > </a></li>";      
            
            // viet ra link trang cuoi
            $trang_cuoi = "<li><a href='$url_goc&so_cua_trang=$tong_so_trang'> >> </a></li>";

            // noi cac bien co duoc vao danh sach link
            $danh_sach_link = $danh_sach_link . $trang_sau . $trang_cuoi;
        }

        // dong danh sach link bang the ul
        $danh_sach_link .= '</ul>';

        // tra ve danh_sach_link sau khi xu ly 
        return $danh_sach_link;
    }
?>