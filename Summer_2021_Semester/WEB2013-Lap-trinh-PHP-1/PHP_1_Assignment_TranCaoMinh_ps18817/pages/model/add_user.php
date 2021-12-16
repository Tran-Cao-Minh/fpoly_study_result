<?php
    usleep(500000);
    include('../../admin/model/connect_database.php');

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $number_phone = $_POST['number_phone'];
    $address = $_POST['address'];
    $account = $_POST['account'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO `khach_hang` 
                (ho_ten, email, so_dien_thoai, dia_chi, tai_khoan, mat_khau) 
            VALUES 
                ('$full_name', '$email', '$number_phone', '$address', '$account', '$password')";

    if ($connect_database->query($sql) == true) {
        $output = 'success';

    } else {
        $output = 'fail';
    }

    echo $output;
?>