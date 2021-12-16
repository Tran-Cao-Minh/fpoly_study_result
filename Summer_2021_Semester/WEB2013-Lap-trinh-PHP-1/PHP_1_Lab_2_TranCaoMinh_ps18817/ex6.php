<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: CHO BIET SO NGAY TRONG THANG KHI THANG VA NAM DUOC NHAP VAO TU TEXTBOX -->
    <?php
        // neu da submit thi thuc hien 
        if ( isset($_GET['submit']) ) {
            // khoi tao bien
            $month = $_GET['month'];
            $year = $_GET['year'];      
            // thong bao so thang va nam da nhap vao
            echo 'Vào năm ' . $year . ' tháng ' . $month . ' có: <br>';
            // dung switch case de cho biet so ngay
            switch ($month) {
                // thang 1,3,5,7,8,10,12 deu co 31 ngay
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10: 
                case 12:
                    echo 'Số ngày trong tháng là: 31 ngày';
                    break;
                // thang 4,6,9,11 deu co 30 ngay
                case 4:
                case 6:
                case 9: 
                case 11:
                    echo 'Số ngày trong tháng là: 30 ngày';
                    break;
                // thang 2 co 29 ngay vao nam nhuan va 28 vao nam khong nhuan
                case 2:
                    if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
                        // nam nhuan tra ve 29
                        echo 'Số ngày trong tháng là: 29 ngày';
                    } else {
                        // khong nhuan tra ve 28
                        echo 'Số ngày trong tháng là: 28 ngày';
                    }
                    break;
            }
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập đầy đủ dữ liệu vào form và nhấn submit nào :D.';
        }
        echo '<hr>';
    ?>
    <style>
        /* form ex6 css */
        form {
            /* dinh dang box */
            width: calc(100% - 200px);
            height: auto;
            margin: auto;

            background: greenyellow;
        }
        .form-control {
            width: 100%;
            height: auto;
            padding: 10px 0;
            
            background: lightpink;
        }
    </style>
</head>
<body>
    <form action="ex6.php" method="get">
        <div class="form-control">
            <label>Nhập tháng: </label>
            <input type="number" name="month" required min="1" max="12">
        </div>
        <div class="form-control">
            <label>Nhập năm: </label>
            <input type="number" name="year" required min="1">
        </div>
        <input type="submit" name="submit" value="Cho biết số ngày trong tháng ngay!">
        <hr>
    </form>
</body>
</html>