<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lab 1 - Trần Cao Minh – PS18817 - Bai 2</title>
    </head>
    <body>
        <?php
            // tra ve mot so thong tin cua web cao dang FPT
            // lay url
            $url = 'https://caodang.fpt.edu.vn/nganh-hoc/thiet-ke-website';
            // chuyen doi url vua lay ve dung dinh dang
            $url = parse_url($url);
            // hien thi thong tin qua lenh echo
            echo '<b>Scheme: </b>' . $url['scheme'] . '<br>';
            echo '<b>Host: </b>' . $url['host'] . '<br>';
            echo '<b>Path: </b>' . $url['path'] . '<br>';
        ?>
    </body>
</html>
