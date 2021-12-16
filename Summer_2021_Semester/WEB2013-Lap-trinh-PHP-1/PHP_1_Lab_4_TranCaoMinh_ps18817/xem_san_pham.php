<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 - Trần Cao Minh – PS18817</title>
    <!-- file cap tren: ex3.php -->
    <style>
        /* goi file css chay tren local tranh loi */
        <?php include('./xem_san_pham.css'); ?>
    </style>
    <?php
        // ket noi database
        require('./ket_noi_database.php');

        // lay hanh_dong tu url - neu co
        if (isset($_GET['hanh_dong'])) {
            $hanh_dong = $_GET['hanh_dong'];
        } else {
            // neu khong gan hanh dong mac dinh la xem san pham moi
            $hanh_dong = 'xem_san_pham_moi';
        }

        // xac dinh cau lenh sql tuong ung theo hanh dong
        switch ($hanh_dong) {
            case 'xem_san_pham_moi':
                $lenh_sql = "SELECT link_anh, ten_san_pham, don_gia, so_luot_xem
                            FROM `san_pham`
                            INNER JOIN `so_lieu_san_pham`
                            ON `san_pham`.ma_san_pham = `so_lieu_san_pham`.ma_san_pham
                            ORDER BY ngay_them DESC
                            LIMIT 4";
                break;
            case 'xem_san_pham_xem_nhieu':
                $lenh_sql = "SELECT link_anh, ten_san_pham, don_gia, so_luot_xem
                            FROM `san_pham`
                            INNER JOIN `so_lieu_san_pham`
                            ON `san_pham`.ma_san_pham = `so_lieu_san_pham`.ma_san_pham
                            ORDER BY so_luot_xem DESC
                            LIMIT 4";
                break;
            case 'xem_san_pham_noi_bat':
                $lenh_sql = "SELECT link_anh, ten_san_pham, don_gia, so_luot_xem
                            FROM `san_pham`
                            INNER JOIN `so_lieu_san_pham`
                            ON `san_pham`.ma_san_pham = `so_lieu_san_pham`.ma_san_pham
                            ORDER BY so_luong_ban_trong_thang DESC
                            LIMIT 4";
                break;
        }
        // lay ket qua tra ve tu database thong qua cau lenh sql
        $ket_qua = $ket_noi_database->query($lenh_sql);
    ?>
</head>
<body>
    <h1><?php echo $hanh_dong; ?></h1>
    <ul class="prod-list">
        <!-- hien thi san pham qua vong lap php -->
        <!-- mo vong lap php -->
        <?php foreach ($ket_qua as $san_pham) : ?>
            <li class="prod-item">
                <div class="contain-img">
                    <img src="<?php echo $san_pham['link_anh']; ?>" alt="<?php echo $san_pham['link_anh']; ?>">
                </div>
                <div class="name">
                    <span>
                    <?php echo $san_pham['ten_san_pham']; ?>
                    </span>
                </div>
                <div class="price">
                    <span>
                    <?php echo $san_pham['don_gia']; ?>
                    </span>
                </div>
                <div class="old-price">
                    <span>
                    <?php echo 'Lượt xem: ' . $san_pham['so_luot_xem']; ?>
                    </span>
                </div>
            </li>
        <?php endforeach; ?>
        <!-- dong vong lap php -->
    </ul>
</body>
</html>