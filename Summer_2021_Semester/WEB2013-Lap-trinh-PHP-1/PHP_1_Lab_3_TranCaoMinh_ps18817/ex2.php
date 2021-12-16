<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: NHAN THAM SO TU DIA CHI TRANG VA HIEN MAT KHAU NGAU NHIEN -->
</head>
<body>
    <?php
        // COPY vao dia chi trang
        // ?soKyTu=7
        $soKyTu = $_GET['soKyTu'] + 0;
        if ($soKyTu == 0) {
            // neu khong co so ky tu thi mac dinh la 8
            $soKyTu = 8;
        }
        // THUC HIEN MA HOA
        // tao so ngau nhien
        $soNgauNhien = random_int(0, 99999);
        // ma hoa so ngau nhien thanh chuoi ngau nhien
        $chuoiNgauNhien = md5($soNgauNhien);
        // cac phuong phap khac
        // $chuoiNgauNhien = sha1($soNgauNhien);
        // $chuoiNgauNhien = base64_encode($soNgauNhien);
        // cat ra chuoi ngau nhien
        $matKhauNgauNhien = substr($chuoiNgauNhien, 0, $soKyTu);
        // chuyen mat khau ngau nhien sang chu in hoa
        $matKhauNgauNhien = strtoupper($matKhauNgauNhien);
        // hien thi mat khau ngau nhien
        echo 'Mật khẩu ngẫu nhiên: <b>' . $matKhauNgauNhien . '</b>';
    ?>
</body>
</html>