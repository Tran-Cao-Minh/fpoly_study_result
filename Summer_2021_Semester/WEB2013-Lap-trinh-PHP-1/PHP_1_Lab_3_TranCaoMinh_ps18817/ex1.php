<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: FORM TIM KIEM - TIEP NHAN VA HIEN TU KHOA RA TRANG -->
    <!-- link boosttrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        #wrapper {             
            width: 100%;
            background-color: var(--gray);
            position: relative;
        }
        /* form css */
        form {
            max-width: 40rem;
            margin: auto;
            padding: 2rem 0;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <form class="input-group" action="ex1.php" method="get">
            <input class="form-control" name="keyword" type="text" placeholder="Nhập từ khóa">
            <input class="btn btn-primary" type="submit" value="TÌM KIẾM">
            <hr>
        </form>
    </div>
    <?php
        // neu da co bien thi thuc hien tinh toan
        if ( isset($_GET['keyword']) ) {
            // gan gia tri cho bien
            $keyword = $_GET['keyword']; 
            $keyword = trim(strip_tags($keyword));
            // thuc hien tim kiem
            echo 'KẾT QUẢ TÌM KIẾM THEO TỪ KHÓA: <b>' . $keyword . '</b>';
            
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập từ khóa và tìm kiếm nào!';
        }
    ?>
</body>
</html>