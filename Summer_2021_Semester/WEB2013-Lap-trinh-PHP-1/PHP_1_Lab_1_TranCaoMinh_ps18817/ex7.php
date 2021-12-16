<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1 - Trần Cao Minh – PS18817 - Bai 7</title>
</head>
<body>
    <form action="ex7.php" method="get">
        <div class="form-control">
            <label>Nhập số a: </label>
            <input type="number" name="numberA" required>
        </div>
        <div class="form-control">
            <label>Nhập số b: </label>
            <input type="number" name="numberB" required>
        </div>
        <input type="submit" value="Tính toán ngay!">
        <hr>
    </form>
    <?php
        // khoi tao bien
        $a = $_GET['numberA'];
        $b = $_GET['numberB'];
        // neu da co bien thi thuc hien tinh toan
        if ( isset($a) && isset($b) ) {
            // tinh tong, hieu, tich, thuong
            $tong = $a + $b;
            $hieu = $a - $b;
            $tich = $a * $b;
            if ($b != 0) {
                $thuong = $a / $b;    
            } else {
                $thuong = 'Bạn vui lòng nhập b khác 0 để tính thương của a';
            }
            // hien thi ket qua qua lenh echo
            echo '<b>Số a: </b>' . $a . '<br>';
            echo '<b>Số b: </b>' . $b . '<br><br>';
            echo '<b>Tổng là: </b>' . $tong . '<br>';
            echo '<b>Hiệu là: </b>' . $hieu . '<br>';
            echo '<b>Tích a: </b>' . $tich . '<br>';
            echo '<b>Thương a: </b>' . $thuong . '<br>';         
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập số a,b và tính toán nào!';
        }
    ?>
</body>
</html>