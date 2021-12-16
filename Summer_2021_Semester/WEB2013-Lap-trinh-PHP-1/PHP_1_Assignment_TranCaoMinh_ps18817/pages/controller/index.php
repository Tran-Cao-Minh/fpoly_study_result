<?php 
    session_start();

    require_once('../../admin/model/connect_database.php');
    require_once('../model/manage_user.php');

    // co nhieu link nen can bo vao mang
    $link_css_arr = array (
        '../../css/general.css'
    );
    $link_javascript_arr = array (
        '../../js/general_page/general.js',
        '../../js/general_page/send_general_request.js'
    );

    $all_page = (object) [
        'trang_chu' => 'trang chủ',
        'san_pham' => 'sản phẩm',
        'gio_hang' => 'giỏ hàng',
        'gioi_thieu' => 'giới thiệu'
    ];

    // kiem tra dang nhap
    if ( isset($_COOKIE['user_id']) && isset($_COOKIE['user_password']) ) {
        $user_id = $_COOKIE['user_id'];
        $user_password = $_COOKIE['user_password'];
        $user_information = getUserInformation($user_id, $user_password);
        
        if ($user_information === 'fail') {
            $all_page->dang_nhap = 'đăng nhập';
            $_SESSION['login'] = 'false';

            // xoa cookie ve nguoi dung
            setcookie('user_id', '', (time() - 3600), '/');
            unset($_COOKIE['user_id']);
            setcookie('user_password', '', (time() - 3600), '/');
            unset($_COOKIE['user_password']);

        } else {
            $all_page->tai_khoan = 'tài khoản';
            $_SESSION['login'] = 'true';
        }

    } else {
        $all_page->dang_nhap = 'đăng nhập';
        $_SESSION['login'] = 'false';
    }

    // Xac dinh cac link can co cua trang
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

    } else {
        $action = 'trang_chu';
    }

    switch ($action) {
        case 'trang_chu':
            $link_css_arr[] = '../../css/index.css';
            $link_javascript_arr[] = '../../js/index.js';
            $body_page_link = '../view/body_index.php';
            break;

        case 'san_pham':
            $link_css_arr[] = '../../css/product.css';
            $link_javascript_arr[] = '../../js/product_page/product.js';
            $link_javascript_arr[] = '../../js/product_page/send_product_request.js';
            $body_page_link = '../view/body_product.php';
            break;

        case 'san_pham_chi_tiet':
            $link_css_arr[] = '../../css/product_detail.css';
            $link_javascript_arr[] = '../../js/product_detail_page/product_detail.js';
            $link_javascript_arr[] = '../../js/product_detail_page/send_comment_request.js';
            $body_page_link = '../view/body_product_detail.php';
            break;

        case 'gio_hang':
            $link_css_arr[] = '../../css/cart.css';
            $link_javascript_arr[] = '../../js/cart.js';
            $body_page_link = '../view/body_cart.php';
            break;

        case 'gioi_thieu':
            $link_css_arr[] = '../../css/about.css';
            $link_javascript_arr[] = '../../js/about.js';
            $body_page_link = '../view/body_about.php';
            break; 

        case 'dang_nhap':
            $link_css_arr[] = '../../css/login.css';
            $link_javascript_arr[] = '../../js/login_page/change_form_status.js';
            $link_javascript_arr[] = '../../js/login_page/login.js';
            $link_javascript_arr[] = '../../js/login_page/send_login_request.js';
            $body_page_link = '../view/body_login.php';
            break;

        case 'tai_khoan':
            $link_css_arr[] = '../../css/login.css';
            $link_javascript_arr[] = '../../js/login_page/change_form_status.js';
            $link_javascript_arr[] = '../../js/login_page/account.js';
            $link_javascript_arr[] = '../../js/login_page/send_account_request.js';
            $body_page_link = '../view/body_account.php';
            break;
    }

    // Hien thi trang
    include('../view/header.php'); 
    include($body_page_link); 
    include('../view/footer.php'); 
?>