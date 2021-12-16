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

</head>

<body>
    <div class="col-6 m-auto border border-secondary px-4 py-5">
        <form action="xu_ly_dang_nhap.php" method="POST" class="border border-primary col-5 m-auto p-2">
            <div class="form-group mt-2">
                <label>Username</label> 
                <input name="account" type="text" class="form-control" />
            </div>
            <div class="form-group mt-2">
                <label>Mật khẩu</label> 
                <input name="password" type="password" class="form-control" />
            </div>
            <div class="form-group mt-2"> 
                <input name="nho" type="checkbox" /> Ghi nhớ 
            </div>
            <div class="form-group mt-2">
                <input name="btn" type="submit" value="Đăng nhập" class="btn btn-primary" />
            </div>
            <?php if ( isset($_GET['notification']) ) : ?>
                <div class="form-group mt-2"> 
                    <input type="text" class="form-control" disabled
                        value="<?php echo $_GET['notification']; ?>"/>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>