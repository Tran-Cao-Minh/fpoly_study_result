<?php 
    // lay du lieu tu form
    $account = $_POST['account'];
    $password = $_POST['password']; 

    // dinh dang du lieu tiep nhan
    $account = trim(strip_tags($account));
    $password = trim(strip_tags($password));

    // ket noi co so du lieu
    require_once ('./ket_noi_database.php');

    // xu ly dang nhap
    $sql = "SELECT `ma_khach_hang`, `tai_khoan`
            FROM `khach_hang`
            WHERE `tai_khoan` = '$account'
            AND `mat_khau` = '$password'";

    $result = $ket_noi_database->query($sql);

    if ($result->num_rows > 0) {
        $user_information = $result->fetch_assoc();	
        	
        if (session_id() == '') {
            session_start();
        }
        $_SESSION['login_id'] = $user_information['ma_khach_hang'];
        $_SESSION['login_user'] = $user_information['tai_khoan'];

        header('location: dang_nhap.php?notification=Đăng nhập thành công');

    } else {
        header('location: dang_nhap.php?notification=Đăng nhập thất bại');
    }

?>