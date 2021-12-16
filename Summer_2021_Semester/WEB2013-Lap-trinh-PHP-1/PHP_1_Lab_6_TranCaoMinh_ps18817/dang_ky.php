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
        <form action="xu_ly_dang_ky.php" method="POST">
            <h4 class="bg-secondary text-white p-2 my-0 mx-n3">ĐĂNG KÝ THÀNH VIÊN</h4>
            <div class="form-group mt-3">
                <label for="username">Tên truy cập</label>
                <input type="text" class="form-control" id="username" name="account">
            </div>
            <div class="form-group mt-3">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group mt-3">
                <label for="repass">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="repass" name="retype_password">
            </div>
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group mt-3">
                <label>Phái : </label>
                <input type="radio" name="sex" id="nam" value=1> <label for="nam">Nam</label>
                <input type="radio" name="sex" id="nu" value=0> <label for="nu">Nữ</label>
            </div>
            <div class="form-group mt-3">
                <label>Sở thích: </label>
                <input type="checkbox" name="favorite[]" id="st1" value="Lập trình"> <label for="st1"> Lập trình</label>
                <input type="checkbox" name="favorite[]" id="st2" value="Học ngoại ngữ"> <label for="st2"> Học ngoại ngữ</label>
                <input type="checkbox" name="favorite[]" id="st3" value="Đọc sách"> <label for="st2"> Đọc sách</label>
            </div>
            <div class="form-group mt-3">
                <label for="nghenghiep">Nghề nghiệp</label>
                <select class="form-control" id="nghenghiep" name="job">
                    <option value="0">Bạn làm nghề gì</option>
                    <option value="1">Sinh viên</option>
                    <option value="2">Học sinh</option>
                    <option value="3">Giáo viên</option>
                    <option value="4">Khác</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="mota">Giới thiệu bản thân</label>
                <textarea class="form-control" id="mota" name="description" rows="4"></textarea>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary py-2 px-5" value="Đăng ký">
                <input type="reset" class="btn btn-danger py-2 px-5" value="Làm lại">
            </div>
        </form>
    </div>
</body>

</html>