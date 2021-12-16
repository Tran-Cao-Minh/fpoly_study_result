<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: NHAN THAM SO TU DIA CHI TRANG VA TAO FILE THONG TIN TUONG UNG -->
</head>
<body>
    <?php
        // COPY vao dia chi trang
        // ?hoTen=Trần Cao Minh&namSinh=2002&phai=1
        // gan bien
        $hoTen = $_GET['hoTen'];
        $namSinh = $_GET['namSinh'];
        $phai = $_GET['phai'];
        // xu ly cac bien moi tiep nhap
        // xu ly ho ten
        $hoTen = trim(strip_tags($hoTen)); // xu ly khoang trong, tag
        $hoTen = ucwords($hoTen); // in hoa cac chu cai dau

        // xu ly tuoi
        settype($namSinh, "int"); // chuyen ve dang int
        // lay nam hien tai
        $now = getdate();
        $cur_year = $now["year"];
        // tinh tuoi
        $tuoi = $cur_year - $namSinh;

        // xu ly phai
        settype($phai, "int"); // chuyen ve dang int
        // xac dinh phai
        if ($phai == 0) {
            $phai = "Nữ";
        } else {
            $phai = "Nam";
        }

        // tao bien ten file
        $filename = "thongtin.txt";
        // xoa file thongtin.txt neu ton tai
        if (file_exists($filename) == true) {
            unlink($filename);
            echo "Đã xóa file";
        }
        // tao file thongtin.txt    
        if ($hoTen != "" && $namSinh > 0) {
            $string = "Họ tên: " . $hoTen . "\r\n" 
                    . "Phái: " . $phai . "\r\n"
                    . "Tuổi: " . $tuoi . "\r\n";
            file_put_contents($filename, $string);
            echo "Đã tạo file xong";
        }
    ?>
</body>
</html>