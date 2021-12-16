<style>
    .menu1 {
        margin: 0;
        padding: 0;
        list-style: none
    }

    .menu1 li {
        display: inline-block;
        height: 45px;
        line-height: 45px;
        text-align: center;
        color: white;
    }

    .menu1 li::after {
        content: '  |  '
    }

    .menu1 li a {
        color: yellow;
    }
</style>
<?php
    // lay tat ca danh muc san pham trong database
    $lenh_sql = "SELECT ten_danh_muc
                from `danh_muc` 
                order by ma_danh_muc desc";
    $tat_ca_danh_muc = $ket_noi_database->query($lenh_sql);
?>
<ul class="menu1">
    <li><a href="ex4.php"> Trang chủ</a></li>
    <!-- hien thi cac danh muc -->
    <?php foreach ($tat_ca_danh_muc as $danh_muc) : ?>
        <li>
            <a href="#">
                <?php echo ucfirst($danh_muc['ten_danh_muc']); ?>
            </a>
        </li>
    <?php endforeach; ?>
    <li><a href="ex4.php?page=lienhe">Liên hệ</a></li>
    <li><a href="ex4.php?page=gioithieu">Giới thiệu</a></li>
</ul>