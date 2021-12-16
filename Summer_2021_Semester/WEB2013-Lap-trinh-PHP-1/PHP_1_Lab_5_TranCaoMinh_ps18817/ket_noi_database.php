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

    // DINH NGHIA CAC HAM CAN THIET
    // ham lay chi tiet san pham
    function layChiTietSanPham($ma_san_pham) {
        try {
            // goi bien toan cuc ket noi database
            global $ket_noi_database;
            // cau lenh sql xu ly
            $lenh_sql = "SELECT ten_san_pham, link_anh, don_gia, nha_cung_cap, mo_ta, so_luot_xem
                        FROM `san_pham` sp
                        INNER JOIN `so_lieu_san_pham` slsp
                        ON sp.ma_san_pham = slsp.ma_san_pham
                        WHERE sp.ma_san_pham = '$ma_san_pham'";
            // lay du lieu vao ket qua
            $ket_qua = $ket_noi_database->query($lenh_sql);
            // tra ve hang ket qua dau tien
            if ($ket_noi_database->query($lenh_sql) == true && $ket_qua->num_rows > 0) {
                // dung fetch_assoc tra ve phan tu theo ten cot
                return $ket_qua->fetch_assoc();
            } else {
                // neu khong co san pham
                return 'Không có sản phẩm với mã là: ';
            }

        } catch (Exception $error) {
            // neu co loi thi thong bao loi va thoat
            exit('Chương trình đã gặp lỗi: ' . $error->getMessage());
        }
    }

    // ham tang so lan voi san pham duoc xem
    function tangSoLanXem($ma_san_pham) {
        try {
            // goi bien toan cuc ket noi database
            global $ket_noi_database;
            // cau lenh sql xu ly
            $lenh_sql = "UPDATE `so_lieu_san_pham`
                        SET so_luot_xem = so_luot_xem + 1
                        WHERE ma_san_pham = '$ma_san_pham'";
            // thuc hien tang so lan xem
            $ket_noi_database->query($lenh_sql);

        } catch (Exception $error) {
            // neu co loi thi thong bao loi va thoat
            exit('Chương trình đã gặp lỗi: ' . $error->getMessage());
        }
    }

    // ham lay cac san pham trong mot danh muc
    function laySanPhamTrongDanhMuc($ma_danh_muc, $so_luong_toi_da, $so_trang) {
        try {
            // goi bien toan cuc ket noi database
            global $ket_noi_database;

            // lay vi tri bat dau truy xuat du lieu
            $vi_tri_bat_dau = ($so_trang - 1) * $so_luong_toi_da;
            // cau lenh sql xu ly
            $lenh_sql = "SELECT sp.ma_san_pham, ten_san_pham, link_anh, don_gia, so_luot_xem
                        FROM `san_pham` sp
                        INNER JOIN `so_lieu_san_pham` slsp
                        ON sp.ma_san_pham = slsp.ma_san_pham
                        WHERE sp.ma_danh_muc = '$ma_danh_muc'
                        LIMIT $vi_tri_bat_dau, $so_luong_toi_da";
            // lay du lieu vao ket qua
            $ket_qua = $ket_noi_database->query($lenh_sql);
            // tra ve ket qua co duoc
            if ($ket_noi_database->query($lenh_sql) == true && $ket_qua->num_rows > 0) {
                return $ket_qua;

            } else {
                return 'Không có sản phẩm trong danh mục hoặc không có danh mục này!';
            }

        } catch (Exception $error) {
            // neu co loi thi thong bao loi va thoat
            exit('Chương trình đã gặp lỗi: ' . $error->getMessage());
        }
    }

    // ham lay ten danh muc
    function layTenDanhMuc($ma_danh_muc) {
        try {
            // goi bien toan cuc ket noi database
            global $ket_noi_database;
            // cau lenh sql xu ly
            $lenh_sql = "SELECT ten_danh_muc
                        FROM `danh_muc` 
                        WHERE ma_danh_muc = '$ma_danh_muc'";
            // lay du lieu vao ket qua
            $ket_qua = $ket_noi_database->query($lenh_sql);
            // tra ve hang ket qua dau tien
            if ($ket_noi_database->query($lenh_sql) == true && $ket_qua->num_rows > 0) {
                // dung fetch_assoc tra ve phan tu theo ten cot
                return $ket_qua->fetch_assoc();
            } else {
                // neu khong co danh muc
                return 'Không có mã danh mục này !';
            }

        } catch (Exception $error) {
            // neu co loi thi thong bao loi va thoat
            exit('Chương trình đã gặp lỗi: ' . $error->getMessage());
        }
    }

    // ham dem san pham trong danh muc
    function demSanPhamTrongDanhMuc($ma_danh_muc) {
        // goi bien toan cuc ket noi database
        global $ket_noi_database;
        // cau lenh sql xu ly
        $lenh_sql = "SELECT COUNT(*)
                    FROM `san_pham`
                    WHERE ma_danh_muc = '$ma_danh_muc'";
        // lay du lieu vao ket qua
        $ket_qua = $ket_noi_database->query($lenh_sql);
        // lay so san pham dem duoc
        $so_san_pham = $ket_qua->fetch_row();
        $so_san_pham = $so_san_pham[0];
        // tra ve ket qua co duoc
        if ($ket_noi_database->query($lenh_sql) == true && $ket_qua->num_rows > 0) {
            return $so_san_pham;

        } else {
            return 0;
        }
    }

    // ham tao link phan trang
    function taoLinkPhanTrang($url_goc, $so_san_pham, $so_trang, $so_luong_toi_da, $phan_bu) {
        // tinh tong so trang
        $tong_so_trang = ceil($so_san_pham/$so_luong_toi_da);
        // neu tong so trang nho hon hoac bang 1 thi khoi phan trang
        if ($tong_so_trang <= 1) {
            return '';
        }

        // tao danh sach link chia trang
        $danh_sach_link = '<ul class="danh-sach-trang">';

        // neu trang hien tai lon hon 1 thi hien trang truoc do
        if ($so_trang > 1) {
            // viet ra link trang dau tien
            $trang_dau_tien = "<li><a href='$url_goc'&so_trang=1> << </a></li>";    
            
            // lay so cua trang truoc
            $so_cua_trang_truoc = $so_trang - 1;
            // viet ra link trang truoc 
            $trang_truoc ="<li><a href='$url_goc&so_trang=$so_cua_trang_truoc'> < </a></li>";
            
            // noi cac bien co duoc vao danh_sach_link
            $danh_sach_link = $danh_sach_link . $trang_dau_tien . $trang_truoc;
        }
        
        // hien thi cac so cua trang lien ke co the nhan vao
        $from = $so_trang - $phan_bu;
        $to = $so_trang + $phan_bu;
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
            if ($i == $so_trang) {
                // khong tao link va gan mau cho trang hien tai
                $chuoi = "<li><span class='trang-duoc-chon'> $i </span></li>";
            } else {
                // neu khong phai trang hien tai thi tao link binh thuong
                $chuoi = "<li><a href='$url_goc&so_trang=$i'> $i </a></li>";
            }

            // noi trang vua co trong chuoi vao danh_sach_link
            $danh_sach_link .= $chuoi;
        }

        // neu trang hien tai nho hon tong so trang thi hien thi trang tiep theo
        if ($so_trang < $tong_so_trang) {
            // lay so cua trang sau
            $so_cua_trang_sau = $so_trang + 1;
            // viet ra link trang sau
            $trang_sau = "<li><a href='$url_goc&so_trang=$so_cua_trang_sau'> > </a></li>";      
            
            // viet ra link trang cuoi
            $trang_cuoi = "<li><a href='$url_goc&so_trang=$tong_so_trang'> >> </a></li>";

            // noi cac bien co duoc vao danh sach link
            $danh_sach_link = $danh_sach_link . $trang_sau . $trang_cuoi;
        }

        // dong danh sach link bang the ul
        $danh_sach_link .= '</ul>';

        // tra ve danh_sach_link sau khi xu ly 
        return $danh_sach_link;
    }

    // ham lay ket qua tim kiem
    function layKetQuaTimKiem($tu_khoa, $so_trang, $so_luong_toi_da) {
        try {
            // goi bien toan cuc ket noi database
            global $ket_noi_database;

            // lay vi tri bat dau truy xuat du lieu
            $vi_tri_bat_dau = ($so_trang - 1) * $so_luong_toi_da;
            // cau lenh sql xu ly
            $lenh_sql = "SELECT ten_san_pham, link_anh, don_gia, so_luot_xem
                        FROM `san_pham` sp
                        INNER JOIN `so_lieu_san_pham` slsp
                        ON sp.ma_san_pham = slsp.ma_san_pham
                        WHERE ten_san_pham LIKE '%$tu_khoa%'
                        OR mo_ta LIKE '%$tu_khoa%'
                        LIMIT $vi_tri_bat_dau, $so_luong_toi_da";
            // lay du lieu vao ket qua
            $ket_qua = $ket_noi_database->query($lenh_sql);
            // tra ve ket qua co duoc
            if ($ket_noi_database->query($lenh_sql) == true && $ket_qua->num_rows > 0) {
                return $ket_qua;

            } else {
                return 'Không có kết quả tìm kiếm khớp với từ khóa: ' . $tu_khoa;
            }

        } catch (Exception $error) {
            // neu co loi thi thong bao loi va thoat
            exit('Chương trình đã gặp lỗi: ' . $error->getMessage());
        }
    }

    // ham dem san pham tra ve tu ket qua tim kiem
    function demSanPhamTuKetQuaTimKiem($tu_khoa) {
        // goi bien toan cuc ket noi database
        global $ket_noi_database;
        // cau lenh sql xu ly
        $lenh_sql = "SELECT COUNT(*)
                    FROM `san_pham`
                    WHERE ten_san_pham LIKE '%$tu_khoa%'
                    OR mo_ta LIKE '%$tu_khoa%'";
        // lay du lieu vao ket qua
        $ket_qua = $ket_noi_database->query($lenh_sql);
        // lay so san pham dem duoc
        $so_ket_qua = $ket_qua->fetch_row();
        $so_ket_qua = $so_ket_qua[0];
        // tra ve ket qua co duoc
        if ($ket_noi_database->query($lenh_sql) == true && $ket_qua->num_rows > 0) {
            return $so_ket_qua;

        } else {
            return 0;
        }
    }
?>
  <!-- $lenh_sql = "SELECT ten_san_pham, link_anh, don_gia, nha_cung_cap, mo_ta, so_luot_xem"
                    . "FROM san_pham"
                    . "INNER JOIN so_lieu_san_pham"
                    . "ON san_pham.ma_san_pham = so_lieu_san_pham.ma_san_pham"
                    . "WHERE san_pham.ma_san_pham = '$ma_san_pham'"; -->