<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: CHO BIET AM TIET DUOC NHAP VAO TU TEXTBOX LA NGUYEN AM HAY PHU AM -->
    <?php
        // neu da submit thi thuc hien
        if ( isset($_GET['submit']) ) {
            // kiem tra dam bao du lieu nhap vao khong phai la so
            if (is_numeric($_GET['rhythm'])) {
                echo 'Bạn vui lòng nhập âm tiết là không phải số!';
            } else {
                // khoi tao bien la chu thuong
                $rhythm = strtolower($_GET['rhythm']); 
                // thong bao am tiet da nhap vao
                echo 'Ban vừa nhập vào âm tiết "' . $rhythm . '" âm tiết này là: <br>';
                // dung switch case de cho biet nguyen am hay phu am
                switch ($rhythm) {
                    // u e o a i la nguyen am
                    case 'u':
                    case 'e':
                    case 'o':
                    case 'a':
                    case 'i':
                        echo 'Nguyên âm';
                        break;
                    // con lai la phu am
                    default :
                        echo 'Phụ âm';
                } 
            }
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập đầy đủ dữ liệu vào form và nhấn submit nào :D.';
        }
        echo '<hr>';
    ?>
</head>
<body>
    <form action="ex7.php" method="get">
        <div class="form-control">
            <label>Nhập âm tiết: </label>
            <input type="text" name="rhythm" required maxlength="1">
        </div>
        <input type="submit" name="submit" value="Cho biết số ngày trong tháng ngay!">
        <hr>
    </form>
</body>
</html>