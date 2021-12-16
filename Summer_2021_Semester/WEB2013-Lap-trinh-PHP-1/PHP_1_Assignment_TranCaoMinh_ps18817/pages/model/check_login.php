<?php
    usleep(500000);
    include('../../admin/model/connect_database.php');

    $user_account = $_POST['account'];
    $user_password = md5($_POST['password']);

    $sql = "SELECT `ma_khach_hang`
            FROM `khach_hang` 
            WHERE `tai_khoan` = '$user_account'
            AND `mat_khau` = '$user_password'";

    $result = $connect_database->query($sql);

    if ($result->num_rows === 0) {
        $output = 'fail';

    } else {
        $output = 'success';

        $result = $result->fetch_assoc();
        $user_id = $result['ma_khach_hang'];

        setcookie('user_id', $user_id, time() + (3600*24*30), '/');
        setcookie('user_password', $user_password, time() + (3600*24*30), '/');
    }

    echo $output;
?>