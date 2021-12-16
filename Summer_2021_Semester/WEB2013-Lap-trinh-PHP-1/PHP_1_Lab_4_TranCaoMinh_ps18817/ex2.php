<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: KET NOI DATABASE TU PHP VA HIEN THI DU LIEU -->
    <!-- FILE LIEN QUAN: chen_loai_san_pham.php, xoa_loai_san_pham.php -->
    <!-- link boosttrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- code css -->
    <style>
        #wrapper {             
            width: 100%;
            padding: 1.5rem 0;
            background-color: var(--gray);
            position: relative;
        }
        .form-group {
            margin-top: 1rem;
        }
    </style>
    <?php
        // KET NOI VOI DATABASE
        // tao bien chua thong tin ve database
        $ten_server = '127.0.0.1'; // khai bao server
        $ten_nguoi_dung = 'user_cao_minh_php'; // khai bao ten nguoi dung duoc tao trong database
        $mat_khau = '0937232138aA'; // khai bao mat khau
        $ten_database = 'ban_laptop'; // khai bao ten database

        // ket noi database
        $ket_noi_database = new mysqli($ten_server, $ten_nguoi_dung, $mat_khau, $ten_database);

        // neu co loi thi thong bao va thoat
        if ($ket_noi_database->connect_error) {
            exit('Không thể kết nối với database do lỗi: ' . $ket_noi_database->connect_error);
        }

        // LAY DU LIEU TU DATABASE
        // cau lenh sql lay du lieu
        $lenh_sql = "SELECT `ma_loai`, `ten_loai`, `an_hien`
                    FROM `loai_san_pham` 
                    WHERE `an_hien` = '1'
                    ORDER BY `thu_tu` ASC";
        // lay ket qua tra ve tu database thong qua cau lenh sql
        $ket_qua = $ket_noi_database->query($lenh_sql);
        // lay so dong duoc tra ve
        $so_dong = $ket_qua->num_rows;
        // lay dong ket qua qua phuong thuc fetch()
        $dong_ket_qua = $ket_qua->fetch_array();
    ?>
</head>
<body>
    <div id="wrapper">
        <form class="border border-primary col-4 m-auto px-3 pb-4">
            <div class="form-group">
                <label>Số dòng dữ liệu lấy được là:</label> 
                <input value="<?php echo $so_dong . ' dòng'; ?>" disabled 
                    class="form-control"/>
            </div>
            <div class="form-group">
                <label>Xem thử kết quả khi dùng phương thức fetch_array()</label> 
                <input 
                    value="
                    <?php 
                        echo $dong_ket_qua['ma_loai'] . ' ' .
                             $dong_ket_qua['ten_loai'] . ' ' .
                             $dong_ket_qua['an_hien']; 
                    ?>" 
                    disabled class="form-control"/>
            </div>
            <div class="form-group">
                <label>Hiện tên tất cả các loại laptop lấy được</label>
                <!-- hien bang php -->
                <?php foreach ($ket_qua as $dong_ket_qua) : ?>
                <input value="<?php echo $dong_ket_qua['ten_loai']; ?>" 
                    disabled class="form-control"/>
                <?php endforeach; ?>
            </div>
            <div class="form-group">
                <!-- qua trang chen loai san pham voi cac tham so da truyen -->
                <a href="./chen_loai_san_pham.php?ma_loai=LT007&ten_loai=Huawei&thu_tu=7&an_hien=1">
                    <input value="Thêm loại sản phẩm" class="btn btn-success"/> 
                </a>
            </div>
            <div class="form-group">
                <!-- qua trang xoa loai san pham voi cac tham so da truyen -->
                <a href="./xoa_loai_san_pham.php?ma_loai=LT007">
                    <input value="Xóa loại sản phẩm" class="btn btn-danger"/> 
                </a>
            </div>
        </form>
    </div>
</body>
</html>