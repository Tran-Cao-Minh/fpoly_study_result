<!-- HEADER -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trần Cao Minh PS18817</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- link font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- dung php tao css -->
    <style>
    /* goi link css qua php - tranh cac loi nhu khong cap nhat css */
    /* do trinh luu css vao bo nho tam de khong goi lai cua trinh duyet */
    <?php 
        foreach ($link_css_arr as $link_css) {
            include($link_css);
        }
    ?>
    </style>
    <!-- end dung php tao css -->
    <!-- link Jquery Library -->
    <script src="../../libraries/jquery-3.6.0.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="decorate-bar">
                <div class="contain-decorations">
                    <svg>
                        <polygon points="9.9, 0, 3.3, 20.68, 19.8, 7.48, 0, 7.48, 16.5, 20.68" />
                    </svg>
                    <div class="contain-canvas">
                        <canvas width="275px" height="42px">
                            Trình duyệt của bạn không hỗ trợ thẻ canvas.
                        </canvas>
                    </div>
                    <svg>
                        <polygon points="9.9, 0, 3.3, 20.68, 19.8, 7.48, 0, 7.48, 16.5, 20.68" />
                    </svg>
                </div>
            </div>
            <div class="header-bar">
                <div class="logo">
                    <img src="../../images/general/logo-thienHaBook-hoanThien-a.png" alt="">
                </div>
                <!-- se dieu chinh theo kich thuoc man hinh -->
                <div class="search-area">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Nhập sản phẩm bạn muốn tìm kiếm và nhấn Enter ..." maxlength="100"
                        <?php
                            if (isset($_GET['key_word'])) {
                                $key_word = $_GET['key_word'];
                                echo 'value="' . $key_word . '"';
                            }
                        ?>
                    >
                </div>
                <!-- xuat hien khi w man hinh <= 1024 -->
                <div class="menu">
                    <i class="fas fa-bars"></i>
                </div>
                <!-- xuat hien khi nhan nut menu -->
                <div class="menu-board">
                    <div class="menu-board-right"></div>
                    <nav class="menu-board-left">
                    <!-- dung php tao menu cac trang can hien thi -->
                    <?php foreach ($all_page as $page_link => $page_name) : ?> 
                        <!-- gach chan trang duoc chuyen toi qua class choosen-->
                        <?php if ($page_link == $action) : ?>
                            <a href="<?php echo '?action=' . $page_link; ?>">
                                <div class="menu-list choosen">
                                    <?php echo $page_name; ?>
                                </div>
                            </a>
                        <!-- cac trang con lai khong gach chan -->
                        <?php else : ?>
                            <a href="<?php echo '?action=' . $page_link; ?>">
                                <div class="menu-list">
                                    <?php echo $page_name; ?>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <!-- end dung php tao menu cac trang can hien thi -->
                        <div class="exit-menu">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="logo">
                            <img src="../../images/general/logo-thienHaBook-hoanThien-b.png" alt="">
                        </div>
                    </nav>
                </div>
                <!-- xuat hien khi kich thuoc man hinh > 1024 -->
                <nav class="menu-header">
                    <!-- dung php tao menu cac trang can hien thi -->
                    <?php foreach ($all_page as $page_link => $page_name) : ?>
                        <!-- gach chan trang duoc chuyen toi qua class choosen-->
                        <?php if ($page_link == $action) : ?>
                            <a href="<?php echo '?action=' . $page_link; ?>">
                                <div class="menu-list choosen">
                                    <?php echo $page_name; ?>
                                </div>
                            </a>
                        <!-- cac trang con lai khong gach chan -->
                        <?php else : ?>
                            <a href="<?php echo '?action=' . $page_link; ?>">
                                <div class="menu-list">
                                    <?php echo $page_name; ?>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <!-- end dung php tao menu cac trang can hien thi -->
                </nav>
            </div>
        </header>
<!-- END HEADER -->