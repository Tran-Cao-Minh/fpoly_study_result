<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1 - Trần Cao Minh – PS18817 - Bai 9</title>
</head>
<body>
    <form action="ex9.php" method="get">
        <div class="form-control">
            <label>Nhập ngày tháng năm sinh của bạn: </label>
            <input type="date" name="birthDate" required>
        </div>
        <input type="submit" value="Tính toán tuổi ngay!">
        <hr>
    </form>
    <?php
        // khoi tao bien
        $birthDate = strtotime($_GET['birthDate']);
        
        // neu da co bien thi thuc hien kiem tra
        if ( isset($birthDate) ) {
            // hien thi ngay sinh da nhap qua lenh echo
            echo '<b>Ngày, tháng, năm sinh của bạn là:</b> ' . date('d-m-Y', $birthDate) . '<br><br>';
            
            // lay thong tin ngay thang hien tai qua ham getdate()
            $date = getdate();
            $day = $date['mday'];
            $month = $date['mon'];
            $year = $date['year'];
            
            // loc truong hop ngay thang nam khong phu hop
            if ( date('Y', $birthDate) >= $year ) {
                // truong hop nam nhap lon hon hien tai
                echo '*** Bạn vui lòng nhập năm sinh nhỏ hơn năm hiện tại!';
            } else if ( ($year - date('Y', $birthDate)) > 200 ) {
                // truong hop do tuoi co the lon hon 200
                echo '*** Bạn vui lòng nhập năm sinh lớn hơn ' . ($year - 200);
            } else {
                // thoa man => tien hanh tinh tuoi
                $age = $year - date('Y', $birthDate);
                // neu ngay hoac thang sinh lon hon ngay thang hien tai thi giam tuoi xuong 1
                if ( date('m', $birthDate) > $month || date('d', $birthDate) > $day ) {
                    $age--;
                }
                // hien thi tuoi
                echo '<b>Tuổi của bạn là:</b> ' . $age . '<br>';
            }
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập ngày tháng năm sinh để tính tuổi nào!';
        }
    ?>
</body>
</html>