<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan tri Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        header.row {
            height: 90px;
        }

        div.noidung>aside,
        div.noidung>main {
            min-height: 500px
        }
    </style>
    <?php
        session_start();
        // luu link trang hien tai cho viec xac nhan
        $_SESSION['back_page_link'] = $_SERVER['REQUEST_URI'];

        // kiem tra yeu cau truoc khi vao trang quan tri
        if (isset($_SESSION['login_id']) == false) {
            $_SESSION['thong_bao'] = 'Bạn chưa đăng nhập';
            header('location: login.php');
            exit();
        }
        if ($_SESSION['login_group'] != 1) {
            $_SESSION['thong_bao'] = 'Bạn không phải là admin';
            header('location: login.php');
            exit();
        }
        // code khoi dau xac dinh trang
        if (isset($_GET['page'])) {
            $page = trim(strip_tags($_GET['page']));
        } 
        else {
            $page = 'loai_tin_ds';
        }
        require_once('./functions.php');
    ?>
</head>

<body>
    <div class="container">
        <header class="row bg-info"></header>
        <div class="row noidung">
            <aside class="col-2 bg-dark text-white">
                <ul class="list-group mx-n3">
                    <li class="list-group-item">
                        <a href="./index.php?page=the_loai_them">
                            Thêm thể loại
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="./index.php?page=the_loai_ds">
                            Danh sách thể loại
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="./index.php?page=loai_tin_them">
                            Thêm loại tin
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="./index.php?page=loai_tin_ds">
                            Danh sách loại tin
                        </a>
                    </li>
                </ul>
            </aside>
            <main class="col-10 border">
                <!-- Nội dung chính -->
                <?php
                    switch ($page) {
                        case 'the_loai_ds': 
                            require_once('./the_loai_ds.php'); 
                            break;
                        case 'the_loai_them': 
                            require_once('./the_loai_them.php'); 
                            break;
                        case 'the_loai_sua': 
                            require_once('./the_loai_sua.php'); 
                            break;
                        case 'loai_tin_ds': 
                            require_once('./loai_tin_ds.php'); 
                            break;
                        case 'loai_tin_them': 
                            require_once('./loai_tin_them.php'); 
                            break;
                        case 'loai_tin_sua': 
                            require_once('./loai_tin_sua.php'); 
                            break;
                    }
                ?>
            </main>
        </div>
    </div>
</body>

<!-- sau khi thu hien cau lenh tai trang 1 lan thi -->
<!-- bat buoc admin phai dang nhap lai de dam bao an toan -->
<!-- thong qua viec xoa SESSION dang nhap va tao SESSION luu trang truoc do -->
<?php
    if ($_SESSION['login_id'] == '') {
        $_SESSION['thong_bao'] = 'Bạn vui lòng đăng nhập lại để đảm bảo an toàn';
        echo '<script> location.replace("login.php"); </script>';
    }
    $_SESSION['login_id'] = '';
?>

</html>