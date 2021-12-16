<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: TAO VA SU DUNG HAM -->
    <!-- FILE DI KEM: ham.php -->
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
        // nhung file ham.php
        include('ham.php');
        // tao mot vai bien can truyen
        $ho_ten = 'Trần Cao Minh';
        $url_khong_than_thien = '    ?   $  người     *  suốt   @ đời     gặp |   may    ';
        $ngay_sinh = '14/08/2002';
    ?>
</head>
<body>
    <div id="wrapper">
        <form class="border border-primary col-4 m-auto px-3 pb-4">
            <div class="form-group">
                <label>Thời điểm hiện tại</label> 
                <input value="<?php echo hien_thoi_diem_hien_tai(); ?>" disabled 
                    class="form-control"/>
            </div>
            <div class="form-group">
                <label>Họ tên không dấu</label> 
                <input value="<?php echo cat_dau_tieng_viet($ho_ten); ?>" disabled 
                    class="form-control"/>
            </div>
            <div class="form-group">
                <label>Url thân thiện</label> 
                <input value="<?php echo tao_url_than_thien($url_khong_than_thien); ?>" disabled 
                    class="form-control"/>
            </div>
            <div class="form-group">
                <label>Tính tuổi từ ngày sinh</label> 
                <input value="<?php echo tinh_tuoi($ngay_sinh); ?>" disabled 
                    class="form-control"/>
            </div>
        </form>
    </div>
</body>
</html>