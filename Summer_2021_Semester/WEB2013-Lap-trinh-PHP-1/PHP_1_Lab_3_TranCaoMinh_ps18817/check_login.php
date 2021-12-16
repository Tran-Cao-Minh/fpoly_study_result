<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: FORM LOGIN, TAO BIEN COOKIE LUU USER + PASS, TAO BIEN SESSION -->
    <!-- FILE DI KEM: ex5.php -->
</head>
<body>
    <?php
        // tiep noi phien lam viec truoc lay bien session
        session_start();
        // kiem tra da login chua va thong bao
        if (isset($_SESSION['da_login']) && $_SESSION['da_login'] == true) {
            echo '<h1>Bạn đã login</h1>';
        } else {
            echo '<h1>Bạn chưa login</h1>';
        }
    ?>
</body>
</html>