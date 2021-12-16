<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817 - Bai 2</title>
    <!-- BAI TAP: KIEM TRA HOC LUC SINH VIEN THEO DIEM DUOC NHAP VAO BAN PHIM -->
</head>
<body>
    <form action="ex2.php" method="get">
        <div class="form-control">
            <label>Nhập điểm của sinh viên: </label>
            <input type="number" name="scores" required min="0" max="10">
        </div>
        <input type="submit" value="Kiểm tra học lực của sinh viên nào!">
        <hr>
    </form>
    <?php
        // neu da co bien thi thuc hien tinh toan
        if ( isset($_GET['scores']) ) {
            // gan gia tri cho bien
            $scores = $_GET['scores'];
            // thong bao kiem tra hoc luc
            echo 'Với số điểm ' . $scores . ' học lực của bạn là: ';
            // xet hoc luc theo diem
            if ($scores >= 9) {
                // thong bao hoc luc
                echo '<b>Xuất Sắc</b>';
            } else if ($scores >= 7.5 && $scores < 9) {
                // thong bao hoc luc
                echo '<b>Giỏi</b>';
            } else if ($scores >= 6.5 && $scores < 7.5) {
                // thong bao hoc luc
                echo '<b>Khá</b>';
            } else if ($scores >= 5 && $scores < 6.5) {
                // thong bao hoc luc
                echo '<b>Trung Bình</b>';
            } else {
                // thong bao hoc luc
                echo '<b>Yếu</b>';
            }
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập điểm và kiểm tra học lực nào!';
        }
    ?>
</body>
</html>