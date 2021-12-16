<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: FORM DANG KY THANH VIEN, HIEN THI THONG TIN SAU KHI DANG KY -->
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
        .form-group {
            margin-top: 1rem;
        }
        .heading {
            font-weight: bold;
            color: #0d6efd;
        }
        h4 {
            padding: 2rem 0 0;
            text-align: center;
        }
    </style>
    <!-- code php -->
    <?php
        // neu da co bien thi thuc hien xu ly
        if ( isset($_POST['submit']) ) {
            // gan gia tri cho bien
            // cac gia tri da kiem tra tai form truoc khi submit
            $user_name = $_POST['user_name']; 
            $user_name = trim(strip_tags($user_name)); // cat khoang trong va cac tag khong can thiet
            $password = $_POST['password']; 
            $password = trim(strip_tags($password)); // cat khoang trong va cac tag khong can thiet
            $nhap_lai_password = $_POST['nhap_lai_password']; 
            $nhap_lai_password = trim(strip_tags($nhap_lai_password)); // cat khoang trong va cac tag khong can thiet
            $email = $_POST['email']; 
            $email = trim(strip_tags($email)); // cat khoang trong va cac tag khong can thiet
            $gioi_tinh = $_POST['gioi_tinh']; 
            $link_anh = $_POST['hinh_anh']; 
            $nghe_nghiep = $_POST['nghe_nghiep']; 
            $gioi_thieu = $_POST['gioi_thieu']; 
            // tam gan bien kiem tra dang ky la true
            $da_dang_ky = true;

            // kiem tra cac gia tri chua kiem tra duoc trong form
            // kiem tra nhap lai mat khau
            if ($password != $nhap_lai_password) {
                // thong bao loi va huy dang ky
                echo('<h4>*** Vui lòng nhập lại đúng mật khẩu! </h4>');
                $da_dang_ky = false;
            }
            // kiem tra checkbox so thich
            if (
                isset($_POST['so_thich_1']) ||
                isset($_POST['so_thich_2']) ||
                isset($_POST['so_thich_3']) 
            ) {
                // neu da chon mot trong ba cai xac dinh so thich duoc chon
                // tao mang so thich
                $mang_so_thich = array();
                // them phan tu duoc chon vao cuoi mang
                if (isset($_POST['so_thich_1'])) {
                    $mang_so_thich[] = $_POST['so_thich_1'];
                }
                if (isset($_POST['so_thich_2'])) {
                    $mang_so_thich[] = $_POST['so_thich_2'];
                }
                if (isset($_POST['so_thich_3'])) {
                    $mang_so_thich[] = $_POST['so_thich_3'];
                }
            } else {
                // thong bao loi va huy dang ky
                echo('<h4>*** Vui lòng chọn ít nhất một sở thích! </h4>');
                $da_dang_ky = false;
            }
            // kiem tra lai dinh dang file da nop co dung la file hinh anh khong
            // lay duoi file
            $duoi_file = pathinfo($link_anh, PATHINFO_EXTENSION);
            // nhung loai file hinh anh duoc phep upload
            $duoc_upload = array ('jpg', 'png');
            // kiem tra kieu file
            if (!in_array($duoi_file, $duoc_upload ))
            {
                // thong bao loi va huy dang ky
                echo "<h4>*** Chỉ được upload các định dạng JPG, PNG</h4>";
                $da_dang_ky = false;
            }
        } else {
            // neu chua co thi yeu cau nguoi dung nhap qua lenh echo
            echo '<h4>*** Nhập thông tin và đăng nhập nào!</h4>';
        }
    ?>
</head>
<body>
    <div id="wrapper">
        <!-- neu da dang ky thi hien thi thong tin -->
        <?php if ( isset($_POST['submit']) && $da_dang_ky == true ) : ?>
            <!-- thong tin duoc hien thi -->
            <form class="border border-primary col-5 m-auto p-3">
                <div class="heading">
                    <h3>
                        THÔNG TIN ĐĂNG KÝ
                    </h3>
                </div>
                <div class="form-group">
                    <label>Username</label> 
                    <input value="<?php echo $user_name; ?>" disabled class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label> 
                    <input value="<?php echo $password; ?>" disabled class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Email</label> 
                    <input value="<?php echo $email; ?>" disabled class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Phái</label> 
                    <input value="<?php echo $gioi_tinh; ?>" disabled class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Sở thích</label> 
                    <!-- hien thong tin so thich qua foreach -->
                    <?php foreach ($mang_so_thich as $so_thich) : ?>
                        <input value="<?php echo $so_thich; ?>" disabled class="form-control"/>
                    <?php endforeach; ?>
                    <!-- ket thuc vong lap -->
                </div>
                <div class="form-group">
                    <label>Nghề nghiệp</label> 
                    <input value="<?php echo $nghe_nghiep; ?>" disabled class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Giới thiệu bản thân</label> 
                    <textarea disabled class="form-control"><?php echo $gioi_thieu; ?></textarea>
                </div>
                <div class="form-group">
                    <label>File ảnh đã gửi</label> 
                    <input value="<?php echo $link_anh; ?>" disabled class="form-control"/>
                </div>
            </form>

        <!-- neu chua dang ky thi hien thi form dang ky -->
        <?php else : ?>
            <form class="border border-primary col-5 m-auto p-3"
                action="ex6.php" method="post">
                <div class="heading">
                    <h3>
                        ĐĂNG KÝ THÀNH VIÊN
                    </h3>
                </div>
                <div class="form-group">
                    <label>Username</label> 
                    <input name="user_name" type="text" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label> 
                    <input name="password" type="password" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label> 
                    <input name="nhap_lai_password" type="password" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Email</label> 
                    <input name="email" type="email" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Phái:</label> 
                    <input name="gioi_tinh" type="radio" id="nam" value="Nam" checked/>
                    <label for="nam">Nam</label> 
                    <input name="gioi_tinh" type="radio" id="nu" value="Nữ"/>
                    <label for="nu">Nữ</label> 
                </div>
                <div class="form-group">
                    <label>Sở thích:</label> 
                    <input name="so_thich_1" type="checkbox" id="so_thich_1" value="Đọc sách"/>
                    <label for="so_thich_1">Đọc sách</label> 
                    <input name="so_thich_2" type="checkbox" id="so_thich_2" value="Lập trình"/>
                    <label for="so_thich_2">Lập trình</label> 
                    <input name="so_thich_3" type="checkbox" id="so_thich_3" value="Học ngoại ngữ"/>
                    <label for="so_thich_3">Học ngoại ngữ</label> 
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label> 
                    <input name="hinh_anh" type="file" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Nghề nghiệp</label> 
                    <select name="nghe_nghiep" class="form-select" required>
                        <option value="">Bạn làm nghề gì</option>
                        <option value="Lập trình Web">Lập trình Web</option>
                        <option value="Lập trình Di động">Lập trình Di động</option>
                        <option value="Lập trình Ứng dụng">Lập trình Ứng dụng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Giới thiệu bản thân</label> 
                    <textarea name="gioi_thieu" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <input name="submit" type="submit" value="Đăng nhập" class="btn btn-primary"/> 
                </div>
            </form>
        <?php endif; ?>
        <!-- ket thuc lenh else if -->
    </div>
    
</body>
</html>