<!-- lay danh sach loai tin -->
<?php
    // chi so de phan chia trang
    $tong_so_luong_loai_tin = demLoaiTin();
    $so_luong_loai_tin_hien_thi = 3;
    $so_cua_trang = 1;
    if (isset($_GET['so_cua_trang'])) {
        $so_cua_trang = $_GET['so_cua_trang'] + 0;

        if ($so_cua_trang <= 0) {
            $so_cua_trang = 1;
        }
    }
    $listLoaiTin = layDanhSachLoaiTin($so_cua_trang, $so_luong_loai_tin_hien_thi);
?>
<h4 class="col-10 m-auto p-2 text-center">DANH SÁCH LOẠI TIN</h4>
<div class="contain-table" style="height: 14rem;">
    <table class="table table-bordered">
        <tr>
            <th>Tên</th>
            <th>Thứ tự</th>
            <th>Ẩn hiện</th>
            <th>Ngôn ngữ</th>
            <th>Trong thể loại</th>
            <th>Thực hiện</th>
        </tr>
        <?php foreach ($listLoaiTin as $row) { ?>
            <tr>
                <td> 
                    <?php echo $row['ten']; ?> 
                </td>
                <td> 
                    <?php echo $row['thu_tu']; ?> 
                </td>
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
                    <?php 
                        $ten_tl = layTenTheLoai($row['id_tl']);
                        echo $ten_tl; 
                    ?> 
                </td>
                <td>
                    <a href="./index.php?page=loai_tin_sua&id_lt=<?php echo $row['id_lt']; ?>">
                        Sửa
                    </a>
                    <a href="./loai_tin_xoa.php?id_lt=<?php echo $row['id_lt']; ?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<style>
    .phan-chia-trang {
        width: auto;
        height: auto;
        padding: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .phan-chia-trang ul.danh-sach-trang {
        display: flex;
        justify-content: center;
        align-items: center;

        width: auto;
        height: auto;
        padding: 0;
        margin: 0;

        list-style: none;
    }

    .phan-chia-trang ul.danh-sach-trang li a,
    .phan-chia-trang ul.danh-sach-trang li span {
        display: flex;
        justify-content: center;

        width: 2rem;
        height: 2rem;
        margin: 0 0.4rem;

        color: #1b1b1b;

        border: 0.2rem solid;
        border-radius: 50%;
        
        font-size: 1rem;
        font-weight: bolder;
        line-height: 1.5rem;
    }

    .phan-chia-trang ul.danh-sach-trang li a {
        text-decoration: none;
        border-color: #17a2b8;
    }

    .phan-chia-trang ul.danh-sach-trang li span {
        border-color: #333;
    }
</style>
<section class="phan-chia-trang">
    <!-- tao link phan chia trang -->
    <?php 
        // gan url goc
        $url_goc = 'index.php?page=loai_tin_ds';

        // goi ham tao link phan chia trang
        echo taoLinkPhanTrang(
            $url_goc, 
            $so_luong_loai_tin_hien_thi, 
            $so_cua_trang, 
            $tong_so_luong_loai_tin, 
            $phan_bu = 3
        );
    ?>
</section>
