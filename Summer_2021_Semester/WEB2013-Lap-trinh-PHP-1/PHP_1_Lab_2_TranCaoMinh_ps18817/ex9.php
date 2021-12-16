<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: SU DUNG VONG LAP DE HIEN THI NGAY THANG NAM TU 1900 DEN NAM HIEN TAI -->
    <?php
        // khoi tao bien ngay thang nam
        $day = 1;
        $month = 1;
        $year = 1900;
        // hien thi ngay thang nam qua vong lap
        while ($year < 2022) {
            // hien thi
            echo 'Ngày <b>' . $day . '</b> Tháng <b>' . $month . '</b> Năm <b>' . $year . '</b><br>';
            // tang dan ngay thang nam
            $day ++;
            // neu ngay van nho hon hoac bang 28 thi tiep tuc
            if ($day <= 28) {
                continue;
            }
            // neu lon hon thi gan bien day_max theo quy tac
            switch ($month) {
                // thang 1,3,5,7,8,10,12 deu co 31 ngay
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10: 
                case 12:
                    $day_max = 31;
                    break;
                // thang 4,6,9,11 deu co 30 ngay
                case 4:
                case 6:
                case 9: 
                case 11:
                    $day_max = 30;
                    break;
                // thang 2 co 29 ngay vao nam nhuan va 28 vao nam khong nhuan
                case 2:
                    if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
                        // nam nhuan tra ve 29
                        $day_max = 29;
                    } else {
                        // khong nhuan tra ve 28
                        $day_max = 28;
                    }
                    break;
            }
            // neu ngay lon hon ngay toi da thi gan ngay = 1 va tang thang
            if ($day > $day_max) {
                $day = 1;
                $month ++;
                // neu thang lon hon 12 thi gan thang = 1 va tang nam
                if ($month > 12) {
                    $month = 1;
                    $year++;
                }
            }
        }
    ?>
</head>
<body>
    <!-- hien thi qua ma php -->
</body>
</html>