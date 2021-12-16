<?php
    usleep(500000);
    include('../../admin/model/connect_database.php');

    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $user_id = $_COOKIE['user_id'];

    
    $sql = "UPDATE `khach_hang`
            SET `mat_khau` = '$new_password'
            WHERE `mat_khau` = '$old_password'
            AND `ma_khach_hang` = '$user_id'";
    $connect_database->query($sql);

    if ($connect_database->affected_rows > 0) {
        $output = 'success';

        // xoa cookie ve thong tin dang nhap nguoi dung
        setcookie('user_id', 'delete', time() - 3600, '/');
        setcookie('user_password', 'delete', time() - 3600, '/');

    } else {
        $output = 'fail';
    }

    echo $output;
?>