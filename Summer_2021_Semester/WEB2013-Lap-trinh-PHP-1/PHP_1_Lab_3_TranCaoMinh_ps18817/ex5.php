<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: FORM LOGIN, TAO BIEN COOKIE LUU USER + PASS, TAO BIEN SESSION -->
    <!-- FILE DI KEM: check_login.php -->
    <!-- link boosttrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- code css -->
    <style>
        #wrapper {             
            width: 100%;
            padding: 1.5rem 0;
            background-color: var(--gray);
            position: relative;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <form class="border border-primary col-4 m-auto p-2"
            action="ex5.php" method="post">
            <div class="form-group">
                <label>Username</label> 
                <input name="user_name" type="text" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label> 
                <input name="password" type="password" class="form-control" required/>
            </div>
            <div class="form-group">
                <input name="remember" type="checkbox"/> Ghi nhớ
            </div>
            <div class="form-group">
                <input name="submit" type="submit" value="Đăng nhập" class="btn btn-primary"/> 
            </div>
            <div class="form-group">
                <!-- cho link ma ban muon kiem tra dang nhap vao -->
                <a href="http://localhost:8080/Lab_3_PHP_1/check_login.php">
                    <input value="Kiểm tra đăng nhập" class="btn btn-success"/> 
                </a>
            </div>
        </form>
    </div>
    <?php
        // neu da co bien thi thuc hien tinh toan
        if ( isset($_POST['submit']) ) {
            // gan gia tri cho bien
            $user_name = $_POST['user_name']; 
            $user_name = trim(strip_tags($user_name)); // cat khoang trong va cac tag khong can thiet
            $password = $_POST['password']; 
            $password = trim(strip_tags($password)); // cat khoang trong va cac tag khong can thiet
            
            // hien thi thong tin ra trang web
            echo 'Tên người dùng: ' . $user_name . '<br>'
                . 'Mật khẩu: ' . $password . '<br>';
            
            // khi bat dau trang web dat bien session de xac nhan co dang nhap dung hay khong
            session_start();
            // so sanh username va pass neu da dang nhap
            if ($user_name == 'admin' && $password == 'true password') {
                // neu dung tao bien session danh dau da login
                $_SESSION['da_login'] = true;
                // se duoc su dung tai check_login.php
            } else {
                // xoa di session neu dang nhap sai
                unset($_SESSION['da_login']);
            }

            // luu thong tin neu nguoi dung muon tu dang nhap vao lan sau
            // ma hoa password truoc khi luu
            $password = base64_encode($password);
            // tao 2 cookie luu user_name va password
            if ( isset($_POST['remember']) ) {
                // thoi han luu la 7 ngay 86400 la 1 ngay
                setcookie('username', $user_name, time() + (86400*7));
                setcookie('password', $password, time() + (86400*7));
            } else {
                // luu voi chuoi rong
                setcookie('username', '', -1);
                setcookie('password', '', -1);
            }
            
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo 'Nhập thông tin và đăng nhập nào!';
        }
    ?>
</body>
</html>