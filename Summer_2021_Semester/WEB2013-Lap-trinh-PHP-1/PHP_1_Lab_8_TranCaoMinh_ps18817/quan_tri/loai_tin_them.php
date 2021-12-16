<h4 class="col-10 m-auto p-2 text-center">THÊM LOẠI TIN</h4>
<form action="" method="post" class="border border-primary col-10 m-auto p-2">
    <div class="form-group">
        <label>Tên loại tin</label> 
        <input name="ten" type="text" class="form-control" />
    </div>
    <div class="form-group">
        <label>Thứ tự</label> 
        <input name="thu_tu" type="number" class="form-control" />
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
        <label>Thể loại: </label>
        <select name="id_tl" class="form-control">
            <option value="0">Chọn thể loại</option>
            <!-- hien thi cac the loai qua PHP -->
            <?php $list_the_loai = layDanhSachTheLoai(); ?>
            <?php foreach ($list_the_loai as $row): ?>
                <option value="<?php echo $row['id_tl']; ?>">
                    <?php echo $row['ten_tl']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input name="btn" type="submit" value="Thêm loại tin" class="btn btn-primary" />
    </div>
</form>
<!-- sau khi submit thi tien hanh lay du lieu va luu thong tin -->
<?php
    if (isset($_POST['btn'])) {
        $ten = $_POST['ten'];
        $thu_tu = $_POST['thu_tu'];
        $an_hien = $_POST['an_hien'];
        $lang = $_POST['lang'];
        $id_tl = $_POST['id_tl'];

        $ten = trim(strip_tags($ten));
        settype($thu_tu, "int");
        settype($an_hien, "int");
        settype($id_tl, "int");
        $lang = trim(strip_tags($lang));

        $kq = themLoaiTin($ten, $thu_tu, $an_hien, $lang, $id_tl);
        if ($kq == true) {
            header('location: index.php?page=loai_tin_ds');
            exit();
        }
    }
?>