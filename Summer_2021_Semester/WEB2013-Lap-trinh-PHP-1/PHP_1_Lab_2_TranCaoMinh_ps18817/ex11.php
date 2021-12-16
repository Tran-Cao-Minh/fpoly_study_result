<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: TINH TONG DAY SO TU 1 DEN N THONG QUA CAC HAM -->
</head>
<body>
    <form action="ex11.php" method="get">
        <div class="form-control">
            <label>Nhập N nào: </label>
            <input type="number" name="n" required min="2">
        </div>
        <input type="submit" value="Tính tổng của dãy số từ 1 đến N nào!">
        <hr>
    </form>
    <?php
        // TAO CAC HAM CAN SU DUNG
        // ham tinh tong cua day
        function TinhTongCuaDay ($start ,$end) {
            // tao bien tinh tong
            $sumAll = 0;
            // tinh tong qua vong lap
            for ($i = $start; $i <= $end; $i++) {
                $sumAll += $i;
            }
            // tra ve tong da tinh toan
            return $sumAll;
        }
        // ham tinh tong cac so chan cua day
        function TinhTongSoChanCuaDay ($start ,$end) {
            // tao bien tinh tong
            $sumEven = 0;
            // tinh tong qua vong lap
            for ($i = $start; $i <= $end; $i++) {
                // neu so chan thi cong vao tong
                if (($i % 2) == 0) {
                    $sumEven += $i;
                }
            }
            // tra ve tong da tinh toan
            return $sumEven;
        }
        // ham tinh tong cac so le cua day
        function TinhTongSoLeCuaDay ($start ,$end) {
            // tao bien tinh tong
            $sumOdd = 0;
            // tinh tong qua vong lap
            for ($i = $start; $i <= $end; $i++) {
                // neu so le thi cong vao tong
                if (($i % 2) != 0) {
                    $sumOdd += $i;
                }
            }
            // tra ve tong da tinh toan
            return $sumOdd;
        }
        // CAC CAU LENH THUC HIEN
        // neu da co bien thi thuc hien tinh toan
        if ( isset($_GET['n']) ) {
            // gan gia tri cho bien
            $n = $_GET['n'];
            // tao cac bien tinh tong su dung ham
            $sumAll = TinhTongCuaDay(1, $n);
            $sumEven = TinhTongSoChanCuaDay(1, $n);
            $sumOdd = TinhTongSoLeCuaDay(1, $n);
            // thong bao tinh tong cua day so
            echo 'Với N là ' . $n . ' tổng của dãy số là: ' . '<b>' . $sumAll . '</b><br>';
            echo 'Tổng các số chẵn của dãy số là: ' . '<b>' . $sumEven . '</b><br>';
            echo 'Tổng các số lẽ của dãy số là: ' . '<b>' . $sumOdd . '</b><br>';
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập N để tính tổng của dãy nào!';
        }
    ?>
</body>
</html>