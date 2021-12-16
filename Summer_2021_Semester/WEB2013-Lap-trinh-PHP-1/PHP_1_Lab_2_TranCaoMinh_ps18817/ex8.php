<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: TINH TONG VA GIAI THUA CAC SO TU 1 DEN N, KHI NHAP N TU TEXTBOX -->
    <?php
        // neu da submit thi thuc hien
        if ( isset($_GET['submit']) ) {
            // lay bien N
            $N = $_GET['N'];
            // tao bien tinh tong, giai thua
            $sum = 0;
            $factorial = 1;
            // tinh tong, giai thua tu 1 den N qua vong lap
            for ($i = 1; $i <= $N; $i++) {
                $sum += $i;
                $factorial *= $i;
            }
            echo 'Tổng của các số từ 1 đến ' . $N . ' là: ' . $sum . '<br>';
            echo 'Giai thừa của các số từ 1 đến ' . $N . ' là: ' . $factorial . '<br>';
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập đầy đủ dữ liệu vào form và nhấn submit nào :D.';
        }
        echo '<hr>';
    ?>
</head>
<body>
    <form action="ex8.php" method="get">
        <div class="form-control">
            <label>Nhập N: </label>
            <input type="number" name="N" required min="2">
        </div>
        <input type="submit" name="submit" value="Tính tổng và giai thừa các số từ 1 đến N ngay!">
        <hr>
    </form>
</body>
</html>