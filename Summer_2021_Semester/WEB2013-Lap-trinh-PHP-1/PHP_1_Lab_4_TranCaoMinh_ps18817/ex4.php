<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: LAY THONG TIN TU DATABASE VA DUA VAO LAYOUT -->
    <!-- FILE LIEN QUAN: menu.php, home.php, lien_he.php, gioi_thieu.php -->
    <!-- tin_chi_tiet.php, tin_trong_loai.php -->
    <!-- link boosttrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- code css -->
    <style>
        header.row {
            height: 180px;
            background-color: darkcyan
        }

        nav.row {
            height: 45px;
            background-color: darkgreen
        }

        .col-9,
        .col-3 {
            min-height: 500px
        }

        .col-9 {
            background-color: azure
        }

        .col-3 {
            background-color: cadetblue
        }

        footer.row {
            height: 120px;
            background-color: darkblue;
        }
    </style>

    <?php
        // bat dau cac bien session
        session_start();
        // ket noi database
        require_once './ket_noi_database.php';

        // lay thong vi tri trang
        if (isset($_GET['page'])) {
            $page = trim(strip_tags($_GET['page']));
        }
        else {
            $page="";
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
                    case "lienhe": 
                        require_once 'lien_he.php';
                        break;
                    case "gioithieu": 
                        require_once 'gioi_thieu.php'; 
                        break;
                    case "tin": 
                        require_once 'tin_chi_tiet.php'; 
                        break;
                    case "loai": 
                        require_once 'tin_trong_loai.php'; 
                        break;
                    default: 
                        require_once 'home.php'; 
                }
            ?>
            </main>
            <aside class="col-3"> </aside>
        </div>
        <footer class="row"> </footer>
    </div>

</body>

</html>