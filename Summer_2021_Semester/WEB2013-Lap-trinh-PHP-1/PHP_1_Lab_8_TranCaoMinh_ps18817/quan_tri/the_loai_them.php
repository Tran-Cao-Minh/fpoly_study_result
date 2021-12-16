<h4 class="col-10 m-auto p-2 text-center">THÊM THỂ LOẠI</h4>
<form action="" method="post" class="border border-primary col-10 m-auto p-2">
    <div class="form-group">
        <label>Tên thể loại</label> 
        <input name="ten_tl" type="text" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Thứ tự</label> 
        <input name="thu_tu" type="number" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Ẩn hiện: </label>
        <input name="an_hien" type="radio" value="0" /> Ẩn
        <input name="an_hien" type="radio" value="1" checked /> Hiện
    </div>
    <div class="form-group">
        <label>Ngôn ngữ: </label>
        <input name="lang" type="radio" value="vi" checked /> Tiếng việt
        <input name="lang" type="radio" value="en" /> English
    </div>
    <div class="form-group">
        <input name="btn" type="submit" value="Thêm thể loại" class="btn btn-primary" />
    </div>
</form>
<!-- neu dien day du du lieu -->
<?php
    if (isset($_POST['btn'])) {
        $ten_tl = $_POST['ten_tl'];
        $thu_tu = $_POST['thu_tu'];
        $an_hien = $_POST['an_hien'];
        $lang = $_POST['lang'];

        $ten_tl = trim(strip_tags($ten_tl));
        settype($thu_tu, 'int');
        settype($an_hien, 'int');
        $lang = trim(strip_tags($lang));

        $kq = themTheLoai($ten_tl, $thu_tu, $an_hien, $lang);
        if ($kq == true) {
            header('location: index.php?page=the_loai_ds');
            exit();
        } 
        else {
            exit('Đã có lỗi xảy ra khi thêm danh mục');
        }
    }
?>