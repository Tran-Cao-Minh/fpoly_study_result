<?php
    require_once './ket_noi_database.php';

    // tiep nhan du lieu tu form
    $account = $_POST['account'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $favorite = '';
    foreach ($_POST['favorite'] as $value) {
        $favorite = $favorite . $value . ' |';
    };
    $job = $_POST['job'];
    $description = $_POST['description'];

    // dinh dang du lieu tiep nhan
    $account = trim(strip_tags($account));
    $password = trim(strip_tags($password));
    $retype_password = trim(strip_tags($retype_password));
    $email = trim(strip_tags($email));
    settype($sex, 'int');
    settype($job, 'int');

    // kiem tra du lieu va bao loi neu co
    $notification = '';
    if (!isset($_POST['account']) || $account == '') {
        $notification .= 'Vui lòng nhập tên truy cập<br>';

    } else {
        $sql = "SELECT `ma_khach_hang` 
                FROM `khach_hang` 
                WHERE `tai_khoan` = '$account'";
        $result = $ket_noi_database->query($sql);

        if ($result->num_rows > 0) {
            $notification .= 'Tên truy cập mà bạn nhập đã có người dùng rồi nhé<br>';
        }
    }
    if (!isset($_POST['password']) || $password == '') {
        $notification .= 'Vui lòng nhập mật khẩu bạn nhé<br>';
    }
    if ($job == 0) {
        $notification .= 'Chọn nghề đi bạn nhé<br>';
    }
    if ($sex != 0 && $sex != 1 || !isset($_POST['sex'])) {
        $notification .= 'Chọn giới tính đi nha bạn<br>';
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $notification .= 'Email không đúng định dạng bạn nhé<br>';

    } else {
        $sql = "SELECT `ma_khach_hang` 
                FROM `khach_hang` 
                WHERE `email` = '$email'";
        $result = $ket_noi_database->query($sql);

        if ($result->num_rows > 0) {
            $notification .= 'Email bạn nhập đã có người dùng rồi nhé<br>';
        }
    }
    if ($password != $retype_password) {
        $notification .= 'Mật khẩu nhập lại không đúng bạn nhé<br>';
    }
    if (strlen($favorite) == 0) {
        $notification .= 'Vui lòng chọn 1 sở thích<br>';
    }
    if (!isset($_POST['description']) || $description == '') {
        $notification .= 'Nhập mô tả bản thân bạn nhé<br>';
    }

    // kiem tra ten user hoac email co ton tai hay khong

?>
<!-- hien thong bao theo ket qua co duoc -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet">
    <div class="col-8 m-auto">
        <div class="alert alert-danger mt-5 text-center ">
            <?php 
                if ($notification != '') {
                    echo $notification;

                } else {
                    $sql = "INSERT INTO `khach_hang`
                                (tai_khoan, mat_khau, email, gioi_tinh, so_thich, nghe_nghiep, mo_ta, ngay_tao) 
                            VALUES 
                                ('$account', '$password' ,'$email', '$sex', '$favorite', '$job', '$description', NOW())";
                    if ($ket_noi_database->query($sql) == true) {
                        echo 'Đăng ký thành công';

                    } else {
                        echo 'Đăng ký không thành công' . $sql;
                    }
                }
            ?>
            <button class="btn btn-primary" onclick="history.back()">Trở lại</button>
        </div>
    </div>


