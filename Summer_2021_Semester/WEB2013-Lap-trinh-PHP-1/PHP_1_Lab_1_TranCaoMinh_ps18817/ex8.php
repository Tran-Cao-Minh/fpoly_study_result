<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1 - Trần Cao Minh – PS18817 - Bai 8</title>
</head>
<body>
    <form action="ex8.php" method="get">
        <div class="form-control">
            <label>Nhập năm bạn muốn kiểm tra: </label>
            <input type="number" name="yearInput" required min="0">
        </div>
        <input type="submit" value="Kiểm tra ngay!">
        <hr>
    </form>
    <?php
        // khoi tao bien
        $yearInput = $_GET['yearInput'];
        // neu da co bien thi thuc hien kiem tra
        if ( isset($yearInput) ) {
            // hien thi nam nhap vao qua lenh echo
            echo '<b>Năm bạn nhập vào là:</b> ' . $yearInput . '<br>';
            // kiem tra qua lenh if else
            if ( ( ($yearInput % 4) == 0 && ($yearInput % 100) != 0 ) || ($yearInput % 400) == 0 ) {
                // hien thi ket qua qua lenh echo       
                echo 'Năm bạn nhập vào là năm nhuận nhen :D';
            } else {
                // hien thi ket qua qua lenh echo  
                echo 'Năm bạn nhập vào KHÔNG phải là năm nhuận nhen :D';
            }
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập năm và kiểm tra nào!';
        }
    ?>
</body>
</html>