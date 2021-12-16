<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: LAY THONG TIN TU DATABASE VA DUA VAO LAYOUT -->
    <!-- FILE LIEN QUAN: tat ca file con lai -->
    <!-- link boosttrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- code css -->
    <style>
        /* goi cac file css can thiet */
        <?php
            include('./css/general.css');
            include('./css/menu.css');
            include('./css/xem_san_pham.css');
            include('./css/san_pham_chi_tiet.css');

        ?>
    </style>

    <?php
        // ket noi database
        require_once './ket_noi_database.php';

        // lay thong tin vi tri trang
        if (isset($_GET['page'])) {
            $page = trim(strip_tags($_GET['page']));
        }
        else {
            $page="";
        }

        // lay thong tin tu khoa da nhap neu co
        if (isset($_GET['tu_khoa'])) {
            $tu_khoa = trim(strip_tags($_GET['tu_khoa']));
        }
        else {
            $tu_khoa = '';
        }
     
    ?>
</head>

<body>

    <div class="container">
        <header class="row"> </header>
        <nav class="row"> 
            <!-- nhung file menu.php -->
            <?php require_once('menu.php'); ?>
        </nav>
        <div class="row ">
            <main class="col-9">
            <!-- nhung cac trang con tuong ung voi vi tri trang -->
            <?php
                switch ($page) {
                    case "lien_he": 
                        require_once './lien_he.php';
                        break;
                    case "gioi_thieu": 
                        require_once './gioi_thieu.php'; 
                        break;
                    case "tin": 
                        require_once './tin_chi_tiet.php'; 
                        break;
                    case "danh_muc": 
                        require_once './san_pham_trong_danh_muc.php'; 
                        break;
                    case "chi_tiet_san_pham":
                        require_once './san_pham_chi_tiet.php';
                        break;
                    case "tim_kiem":
                        require_once './ket_qua_tim_kiem.php';
                        break;
                    default: 
                        require_once './home.php'; 
                }
            ?>
            </main>
            <aside class="col-3"> 
                <form method="get" action="./index.php">
                    <input type="hidden" name="page" value="tim_kiem">
                    <div class="form-group mt-4">
                        <label class="fs-3">Nhập thông tin cần tìm</label>
                        <input name="tu_khoa" type="text" class="form-control fs-5" required maxlength="100" 
                            value="<?php echo $tu_khoa ?>" />
                    </div>
                    <button type="submit" class="btn btn-success fs-4 py-1 px-2 mt-1" >
                        Tìm kiếm
                    </button>
                </form>
            </aside>
        </div>
        <footer class="row"> </footer>
    </div>

</body>

</html>