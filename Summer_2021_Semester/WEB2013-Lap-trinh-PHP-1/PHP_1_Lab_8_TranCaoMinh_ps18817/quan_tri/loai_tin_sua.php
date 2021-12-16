<!-- lay thong tin loai tin can sua -->
<?php
    $id_lt = $_GET['id_lt'];
    settype($id_lt, 'int');
    $loai_tin = layChiTietLoaiTin($id_lt);
?>
<!-- neu dien day du du lieu va submit thi xu ly -->
<?php
    if (isset($_POST['btn'])) {
        $ten = $_POST['ten'];
        $thu_tu = $_POST['thu_tu'];
        $an_hien = $_POST['an_hien'];
        $lang = $_POST['lang'];
        $id_tl = $_POST['id_tl'];

        $ten = trim(strip_tags($ten));
        settype($thu_tu, 'int');
        settype($an_hien, 'int');
        $lang = trim(strip_tags($lang));
        settype($id_tl, 'int');

        $kq = capNhatLoaiTin($id_lt, $ten, $thu_tu, $an_hien, $lang, $id_tl);
        if ($kq == true) {
            header('location: index.php?page=loai_tin_ds');
            exit();
        } 
        else {
            exit('Đã có lỗi xảy ra khi cập nhật loại tin');
        }
    }
?>
<h4 class="col-10 m-auto p-2 text-center">CHỈNH SỬA LOẠI TIN</h4>
<?php if ($loai_tin != false) : ?>
    <form action="" method="post" class="border border-primary col-10 m-auto p-2">
        <div class="form-group">
            <label>Tên loại tin</label> 
            <input name="ten" type="text" class="form-control" required
                value="<?php echo $loai_tin['ten']; ?>"/>
        </div>
        <div class="form-group">
            <label>Thứ tự</label> 
            <input name="thu_tu" type="number" class="form-control" required
                value="<?php echo $loai_tin['thu_tu']; ?>"/>
        </div>
        <div class="form-group">
            <label>Ẩn hiện: </label>
            <input name="an_hien" type="radio" value="0" 
                <?php 
                    if ($loai_tin['an_hien'] == '0') {
                        echo 'checked';
                    } 
                ?>
            /> Ẩn
            <input name="an_hien" type="radio" value="1" 
                <?php 
                    if ($loai_tin['an_hien'] == '1') {
                        echo 'checked';
                    } 
                ?>
            /> Hiện
        </div>
        <div class="form-group">
            <label>Ngôn ngữ: </label>
            <input name="lang" type="radio" value="vi" 
                <?php 
                    if ($loai_tin['lang'] == 'vi') {
                        echo 'checked';
                    } 
                ?>
            /> Tiếng việt
            <input name="lang" type="radio" value="en" 
                <?php 
                    if ($loai_tin['lang'] == 'en') {
                        echo 'checked';
                    } 
                ?>
            /> English
        </div>
        <div class="form-group">
            <label>Thể loại: </label>
            <select name="id_tl" class="form-control">
                <option value="0">Chọn thể loại</option>
                <!-- hien thi cac the loai qua PHP -->
                <?php $list_the_loai = layDanhSachTheLoai(); ?>
                <?php foreach ($list_the_loai as $row): ?>
                    <option 
                        <?php 
                            echo 'value="' . $row['id_tl'] . '" ';
                            if ($row['id_tl'] == $loai_tin['id_tl']) {
                                echo 'selected';
                            }
                        ?>
                    >
                        <?php echo $row['ten_tl']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input name="btn" type="submit" value="Sửa loại tin" class="btn btn-primary" />
        </div>
    </form>
<?php else: ?> 
    <form class="border border-primary col-10 m-auto p-2">
        <div class="form-group"> 
            <input disabled class="form-control"
                value="Không tồn tại loại tin này"/>
        </div>
        <div class="form-group">
            <a href="./index.php">
                <input type="button" value="Quay về trang chủ" class="btn btn-primary" />
            </a>
        </div>
    </form>
<?php endif; ?>