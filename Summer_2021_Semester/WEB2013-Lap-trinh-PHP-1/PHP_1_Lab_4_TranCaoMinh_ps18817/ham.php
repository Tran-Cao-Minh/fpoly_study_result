<?php 
    // ham hien thoi diem hien tai bang tieng Viet
    function hien_thoi_diem_hien_tai() {
        // cac thong tin co the lay duoc tu ham cho ra tieng anh
        $tieng_anh = array (
            'Mon','Tue','Wed','Thu','Fri','Sat','Sun',
            'am','pm',':'
        );
        // mang nay giup chuyen thong tin sang tieng Viet
        $tieng_viet = array (
            'Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy', 'Chủ nhật', 
            'phút, sáng', 'phút, chiều', ' giờ '
        );

        // lay thoi diem hien tai
        $thoi_diem_hien_tai = 
            gmdate('D, d/m/Y - g:i a', (time() + 7*60*60) ); 
        // cong them 7 tieng do lech mui gio

        // chuyen thoi diem hien tai sang tieng Viet
        $thoi_diem_hien_tai =
            str_replace($tieng_anh, $tieng_viet, $thoi_diem_hien_tai);
        // tra ve chuoi thoi diem hien tai
        return $thoi_diem_hien_tai;
    }

    // ham cat dau tieng Viet cua chuoi ky tu duoc truyen vao
    function cat_dau_tieng_viet($chuoi_ky_tu) {
        // neu khong co chuoi ky tu tra ve false
        if (!$chuoi_ky_tu) {
            return false;
        }

        // tao bo ma ky tu tu chu khong dau suy ra chu co dau
        $bo_ma_ky_tu = array (
            // nhung chu co 2 dau phai dat len truoc tranh loi
            'a'=>'ắ|ằ|ẳ|ẵ|ặ|ấ|ầ|ẩ|ẫ|ậ|á|à|ả|ã|ạ|ă|â',
            'A'=>'Ắ|Ằ|Ẳ|Ẵ|Ặ|Ấ|Ầ|Ẩ|Ẫ|Ậ|Á|À|Ả|Ã|Ạ|Ă|Â',
            'd'=>'đ', 
            'D'=>'Đ',
            'e'=>'ế|ề|ể|ễ|ệ|é|è|ẻ|ẽ|ẹ|ê',
            'E'=>'Ế|Ề|Ể|Ễ|Ệ|É|È|Ẻ|Ẽ|Ẹ|Ê',
            'i'=>'í|ì|ỉ|ĩ|ị', 
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ố|ồ|ổ|ỗ|ộ|ớ|ờ|ở|ỡ|ợ|ó|ò|ỏ|õ|ọ|ô|ơ',
            'O'=>'Ố|Ồ|Ổ|Ỗ|Ộ|Ớ|Ờ|Ở|Ỡ|Ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ơ',
            'u'=>'ứ|ừ|ử|ữ|ự|ú|ù|ủ|ũ|ụ|ư',
            'U'=>'Ứ|Ừ|Ử|Ữ|Ự|Ú|Ù|Ủ|Ũ|Ụ|Ư',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );

        // lay mang chu co dau tuong ung chu khong dau tu bo_ma_ky_tu
        foreach ($bo_ma_ky_tu as $chu_khong_dau => $chuoi_chu_co_dau) {
            // chuyen cac chu co dau trong chuoi duoc truyen vao 
            // thanh chu khong dau tuong ung
            $chuoi_ky_tu = preg_replace("/$chuoi_chu_co_dau/i", $chu_khong_dau, $chuoi_ky_tu);
        }

        // tra ve chuoi_ky_tu co duoc sau khi xu ly
        return $chuoi_ky_tu;
    }

    // ham tao ra url than thien tu chuoi duoc truyen vao
    function tao_url_than_thien($chuoi_ky_tu) {
        // neu khong co chuoi ky tu tra ve false
        if (!$chuoi_ky_tu) {
            return false;
        }
        // cat dau chuoi ky tu
        $chuoi_ky_tu = cat_dau_tieng_viet($chuoi_ky_tu);

        // xoa bo cac ky tu dac biet trong chuoi
        $chuoi_ky_tu = preg_replace("/%|&|!|#|@|\*|\\$|\?|\|/i", '', $chuoi_ky_tu);

        // thay the tat ca dau khoang trang bang dau gach noi -
        $chuoi_ky_tu = preg_replace("/\s+/i", '-', $chuoi_ky_tu);

        // cat bo dau gach duoi o dau va cuoi dau neu co
        $chuoi_ky_tu = trim($chuoi_ky_tu, '-');

        // tra ve chuoi_ky_tu co duoc sau khi xu ly
        return $chuoi_ky_tu;
    }

    // ham tinh tuoi tu tham so ngay sinh co dang dd/mm/yyyy
    function tinh_tuoi($ngay_sinh) {
        // tao mang ngay sinh
        $mang_ngay_sinh = explode('/', $ngay_sinh);
        // lay cac bien can thiet tu mang ngay sinh
        $ngay_sinh = $mang_ngay_sinh[0];
        $thang_sinh = $mang_ngay_sinh[1];
        $nam_sinh = $mang_ngay_sinh[2];
        
        // lay thong tin ngay thang hien tai qua ham getdate()
        $hien_tai = getdate();
        $ngay_hien_tai = $hien_tai['mday'];
        $thang_hien_tai = $hien_tai['mon'];
        $nam_hien_tai = $hien_tai['year'];

        // neu nam nhap lon hon hoac bang nam hien tai thi thong bao
        if ($nam_sinh >= $nam_hien_tai) {
            return 'Bạn vui lòng nhập ngày tháng năm sinh nhỏ hơn thời điểm hiện tại~';
        } 

        // tien hanh tinh tuoi khi nam_sinh thoa man
        $tuoi = $nam_hien_tai - $nam_sinh;

        // xet xem co can giam tuoi xuong khong
        if ($thang_sinh > $thang_hien_tai) {
            // thang sinh lon hon thang hien tai
            $tuoi--; 
        } else if (($thang_hien_tai - $thang_sinh) == 0) {
            // neu thang sinh bang thang hien tai thi xet ngay sinh
            if ($ngay_sinh > $ngay_hien_tai) {
                // ngay sinh lon hon ngay hien tai
                $tuoi--;
            }
        }

        // tra ve tuoi sau khi xu ly
        return $tuoi . ' tuổi';
    }
?>