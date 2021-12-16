<?php
    usleep(500000);

    // comment chi duoc them khi nguoi dung da dang nhap
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_password'])) {
        include('../../admin/model/connect_database.php');

        // kiem tra lai co dung nguoi dung hay khong
        $user_id = $_COOKIE['user_id'];
        $user_password = $_COOKIE['user_password'];

        $sql = "SELECT COUNT(*)
                FROM `khach_hang` 
                WHERE `ma_khach_hang` = '$user_id'
                AND `mat_khau` = '$user_password'";

        $result = $connect_database->query($sql);
        $result = $result->fetch_array();
        $check_login = $result[0];

        if ($check_login == 1) {
            $comment_content = $_GET['comment_content'];
            $product_id = $_GET['product_id'];

            $sql = "INSERT INTO `binh_luan` 
                        (`noi_dung`, `ma_khach_hang`, `ma_san_pham`, `ngay_tao`) 
                    VALUES 
                        ('$comment_content', '$user_id', '$product_id', CURRENT_DATE())";
                        
            if ($connect_database->query($sql) == true) {
                $sql = "SELECT `ten_khach_hang`
                        FROM `khach_hang` 
                        WHERE `ma_khach_hang` = '$user_id'
                        AND `mat_khau` = '$user_password'";
                $result = $connect_database->query($sql);
                $result = $result->fetch_array();
                $username = $result[0];

                $ngay_tao = date('d-m-Y');

                $output = '
                    <li class="comment-item">
                        <div class="comment-information">
                            <span class="user-name">
                                '.$username.'-&nbsp;
                            </span>
                            <span class="post-date">
                                Ngày: '.$ngay_tao.'
                            </span>
                        </div>
                        <span class="content">
                            '.$comment_content.'
                        </span>
                    </li>
                ';
    
            } else {
                $output = 'fail';
            }

        } else {
            $output = 'false password or username'; 
        }

    } else {
        $output = 'not login';
    }

    echo $output;
?>