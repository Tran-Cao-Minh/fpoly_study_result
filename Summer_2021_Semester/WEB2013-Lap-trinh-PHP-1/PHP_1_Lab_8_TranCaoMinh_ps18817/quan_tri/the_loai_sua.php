<!-- lay thong tin the loai can sua -->
<?php
    $id_tl = $_GET['id_tl'];
    settype($id_tl, 'int');
    $the_loai = layChiTietTheLoai($id_tl);
?>
<h4 class="col-10 m-auto p-2 text-center">CHỈNH SỬA THỂ LOẠI</h4>
<?php if ($the_loai != false) : ?>
    <form action="" method="post" class="border border-primary col-10 m-auto p-2">
        <div class="form-group">
            <label>Tên thể loại</label> 
            <input name="ten_tl" type="text" class="form-control" required
                value="<?php echo $the_loai['ten_tl']; ?>"/>
        </div>
        <div class="form-group">
            <label>Thứ tự</label> 
            <input name="thu_tu" type="number" class="form-control" required
                value="<?php echo $the_loai['thu_tu']; ?>"/>
        </div>
        <div class="form-group">
            <label>Ẩn hiện: </label>
            <input name="an_hien" type="radio" value="0" 
                <?php 
                    if ($the_loai['an_hien'] == '0') {
                        echo 'checked';
                    } 
                ?>
            /> Ẩn
            <input name="an_hien" type="radio" value="1" 
                <?php 
                    if ($the_loai['an_hien'] == '1') {
                        echo 'checked';
                    } 
                ?>
            /> Hiện
        </div>
        <div class="form-group">
            <label>Ngôn ngữ: </label>
            <input name="lang" type="radio" value="vi" 
                <?php 
                    if ($the_loai['lang'] == 'vi') {
                        echo 'checked';
                    } 
                ?>
            /> Tiếng việt
            <input name="lang" type="radio" value="en" 
                <?php 
                    if ($the_loai['lang'] == 'en') {
                        echo 'checked';
                    } 
                ?>
            /> English
        </div>
        <div class="form-group">
            <input name="btn" type="submit" value="Sửa thể loại" class="btn btn-primary" />
        </div>
    </form>
<?php else: ?> 
    <form class="border border-primary col-10 m-auto p-2">
        <div class="form-group"> 
            <input disabled class="form-control"
                value="Không tồn tại thể loại này"/>
        </div>
        <div class="form-group">
            <a href="./index.php">
                <input type="button" value="Quay về trang chủ" class="btn btn-primary" />
            </a>
        </div>
    </form>
<?php endif; ?>
<!-- neu dien day du du lieu va submit thi xu ly -->
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

        $kq = capNhatTheLoai($id_tl, $ten_tl, $thu_tu, $an_hien, $lang);
        if ($kq == true) {
            header('location: index.php?page=the_loai_ds');
            exit();
        } 
        else {
            exit('Đã có lỗi xảy ra khi cập nhật danh mục');
        }
    }
?>