<h4 class="col-10 m-auto p-2 text-center">DANH SÁCH THỂ LOẠI</h4>
<!-- lay danh sach the loai -->
<?php
    $listTheLoai = layDanhSachTheLoai();
?>
<table class="table table-bordered">
    <tr>
        <th>Tên thể loại</th>
        <th>Thứ tự</th>
        <th>Ẩn hiện</th>
        <th>Ngôn ngữ</th>
        <th>Thực hiện</th>
    </tr>
    <!-- hien thi danh sach -->
    <?php foreach ($listTheLoai as $row ) : ?>
        <tr>
            <td> <?php echo $row['ten_tl']; ?> </td>
            <td> <?php echo $row['thu_tu']; ?> </td>
            <td> 
                <?php 
                    if ($row['an_hien'] == 1) {
                        echo 'Đang hiện';
                    }
                    else {
                        echo 'Đang ẩn';
                    }
                ?> 
            </td>
            <td> 
                <?php 
                    if ($row['lang'] == 'vi') {
                        echo 'Tiếng Việt';
                    }
                    else if ($row['lang'] == 'en') {
                        echo 'Tiếng Anh';
                    }
                ?> 
            </td>
            <td>
                <a href="./index.php?page=the_loai_sua&id_tl=<?php echo $row['id_tl']; ?>">
                    Sửa
                </a>
                <a href="./the_loai_xoa.php?id_tl=<?php echo $row['id_tl']; ?>">
                    Xóa
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
