<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- xu ly login PHP -->
    <?php
        session_start();

        if (isset($_POST['btn'])) {
            // tiep nhan user, pass tu form
            $u = $_POST['u'];
            $p = $_POST['p'];
            // dinh dang lai du lieu tiep nhan
            $u = trim(strip_tags($u));
            $p = trim(strip_tags($p));
            // truy xuat db
            require_once('./functions.php');
            // kiem tra username co ton tai hay khong
            $sql = "SELECT `id_user`, `username`, `id_group` 
                    FROM `users` 
                    WHERE `username` = '{$u}'";
            $kq = $conn->query($sql);

            if ($kq->rowCount() == 0) {
                $_SESSION['thong_bao'] = 'Username không tồn tại';
                header('location: login.php');
                exit();
            }
            // kiem tra pass co dung hay khong
            $sql = "SELECT `id_user`, `username`, `id_group` 
                    FROM `users` 
                    WHERE `username` = '{$u}'
                    AND `pass` = '{$p}'";
            $kq = $conn->query($sql);

            if ($kq->rowCount() == 0) {
                $_SESSION['thong_bao'] = 'Mật khẩu không đúng';
                header('location: login.php');
                exit();
            }
            // thanh cong thi tao bien luu du lieu theo SESSION nhan biet da login loai gi
            $row_user = $kq->fetch();
            $_SESSION['login_id'] = $row_user['id_user'];
            $_SESSION['login_group'] = $row_user['id_group'];
            // chuyen den trang chu hoac trang duoc luu neu co
            if (isset($_SESSION['back_page_link'])) {
                $back_page_link = $_SESSION['back_page_link'];
                header('location: ' . $back_page_link);

            } else {
                header('location: index.php?page=loai_tin_ds');
            }
        }
    ?>
</head>

<body>
    <form action="" method="post" class="border border-primary col-5 m-auto p-2">
        <div class="form-group">
            <label>Username</label> 
            <input name="u" type="text" class="form-control" />
        </div>
        <div class="form-group">
            <label>Mật khẩu</label> 
            <input name="p" type="text" class="form-control" />
        </div>
        <div class="form-group"> 
            <input name="nho" type="checkbox" /> Ghi nhớ 
        </div>
        <div class="form-group">
            <input name="btn" type="submit" value="Đăng nhập" class="btn btn-primary" />
        </div>
        <div class="form-group"> 
            <input disabled class="form-control"
                <?php
                    // thong bao tinh trang dang nhap
                    if (isset($_SESSION['thong_bao'])) {
                        echo 'value="' . $_SESSION['thong_bao'] . '"';
                    }
                ?>
            >
        </div>
    </form>
</body>

</html>