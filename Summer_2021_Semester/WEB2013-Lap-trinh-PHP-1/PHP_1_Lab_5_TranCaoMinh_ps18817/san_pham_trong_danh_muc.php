<?php 
    // tiep nhan ma_danh_muc neu co
    if (isset($_GET['ma_danh_muc'])) {
        // gan vao bien va xet kieu
        $ma_danh_muc = $_GET['ma_danh_muc'];
        settype($ma_danh_muc, 'string');

    } else {
        // neu khong co thi gan gia tri mac dinh cho id
        $ma_danh_muc = 'VH';
    }

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

    // goi ham de lay cac san pham trong danh muc
    $danh_sach_san_pham = laySanPhamTrongDanhMuc($ma_danh_muc, $so_luong_toi_da, $so_trang);
    // goi ham da lay ten danh muc
    $ten_danh_muc = layTenDanhMuc($ma_danh_muc);
    // goi ham dem so luong san pham trong danh muc
    $so_san_pham = demSanPhamTrongDanhMuc($ma_danh_muc);
?>
<!-- hien du lieu qua html -->
<h2>CÁC SẢN PHẨM TRONG MỘT DANH MỤC</h2>
<?php if (gettype($danh_sach_san_pham) != 'object') : ?>
    <section class="xem-san-pham">
        <h3 class="tieu-de">
            <?php echo $danh_sach_san_pham; ?>
        </h3>
    </section>
<?php else : ?>
    <section class="xem-san-pham">
        <div class="tieu-de">
            <h3><?php echo 'Tên danh mục: ' . ucfirst($ten_danh_muc['ten_danh_muc']); ?></h3>
        </div>
        <ul class="prod-list">
            <!-- hien thi san pham qua vong lap php -->
            <!-- mo vong lap php -->
            <?php foreach ($danh_sach_san_pham as $san_pham) : ?>
                <li class="prod-item">
                    <div class="contain-img">
                        <a href="./index.php?page=chi_tiet_san_pham&ma_san_pham=<?php echo $san_pham['ma_san_pham']; ?>">
                            <img src="<?php echo $san_pham['link_anh']; ?>">
                        </a>
                    </div>
                    <div class="name">
                        <span>
                        <?php echo $san_pham['ten_san_pham']; ?>
                        </span>
                    </div>
                    <div class="price">
                        <span>
                        <?php echo $san_pham['don_gia']; ?> VND
                        </span>
                    </div>
                    <div class="luot-xem">
                        <span>
                        <?php echo 'Lượt xem: ' . $san_pham['so_luot_xem']; ?>
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
                $url_goc = "./index.php?page=danh_muc&ma_danh_muc=$ma_danh_muc";
                // goi ham tao link phan chia trang
                echo taoLinkPhanTrang($url_goc, $so_san_pham, $so_trang, $so_luong_toi_da, 2);
            ?>
        </section>
    </section>
<?php endif; ?>