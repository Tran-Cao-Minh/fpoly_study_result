<?php
    // lay tat ca danh muc san pham trong database
    $lenh_sql = "SELECT ten_danh_muc, ma_danh_muc
                from `danh_muc` 
                order by ma_danh_muc desc";
    $tat_ca_danh_muc = $ket_noi_database->query($lenh_sql);
?>
<ul class="menu1">
    <li><a href="index.php"> Trang chủ</a></li>
    <li><a href="index.php?hanh_dong=xem_san_pham_moi"> Sản phẩm mới</a></li>
    <li><a href="index.php?hanh_dong=xem_san_pham_xem_nhieu"> Sản phẩm xem nhiều</a></li>
    <li><a href="index.php?hanh_dong=xem_san_pham_noi_bat"> Sản phẩm nổi bật</a></li>
    <!-- hien thi cac danh muc -->
    <?php foreach ($tat_ca_danh_muc as $danh_muc) : ?>
        <li>
            <a href="index.php?page=danh_muc&ma_danh_muc=<?php echo $danh_muc['ma_danh_muc']?>&so_trang=1">
                <?php echo ucfirst($danh_muc['ten_danh_muc']); ?>
            </a>
        </li>
    <?php endforeach; ?>
    <li><a href="index.php?page=lien_he">Liên hệ</a></li>
    <li><a href="index.php?page=gioi_thieu">Giới thiệu</a></li>
</ul>