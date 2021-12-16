<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: NHAN NGAY TU DIA CHI TRANG VA HIEN THI THONG TIN VE NGAY DO -->
</head>
<body>
    <?php
        // COPY vao dia chi trang
        // ?ngay=14/08/2002
        $ngay = $_GET['ngay'];
        // chuyen bien nhan duoc sang dang mang
        $arr = explode('/', $ngay);
        // kiem tra ngay thang
        if (checkdate($arr[1], $arr[0], $arr[2]) == true) {
            echo 'Ngày hợp lệ <br>';
        } else {
            echo 'Ngày không hợp lệ <br>';
        }
        // tao bien ngay
        $ngay = $arr[2] . "-" . $arr[1] . "-" . $arr[0];
        // ma hoa bien ngay
        $time_stamp = strtotime($ngay);
        // tao bien thu
        $thu = date("w", $time_stamp);
        // su dung switch case hien thi thu
        switch ($thu) {
            case 0: $ten_thu = "Chủ nhật"; break;
            case 1: $ten_thu = "Thứ hai"; break;
            case 2: $ten_thu = "Thứ ba"; break;
            case 3: $ten_thu = "Thứ tư"; break;
            case 4: $ten_thu = "Thứ năm"; break;
            case 5: $ten_thu = "Thứ sáu"; break;
            case 6: $ten_thu = "Thứ bảy"; break;
        }
        // thong bao cac du lieu can thiet ra man hinh
        echo 'Thứ trong tuần của ngày ' . $ngay . ' là ' . $ten_thu . '<br>';
        echo 'Ngày trong năm của ngày ' . $ngay . ' là ' . date("z", $time_stamp) . '<br>';
    ?>
</body>
</html>