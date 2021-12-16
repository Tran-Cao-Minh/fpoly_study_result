<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link boosttrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet"> 
    <?php
        // code tiep nhan email va kiem tra
        $notification = '';

        $email = $_POST['email'];
        $email = trim(strip_tags($email));

        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $notification .= 'Email không đúng định dạng <br>';
        }

        // kiem tra email co phai thanh vien khong
        require_once('./ket_noi_database.php');

        $sql = "SELECT `email`
                FROM `khach_hang`
                WHERE `email` = '$email'";

        $result = $ket_noi_database->query($sql);

        if ($result->num_rows == 0) {
            $notification .= 'Email bạn nhập chưa được đăng ký <br>';
        }

        // xu ly gui mail khi khong co loi
        if ($notification == '') {
            // tao mat khau ngau nhien cap nhat vao co so du lieu
            $new_password = md5(random_int(0, 9999));
            $new_password = substr($new_password, 0, 8);

            // cap nhat mat khau moi khi thoa dieu kien
            $sql = "UPDATE `khach_hang`
                    SET `mat_khau` = '$new_password'
                    WHERE `email` = '$email'";
            $result = $ket_noi_database->query($sql);
            
            if ($result == 1) {
                $notification .= 'Cập nhật mật khẩu thành công, kiểm tra email để lấy mật khẩu nhé<br>';
                sendNewPasswordMail();

            } else {
                $notification .= 'Cập nhật mật khẩu không thành công';
            }
        }

        // chuc nang gui mail neu thanh cong
        function sendNewPasswordMail() {
            global $notification, $email, $new_password;

            require_once "./PHPMailer-master/src/PHPMailer.php";
            require_once "./PHPMailer-master/src/Exception.php";
            require_once "./PHPMailer-master/src/OAuth.php";    
            require_once "./PHPMailer-master/src/SMTP.php";

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);     
            try {        
                $mail->SMTPDebug = 2;   //chế độ full debug, khi mọi thứ ok thì chỉnh lại 0
                $mail->isSMTP();       // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Server gửi thư
                $mail->SMTPAuth = true;
                $mail->Username = 'minhtcps18817@fpt.edu.vn';  // ví dụ: abc@gmail.com
                $mail->Password = '0937232138aA';
                $mail->SMTPSecure = 'ssl'; //TLS hoặc `ssl` 
                $mail->Port = 465;    // 587 hoặc 465
                $mail -> CharSet = "UTF-8"; 
                $mail->smtpConnect([ "ssl" => [
                        "verify_peer"=>false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                        ]
                    ]
                );        
                //Khai báo người gửi và người nhận mail        
                $mail->setFrom('minhtcps18817@fpt.edu.vn', 'Ban quản trị website Trần Cao Minh');
                $mail->addAddress("{$email}", 'Khách hàng'); 
                $mail->isHTML(true);  // nội dung của email có mã HTML
                $mail->Subject = 'Cấp lại mật khẩu mới từ Trần Cao Minh PS-18817 Lab-6 PHP-1';
                $mail->Body = "Đây là mật khẩu mới của bạn <b> {$new_password} </b>";
                $mail->send();

                $notification .= "Đã gửi mail thành công<br>";
            } catch (Exception $error) {
                    $notification .= "Lỗi khi gửi thư: " . $mail->ErrorInfo;
            }
        }
    ?>
</head>
<!-- hien thong bao theo ket qua co duoc -->
<body style="color: transparent; line-height: 0;">
    <div class="col-8 m-auto" style="line-height: 25px;">
        <div class="alert alert-danger mt-5 text-center">
            <?php 
                echo $notification;
            ?>
            <button class="btn btn-primary" onclick="history.back()">Trở lại</button>
        </div>
    </div>
</body>

</html>