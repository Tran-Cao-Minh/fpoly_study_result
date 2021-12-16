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
        <form action="./xu_ly_quen_mat_khau.php" method="POST" class="col-5 m-auto bg-secondary p-2 text-white">
            <div class="form-group">
                <h4 class="border-bottom pb-2">QUÊN MẬT KHẨU</h4>
                <label for="email">Nhập email</label>
                <input class="form-control" name="email" type="email">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Gửi yêu cầu</button>
            </div>
        </form>
    </div>
</body>

</html>