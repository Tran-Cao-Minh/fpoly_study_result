<?php 
    // tiep nhan ma_san_pham neu co
    if (isset($_GET['ma_san_pham'])) {
        // gan vao bien va xet kieu
        $ma_san_pham = $_GET['ma_san_pham'];
        settype($ma_san_pham, 'string');

    } else { 
        // neu khong co thi gan gia tri mac dinh cho id
        $ma_san_pham = '1';
    }

    // goi ham de lay chi tiet 1 san pham
    $san_pham = layChiTietSanPham($ma_san_pham);
    // goi ham tang so lan xem
    tangSoLanXem($ma_san_pham);
?>
<!-- hien thi chi tiet san pham neu co -->
<?php if (gettype($san_pham) != 'array') : ?>
    <section class="chi-tiet-san-pham">
        <h3 class="ten-san-pham">
            <?php echo $san_pham . $ma_san_pham; ?>
        </h3>
    </section>
<?php else : ?>
    <section class="chi-tiet-san-pham">
        <h3 class="ten-san-pham">
            <?php echo $san_pham['ten_san_pham']; ?>
        </h3>
        <div class="thong-tin">
            <img src="<?php echo $san_pham['link_anh']; ?>" alt="" class="anh-san-pham">
            <span class="gia">
                Giá: <?php echo $san_pham['don_gia']; ?> VND
            </span>
            <span class="nha-cung-cap">
                Nhà Xuất Bản: <?php echo $san_pham['nha_cung_cap']; ?>
            </span>
            <span class="so-luot-xem">
                Số lượt xem: <?php echo $san_pham['so_luot_xem']; ?>
            </span>
        </div>
        <h6 class="mo-ta">
            <?php echo $san_pham['mo_ta']; ?>
        </h6>
    </section>
<?php endif; ?>