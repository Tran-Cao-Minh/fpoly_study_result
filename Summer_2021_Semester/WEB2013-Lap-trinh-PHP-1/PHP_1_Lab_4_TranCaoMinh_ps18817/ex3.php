<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 - Trần Cao Minh – PS18817</title>
    <!-- BAI TAP: LAY SAN PHAM THEO YEU CAU TU DATABASE VA DINH DANG -->
    <!-- FILE DI KEM: xem_san_pham.php, ket_noi_database.php -->
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
    </style>
</head>
<body>
    <div id="wrapper">
        <form class="border border-primary col-4 m-auto px-3 pb-4">
            <div class="form-group">
            <div class="form-group">
                <!-- qua trang xem san pham voi cac tham so da truyen -->
                <a href="./xem_san_pham.php?hanh_dong=xem_san_pham_moi">
                    <input value="Sản phấm mới" class="btn btn-success"/> 
                </a>
            </div>
            <div class="form-group">
                <!-- qua trang xem san pham voi cac tham so da truyen -->
                <a href="./xem_san_pham.php?hanh_dong=xem_san_pham_xem_nhieu">
                    <input value="Sản phẩm xem nhiều" class="btn btn-warning"/> 
                </a>
            </div>
            <div class="form-group">
                <!-- qua trang xem san pham voi cac tham so da truyen -->
                <a href="./xem_san_pham.php?hanh_dong=xem_san_pham_noi_bat">
                    <input value="Sản phẩm nổi bật" class="btn btn-danger"/> 
                </a>
            </div>
        </form>
    </div>
</body>
</html>