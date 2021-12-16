<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817 - Bai 1</title>
    <!-- BAI TAP: GIAI PHUONG TRINH BAC NHAT CUA 2 SO NHAP TU BAN PHIM -->
</head>
<body>
    <form action="ex1.php" method="get">
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
        // neu da co bien thi thuc hien tinh toan
        if ( isset($_GET['numberA']) && isset($_GET['numberB']) ) {
            // gan gia tri cho bien
            $a = $_GET['numberA'];
            $b = $_GET['numberB'];
            // thong bao giai phuong trinh
            echo 'Kết quả của việc giải phương trình bậc nhất ' . $a . 'x + ' . $b . ' là: <br>';
            // giai phuong trinh bac nhat
            if ($a == 0) {
                // a = 0 dung thi xet b
                if($b == 0) {
                    // b = 0 va a = 0 thi phuong trinh co vo so nghiem
                    echo 'Phương trình có vô số nghiệm';
                } else {
                    // b khac va a = 0 thi phuong trinh vo nghiem
                    echo 'Phương trình vô nghiệm';
                }
            } else {
                // a khac 0 thi phuong trinh co mot nghiem la
                $nghiem = -$b / $a;
                echo 'Phương trình có nghiệm là ' . $nghiem;
            }     
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập số a,b và kiểm tra nào!';
        }
    ?>
</body>
</html>