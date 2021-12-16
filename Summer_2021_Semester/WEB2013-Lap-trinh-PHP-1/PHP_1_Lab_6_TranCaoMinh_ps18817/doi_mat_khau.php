<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link boosttrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- lay ten nguoi dung tu session -->
    <?php
        if (session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['login_user'])) {
            $account = $_SESSION['login_user'];
        } else {
            header('location: login.php');
            exit();
        }
    ?>
</head>

<body>
    <div class="col-6 m-auto border border-secondary px-4 py-5">
        <form action="xu_ly_doi_mat_khau.php" method="POST" id="frmlogin" class="border border-primary col-5 m-auto p-2">
            <div class="form-group">
                <label>Username</label> 
                <input name="account" type="text" class="form-control" disabled 
                    value="<?php echo $account; ?>"/>
            </div>
            <div class="form-group">
                <label>Mật khẩu cũ</label> 
                <input name="old_password" type="password" class="form-control" />
            </div>
            <div class="form-group">
                <label>Mật khẩu mới</label> 
                <input name="new_password" type="password" class="form-control" />
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu mới</label> 
                <input name="retype_new_password" type="password" class="form-control" />
            </div>
            <div class="form-group">
                <input name="btn" type="submit" value="Cập nhật" class="btn btn-primary" />
            </div>
        </form>
    </div>
</body>

</html>