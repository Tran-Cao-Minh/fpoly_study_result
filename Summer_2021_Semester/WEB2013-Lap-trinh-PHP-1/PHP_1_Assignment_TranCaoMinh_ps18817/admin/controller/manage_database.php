<?php
    session_start();
    require_once('../model/connect_database.php');
    require_once('../model/check_admin.php');

    // XU LY HIEN THI - THAO TAC TRANG
    include_once('../view/header.php');

    // xac nhan dang nhap
    if (
        isset($_POST['admin_account']) && 
        isset($_POST['admin_password'])
    ) {
        $admin_account = $_POST['admin_account'];
        $admin_password = $_POST['admin_password'];
        $check_admin = checkAdmin($admin_account, $admin_password);

        if ($check_admin === true) {
            $_SESSION['admin_account'] = $admin_account;
            $_SESSION['admin_password'] = $admin_password;

        } else {
            $notification = 'Bạn nhập sai tài khoản hoặc mật khẩu của quản trị viên rồi !';
        }

    } else if (
        isset($_SESSION['admin_account']) && 
        isset($_SESSION['admin_password'])
    ) {
        $admin_account = $_SESSION['admin_account'];
        $admin_password = $_SESSION['admin_password'];
        $check_admin = checkAdmin($admin_account, $admin_password);

        if (isset($_GET['log_out'])) {
            $check_admin = false;
        }

        if ($check_admin === false) {
            unset($_SESSION['admin_account']);
            unset($_SESSION['admin_password']);
        } 

    } else {
        $check_admin = false;
    }
    
    // lay du lieu can thiet
    if ($check_admin === true) {
        require_once('../model/database_interaction.php');
        require_once('../model/get_data.php');

        $admin_name = getAdminName($admin_account, $admin_password);
        include_once('../view/menu.php');

        if (isset($_GET['page'])) {
            $_SESSION['page'] = $_GET['page'];
    
        } else if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = 'quan_ly_san_pham';
        }
        $page = $_SESSION['page'];
    
        if (isset($_GET['submit'])) {
            $action = $_GET['submit'];
    
        } else if (isset($_POST['submit'])) {
            $action = $_POST['submit'];
    
        } else {
            $action = 'hien_thi_du_lieu';
        }

    } else {
        $page = 'chua_dang_nhap';
        $action = 'chua_dang_nhap';
    }

    // lay du lieu theo ten trang
    switch ($page) {
        case 'chua_dang_nhap':
            break;

        case 'quan_ly_danh_muc':
            $page_name = '<i class="fas fa-file-alt"></i>&nbsp;'
                        . 'CHỨC NĂNG QUẢN LÝ DANH MỤC';            
            $ten_bang = 'danh_muc';
            $primary_key = 'ma_danh_muc';
            break;

        case 'quan_ly_san_pham':
            $page_name = '<i class="fas fa-book"></i>&nbsp;'
                        . 'CHỨC NĂNG QUẢN LÝ SẢN PHẨM';
            $ten_bang = 'san_pham';
            $primary_key = 'ma_san_pham';
            break;
    }
 

    // xu ly cau lenh can theo hanh dong
    switch ($action) {
        case 'chua_dang_nhap':
            break;
            
        case 'hien_thi_du_lieu':
            $data_result = layDuLieu(
                $ten_bang
            );
            $show_data_table = true;
            break;

        case 'loc_du_lieu':
            $so_cot_hien_thi = $_GET['so_cot_hien_thi'];
            $cot_duoc_loc = $_GET['cot_duoc_loc'];
            $gia_tri_loc_start = $_GET['gia_tri_loc_start'];
            $gia_tri_loc_end = $_GET['gia_tri_loc_end'];
            $gia_tri_loc_xac_dinh = $_GET['gia_tri_loc_xac_dinh'];
            $sap_xep_theo_cot = $_GET['sap_xep_theo_cot'];
            $co_che_sap_xep = $_GET['co_che_sap_xep'];

            $data_result = locDuLieu(
                $ten_bang,
                $so_cot_hien_thi,
                $cot_duoc_loc,  
                $gia_tri_loc_start, 
                $gia_tri_loc_end, 
                $gia_tri_loc_xac_dinh,
                $sap_xep_theo_cot,
                $co_che_sap_xep
            );
            if ($data_result != false) {
                $show_data_table = true;
            }
            break;

        case 'xoa_du_lieu':
            $cot_can_tim_kiem = $_GET['cot_can_tim_kiem'];
            $gia_tri_can_tim = $_GET['gia_tri_can_tim'];

            xoaDuLieu(
                $ten_bang,
                $cot_can_tim_kiem, 
                $gia_tri_can_tim
            );
            
            $data_result = layDuLieu(
                $ten_bang
            );
            $show_data_table = true;
            break;
            
        case 'sua_du_lieu':
            $cot_can_tim_kiem = $_GET['cot_can_tim_kiem'];
            $gia_tri_can_tim = $_GET['gia_tri_can_tim'];
            $cot_can_sua = $_GET['cot_can_sua'];
            $gia_tri_muon_sua = $_GET['gia_tri_muon_sua'];
            
            $data_result = suaDuLieu(
                $ten_bang,
                $cot_can_tim_kiem, 
                $gia_tri_can_tim, 
                $cot_can_sua, 
                $gia_tri_muon_sua
            );
            $show_data_table = true;
            break;

        case 'den_trang_sua_doi_tuong':
            $cot_can_tim_kiem = $_GET['cot_can_tim_kiem'];
            $gia_tri_can_tim = $_GET['gia_tri_can_tim'];

            $object_data_result = layDuLieuDoiTuong (
                $ten_bang,
                $cot_can_tim_kiem, 
                $gia_tri_can_tim 
            );
            break;
 
        case 'them_danh_muc':
            $ma_danh_muc = $_GET['ma_danh_muc'];
            $ten_danh_muc = $_GET['ten_danh_muc'];

            themDanhMuc($ma_danh_muc, $ten_danh_muc);

            $data_result = layDuLieu(
                'danh_muc',
                'ma_danh_muc',  
                $ma_danh_muc
            );
            $show_data_table = true;
            break;
            

        case 'sua_danh_muc':
            $ma_danh_muc_cu = $_GET['ma_danh_muc_cu'];
            $ma_danh_muc_moi = $_GET['ma_danh_muc_moi'];
            $ten_danh_muc = $_GET['ten_danh_muc'];
            $ngay_tao = $_GET['ngay_tao'];

            $data_result = suaDanhMuc(
                $ma_danh_muc_cu,
                $ma_danh_muc_moi,
                $ten_danh_muc,
                $ngay_tao
            );
            $show_data_table = true;
            break;

        case 'them_san_pham':
            $check_img = getimagesize($_FILES['file_anh']['tmp_name']); // anh that hay gia
            $check_img_exist = file_exists('../../images/products/' . $_FILES['file_anh']['name']); // anh co ton tai hay chua
            $img_size = $_FILES['file_anh']['size']; // kich thuoc anh
            // da kiem tra loai anh tai qua input accept

            if ($check_img_exist == true) {
                $notification = 'Bạn vui lòng thay đổi tên file ảnh vì nó bị trùng lặp !';
                
            } else if ($img_size > 512000) {
                $notification = 'Kích thước file ảnh gửi phải nhỏ hơn 500KB';

            } else  if ($check_img == false) {
                $notification = 'Bạn vui lòng kiểm tra file hình ảnh được upload có chứa ảnh hay không !';

            } else {
                // su dung phuong thuc POST cho viec upload file
                $ma_danh_muc = $_POST['ma_danh_muc'];
                $ma_san_pham = $_POST['ma_san_pham'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $don_gia = $_POST['don_gia']; 
                $don_vi_tinh = $_POST['don_vi_tinh'];
                $nha_xuat_ban = $_POST['nha_xuat_ban'];
                $ten_file_anh = $_FILES['file_anh']['name'];
                $mo_ta = $_POST['mo_ta'];
                $so_luong_con_lai = $_POST['so_luong_con_lai'];
                $phan_tram_giam_gia = $_POST['phan_tram_giam_gia'];
                $file_anh = $_FILES['file_anh']['tmp_name'];

                themSanPham(
                    $ma_danh_muc,
                    $ma_san_pham,
                    $ten_san_pham,
                    $don_gia, 
                    $don_vi_tinh,
                    $nha_xuat_ban,
                    $ten_file_anh,
                    $mo_ta,
                    $so_luong_con_lai,
                    $phan_tram_giam_gia,
                    $file_anh
                );
            }
            
            $data_result = layDuLieu(
                'san_pham',
                'ma_san_pham',  
                $_POST['ma_san_pham']
            );
            $show_data_table = true;
            break;

        case 'sua_san_pham':
            $file_anh = $_FILES['file_anh']['tmp_name'];
            $ten_file_anh_moi = $_FILES['file_anh']['name'];
            $ten_file_anh_cu = $_POST['ten_file_anh_cu'];

            if ($ten_file_anh_moi != '') {
                $check_img = getimagesize($file_anh); // anh that hay gia
                if ($ten_file_anh_moi == $ten_file_anh_cu) {
                    $check_img_exist = false;

                } else {
                    $check_img_exist = file_exists('../../images/products/' . $_FILES['file_anh']['name']); // anh co ton tai hay chua
                }
                $img_size = $_FILES['file_anh']['size']; // kich thuoc anh
                // da kiem tra loai anh tai qua input accept
    
                if ($check_img_exist == true) {
                    $notification = 'Bạn vui lòng thay đổi tên file ảnh vì nó bị trùng lặp !';
                    
                } else if ($img_size > 512000) {
                    $notification = 'Kích thước file ảnh gửi phải nhỏ hơn 500KB';
    
                } else  if ($check_img == false) {
                    $notification = 'Bạn vui lòng kiểm tra file hình ảnh được upload có chứa ảnh hay không !';
    
                } else {
                    $sua_san_pham = true;
                }
            } else {
                $sua_san_pham = true;
            }

            if (isset($sua_san_pham) && $sua_san_pham == true) {
                // su dung phuong thuc POST cho viec upload file
                $ma_danh_muc = $_POST['ma_danh_muc'];
                $ma_san_pham_cu = $_POST['ma_san_pham_cu'];
                $ma_san_pham_moi = $_POST['ma_san_pham_moi'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $don_gia = $_POST['don_gia']; 
                $don_vi_tinh = $_POST['don_vi_tinh'];
                $nha_xuat_ban = $_POST['nha_xuat_ban'];
                $mo_ta = $_POST['mo_ta'];
                $ngay_tao = $_POST['ngay_tao'];
                $so_luot_xem = $_POST['so_luot_xem'];
                $so_luong_da_ban = $_POST['so_luong_da_ban'];
                $phan_tram_giam_gia = $_POST['phan_tram_giam_gia'];
                $so_luong_con_lai = $_POST['so_luong_con_lai'];
    
                $data_result = suaSanPham(
                    $ma_danh_muc,
                    $ma_san_pham_cu,
                    $ma_san_pham_moi,
                    $ten_san_pham,
                    $don_gia, 
                    $don_vi_tinh,
                    $nha_xuat_ban,
                    $ten_file_anh_cu,
                    $ten_file_anh_moi,
                    $mo_ta,
                    $file_anh,
                    $ngay_tao,
                    $so_luot_xem,
                    $so_luong_da_ban,
                    $so_luong_con_lai,
                    $phan_tram_giam_gia
                );

            } else {
                $data_result = layDuLieu(
                    'san_pham',
                    'ma_san_pham',  
                    $_POST['ma_san_pham_cu']
                );
            }
            $show_data_table = true;
            break;
    }

    // xu ly hien thi phan than trang can thiet
    if ($action == 'den_trang_sua_doi_tuong') {
        switch ($page) {
            case 'quan_ly_danh_muc':
                include_once('../view/manage_category_object.php');
                break;
                
            case 'quan_ly_san_pham':
                $ten_cac_cot = ['ma_danh_muc', 'ten_danh_muc'];
                $all_category = layDuLieuCot('danh_muc', $ten_cac_cot);

                include_once('../view/manage_product_object.php');
                break;
        }

    } else if ($action !== 'chua_dang_nhap') {
        $all_columns_name = layTenCot($ten_bang);
        include_once('../view/manage_general.php');

        switch ($page) {
            case 'quan_ly_danh_muc':
                include_once('../view/manage_category.php');
                break;

            case 'quan_ly_san_pham':
                $ten_cac_cot = ['ma_danh_muc', 'ten_danh_muc'];
                $all_category = layDuLieuCot('danh_muc', $ten_cac_cot);

                include_once('../view/manage_product.php');
                break;
        }

        $link_javascript_arr[] = '../../js/admin/manage.js';
    } 

    if ($action !== 'chua_dang_nhap') {
        include_once('../view/show_notification.php');

    } else {
        include_once('../view/login.php');
    }

    // quyet dinh co hien thi bang du lieu hay khong
    if (isset($show_data_table)) {
        include_once('../view/data_table.php');
    }
    include_once('../view/footer.php')
?>