<?php
    // tao bien xac dinh so trang va so luong san pham xuat hien
    $so_luong_toi_da = 1;
    $so_trang = 1;
    // neu co thay doi so trang thi lay tham so
    if (isset($_GET['so_trang'])) {
        // gan bien va xet kieu
        $so_trang = $_GET['so_trang'];
        settype($so_trang, 'int');
    }
    // neu nguoi dung co tinh nhap so trang nho hon 1
    if ($so_trang < 1) {
        // gan lai bang 1
        $so_trang = 1;
    }

    // tiep nhan tu khoa tim kiem va cat bo <tag> thua
    $tu_khoa = trim(strip_tags($_GET['tu_khoa']));

    // goi ham lay san pham chua tu khoa
    if ($tu_khoa != '') {
        // neu tu khoa khac rong thi lay ket qua tim kiem
        $danh_sach_ket_qua = layKetQuaTimKiem($tu_khoa, $so_trang, $so_luong_toi_da);
    } else {
        // neu khong thi thong bao
        $danh_sach_ket_qua = 'Bạn vui lòng nhập từ khóa rồi hãy tìm kiếm :>.';
    }

    // goi ham dem so luong san pham tim kiem duoc
    $so_san_pham = demSanPhamTuKetQuaTimKiem($tu_khoa);
?>
<!-- hien du lieu qua html -->
<h2> Kết quả tìm kiếm </h2>
<?php if (gettype($danh_sach_ket_qua) != 'object') : ?>
    <section class="xem-san-pham">
        <h3 class="tieu-de">
            <?php echo $danh_sach_ket_qua; ?>
        </h3>
    </section>
<?php else : ?>
    <section class="xem-san-pham">
        <div class="tieu-de">
            <h3><?php echo 'Từ khóa: ' . $tu_khoa; ?></h3>
        </div>
        <ul class="prod-list">
            <!-- hien thi ket qua san pham qua vong lap php -->
            <!-- mo vong lap php -->
            <?php foreach ($danh_sach_ket_qua as $ket_qua) : ?>
                <li class="prod-item">
                    <div class="contain-img">
                        <a href="./index.php?page=chi_tiet_san_pham&ma_san_pham=<?php echo $ket_qua['ma_san_pham']; ?>">
                            <img src="<?php echo $ket_qua['link_anh']; ?>">
                        </a>
                    </div>
                    <div class="name">
                        <span>
                        <?php echo $ket_qua['ten_san_pham']; ?>
                        </span>
                    </div>
                    <div class="price">
                        <span>
                        <?php echo $ket_qua['don_gia']; ?> VND
                        </span>
                    </div>
                    <div class="luot-xem">
                        <span>
                        <?php echo 'Lượt xem: ' . $ket_qua['so_luot_xem']; ?>
                        </span>
                    </div>
                </li>
            <?php endforeach; ?>
            <!-- dung vong lap php -->
        </ul>
        <section class="phan-chia-trang">
            <!-- tao link phan chia trang -->
            <?php 
                // gan url goc
                $url_goc = "./index.php?page=tim_kiem&tu_khoa=$tu_khoa";
                // goi ham tao link phan chia trang
                echo taoLinkPhanTrang($url_goc, $so_san_pham, $so_trang, $so_luong_toi_da, 2);
            ?>
        </section>
    </section>
<?php endif; ?>