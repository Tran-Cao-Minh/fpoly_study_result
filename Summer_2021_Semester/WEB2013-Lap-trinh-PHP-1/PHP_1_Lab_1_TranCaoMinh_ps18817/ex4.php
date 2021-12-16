<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lab 1 - Trần Cao Minh – PS18817 - Bai 4</title>
    </head>
    <body>
        <?php
            // khoi tao bien
            $a = 100;
            $b = 20;
            // tinh tong, hieu, tich, thuong
            $tong = $a + $b;
            $hieu = $a - $b;
            $tich = $a * $b;
            $thuong = $a / $b;
            // hien thi ket qua qua lenh echo
            echo '<b>Số a: </b>' . $a . '<br>';
            echo '<b>Số b: </b>' . $b . '<br><br>';
            echo '<b>Tổng là: </b>' . $tong . '<br>';
            echo '<b>Hiệu là: </b>' . $hieu . '<br>';
            echo '<b>Tích a: </b>' . $tich . '<br>';
            echo '<b>Thương a: </b>' . $thuong . '<br>';
        ?>
    </body>
</html>
