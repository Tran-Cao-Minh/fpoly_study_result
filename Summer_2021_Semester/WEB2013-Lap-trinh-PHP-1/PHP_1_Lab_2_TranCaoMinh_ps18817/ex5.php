<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817 - Bai 5</title>
    <!-- BAI TAP: TINH TONG SO LE TU 5 DEN 30 -->
</head>
<body>
    <?php
        // tao bien de tinh tong
        $sum = 0;
        //tinh ket qua cac so le trong khoang (5 , 30]
        for ( $i = 6 ; $i <= 30 ; $i++ ) {
            if ( $i % 2 != 0 ) {
                $sum += $i;
            }
        }
        // hien thi ket qua
        echo '<br> <br> Tổng các số lẽ trong khoảng (5 , 30] là: <b>' . $sum . '</b>';
    ?>
</body>
</html>