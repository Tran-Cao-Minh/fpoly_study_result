<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817 - Bai 4</title>
    <!-- BAI TAP: TINH TONG DAY SO TU 1 DEN N, N NHAP TU BAN PHIM -->
</head>
<body>
    <form action="ex4.php" method="get">
        <div class="form-control">
            <label>Nhập N nào: </label>
            <input type="number" name="n" required min="2">
        </div>
        <input type="submit" value="Tính tổng của dãy số từ 1 đến N nào!">
        <hr>
    </form>
    <?php
        // neu da co bien thi thuc hien tinh toan
        if ( isset($_GET['n']) ) {
            // gan gia tri cho bien
            $n = $_GET['n'];
            // thong bao tinh tong cua day so
            echo 'Với N là ' . $n . ' tổng của dãy số là: ';
            // tao bien tinh tong
            $sum = 0;
            // tinh tong cua day so
            for ( $i = 1; $i <= $n; $i++) {
                $sum += $i;
            }
            // hien thi tong
            echo '<b>' . $sum . '</b>';
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập N để tính tổng của dãy nào!';
        }
    ?>
</body>
</html>