<?php
    require_once('./ket_noi_database.php');
    if (session_id() == '') {
        session_start();
    }

    // tiep nhan du lieu tu form
    $account = $_SESSION['login_user'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $retype_new_password = $_POST['retype_new_password'];

    // dinh dang du lieu tiep nhan
    $old_password = trim(strip_tags($old_password));
    $new_password = trim(strip_tags($new_password));
    $retype_new_password = trim(strip_tags($retype_new_password));

    // kiem tra du lieu va bao loi neu co
    $notification = '';
    if (strlen($new_password) < 6) {
        $notification .= 'Mật khẩu mới quá ngắn <br>';
    } 
    if ($retype_new_password != $new_password) {
        $notification .= 'Nhập lại mật khẩu mới không đúng <br>';
    }

    $sql = "SELECT `mat_khau`
    FROM `khach_hang`
    WHERE `tai_khoan` = '$account'
    AND `mat_khau` = '$old_password'";

    $result = $ket_noi_database->query($sql);

    if ($result->num_rows == 0) {
        $notification .= 'Mật khẩu cũ bạn nhập không chính xác <br>';
    }
?>
<!-- hien thong bao theo ket qua co duoc -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet">
    <div class="col-8 m-auto">
        <div class="alert alert-danger mt-5 text-center ">
            <?php 
                if ($notification != '') {
                    echo $notification;

                } else {
                    // cap nhat mat khau moi khi thoa dieu kien
                    $sql = "UPDATE `khach_hang`
                            SET `mat_khau` = '$new_password'
                            WHERE `tai_khoan` = '$account'";
                    $result = $ket_noi_database->query($sql);
                    
                    if ($result == 1) {
                        $notification .= 'Cập nhật mật khẩu thành công';

                    } else {
                        $notification .= 'Cập nhật mật khẩu không thành công';
                    }

                    echo $notification;
                }
            ?>
            <button class="btn btn-primary" onclick="history.back()">Trở lại</button>
        </div>
    </div>