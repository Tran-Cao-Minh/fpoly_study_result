<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: SU DUNG VONG LAP DE HIEN THI DANH SACH SAN PHAM -->
    <style>
        html {
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
        }
        .prod-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;

            list-style-type: none;

            max-width: 1024px;
            height: auto;
            margin: auto;
            padding: 15px 0;

            background: #f4f4f4;
        }
        .prod-item {
            display: flex;
            flex-wrap: wrap;

            width: 192px;
            height: auto;
            padding: 10px;
            margin: 5px 0;

            border-radius: 5px;

            box-shadow: 0 0 2px #000;

            background-color: white;
        }
        .contain-img{
            width: 100%;
            height: 150px;

            background-color: #f4f4f4;

            border-radius: 5px;

            text-align: center;
        }
        .contain-img img {
            width: auto;
            height: 150px;

            border-radius: 5px;
        }
        .name {
            width: 100%;
            height: 25px;
            margin: 10px 0;

            font-size: 16px;
            text-align: center;
            line-height: 25px;
        }
        .price {
            width: 50%;
            height: 25px;

            color: #ff3333;

            font-size: 16px;
            font-weight: bold;
            text-align: left;
            line-height: 25px;
        }
        .old-price {
            width: 50%;

            color: #888;

            font-size: 14px;
            text-align: right;
            line-height: 25px;
        }
    </style>
</head>
<body>
    <ul class="prod-list">
        <!-- hien thi san pham qua vong lap php -->
        <!-- mo vong lap php -->
        <?php for ($i = 0; $i < 8; $i++) : ?>
            <li class="prod-item">
                <div class="contain-img">
                    <img src="./images/tinhhoatrituedothai.png" alt="">
                </div>
                <div class="name">
                    <span>
                        Tinh Hoa Trí Tuệ Do Thái
                    </span>
                </div>
                <div class="price">
                    <span>
                        93.120đ
                    </span>
                </div>
                <div class="old-price">
                    <span>
                        96.000đ
                    </span>
                </div>
            </li>
        <?php endfor; ?>
        <!-- dong vong lap php -->
    </ul>
</body>
</html>