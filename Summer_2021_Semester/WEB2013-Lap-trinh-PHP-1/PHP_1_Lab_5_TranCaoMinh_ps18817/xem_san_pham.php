<?php
    // lay hanh_dong tu url - neu co
    if (isset($_GET['hanh_dong'])) {
        $hanh_dong = $_GET['hanh_dong'];

    } else if (!isset($hanh_dong)){
        // neu khong gan hanh dong mac dinh la xem san pham moi
        $hanh_dong = 'xem_san_pham_moi';
    } 
    // neu co $hanh_dong duoc truyen roi thi giu nguyen

    // xac dinh cau lenh sql tuong ung va tieu de theo hanh dong
    switch ($hanh_dong) {
        case 'xem_san_pham_moi':
            $lenh_sql = "SELECT sp.ma_san_pham, link_anh, ten_san_pham, don_gia, so_luot_xem
                        FROM san_pham sp
                        INNER JOIN so_lieu_san_pham slsp
                        ON sp.ma_san_pham = slsp.ma_san_pham
                        ORDER BY ngay_them DESC
                        LIMIT 8";
            $tieu_de = 'Xem sản phẩm mới';
            break;
        case 'xem_san_pham_xem_nhieu':
            $lenh_sql = "SELECT sp.ma_san_pham, link_anh, ten_san_pham, don_gia, so_luot_xem
                        FROM san_pham sp
                        INNER JOIN so_lieu_san_pham slsp
                        ON sp.ma_san_pham = sp.ma_san_pham
                        ORDER BY so_luot_xem DESC
                        LIMIT 8";
            $tieu_de = 'Xem sản phẩm xem nhiều';
            break;
        case 'xem_san_pham_noi_bat':
            $lenh_sql = "SELECT sp.ma_san_pham, link_anh, ten_san_pham, don_gia, so_luot_xem
                        FROM san_pham sp
                        INNER JOIN so_lieu_san_pham slsp
                        ON sp.ma_san_pham = slsp.ma_san_pham
                        ORDER BY so_luong_ban_trong_thang DESC
                        LIMIT 8";
            $tieu_de = 'Xem sản phẩm nổi bật';
            break;
    }
    // lay ket qua tra ve tu database thong qua cau lenh sql
    $ket_qua = $ket_noi_database->query($lenh_sql);
?>
<!-- hien du lieu qua html -->
<section class="xem-san-pham">
    <div class="tieu-de">
        <h3><?php echo $tieu_de; ?></h3>
    </div>
    <ul class="prod-list">
        <!-- hien thi san pham qua vong lap php -->
        <!-- mo vong lap php -->
        <?php foreach ($ket_qua as $san_pham) : ?>
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
</section>
        