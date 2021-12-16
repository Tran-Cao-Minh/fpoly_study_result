<?php
    include('../../admin/model/connect_database.php');

    // lay cac du lieu can thiet
    $category_list = $_GET['category_list'];
    $price_range_list = $_GET['price_range_list'];
    $order_rule = $_GET['order_rule'];
    $page_num = $_GET['page_num'];
    $page_size = $_GET['page_size'];
    $key_word = $_GET['key_word'];

    if ($page_num < 1 || $page_size < 1) {
        $page_num = 1;
        $page_size = 5;
    }
    $limit_start = ($page_num - 1) * $page_size;

    // tao cau lenh sql lay danh sach san pham
    $sql_add = 'WHERE `so_luong_con_lai` > 0 ';

    if ($key_word != '') {
        $sql_add .= "AND `ma_san_pham` 
                    IN ( SELECT `ma_san_pham`
                         FROM `san_pham`
                         WHERE `ten_san_pham` LIKE '%$key_word%' 
                       ) ";
    }

    $category_list = json_decode($category_list);
    if (count($category_list) > 0) {
        $sql_add .= "AND `ma_danh_muc` 
                    IN ( SELECT `ma_danh_muc`
                         FROM `san_pham`
                         WHERE ";

        foreach ($category_list as $category) {
            $sql_add .= "`ma_danh_muc` = '$category' OR ";
        }
        $sql_add = substr($sql_add, 0, -3);
        $sql_add .= ") ";
    }

    $price_range_list = json_decode($price_range_list);
    if (count($price_range_list) > 0) {
        $sql_add .= "AND `don_gia` 
                    IN ( SELECT `don_gia`
                         FROM `san_pham`
                         WHERE ";
        
        foreach ($price_range_list as $price_range) {
            switch ($price_range) {
                case 'duoi_50_ngan':
                    $sql_add .= "`don_gia` < 50000 OR ";
                    break;

                case 'tu_50_den_100_ngan':
                    $sql_add .= "`don_gia` BETWEEN 50000 AND 100000 OR ";
                    break;

                case 'tu_100_den_150_ngan':
                    $sql_add .= "`don_gia` BETWEEN 100000 AND 150000 OR ";
                    break;

                case 'tu_150_den_200_ngan':
                    $sql_add .= "`don_gia` BETWEEN 150000 AND 200000 OR ";
                    break;

                case 'tren_200_ngan':
                    $sql_add .= "`don_gia` > 200000 OR ";
                    break;
            }
        }
        $sql_add = substr($sql_add, 0, -3);
        $sql_add .= ") ";
    }
    
    $sql = "SELECT `ma_san_pham`, `ten_san_pham`, `ten_file_anh`, `don_gia`, `phan_tram_giam_gia`
            FROM `san_pham` " . $sql_add;

    switch ($order_rule) {
        case 'moi_nhat':
            $sql .= "ORDER BY `ngay_tao` DESC ";
            break;

        case 'noi_bat_nhat':
            $sql .= "ORDER BY `so_luot_xem` DESC ";
            break;

        case 'ban_chay_nhat':
            $sql .= "ORDER BY `so_luong_da_ban` DESC ";
            break;

        case 'gia_tang_dan':
            $sql .= "ORDER BY `don_gia` ASC ";
            break;
            
        case 'gia_giam_dan':
            $sql .= "ORDER BY `don_gia` DESC ";
            break;
    }

    $sql .= "LIMIT $limit_start, $page_size";

    $product_list = $connect_database->query($sql);

    // tra ve ket qua theo so luong san pham dem duoc
    $product_quantity_data = $connect_database->query("SELECT 
                                                COUNT(*) 
                                                FROM `san_pham` " . $sql_add);
    $product_quantity_data = $product_quantity_data->fetch_array();
    $product_quantity = $product_quantity_data[0];
    

    if ($product_quantity > 0) {
        // mo the ul
        $output = '<ul class="prod-list">';

        // them san pham con
        foreach ($product_list as $product) {
            $old_price = ($product['don_gia'] / (100 - $product['phan_tram_giam_gia']));
            $old_price = ceil($old_price) * 100;
    
            $output .= '
                <li class="prod-item" data-product_id="'.$product['ma_san_pham'].'">
                    <span class="sale-percent">
                        -'.$product['phan_tram_giam_gia'].'%
                    </span>
                    <a class="contain-img" href="./index.php?action=san_pham_chi_tiet&ma_san_pham='.$product['ma_san_pham'].'">
                        <img src="../../images/products/'.$product['ten_file_anh'].'" 
                            alt="'.$product['ten_san_pham'].'">
                    </a>
                    <span class="name">'
                        .$product['ten_san_pham'].'
                    </span>
                    <div class="price">
                        <span>'.number_format($product['don_gia'], 0, ',', '.').'</span>đ
                    </div>
                    <div class="old-price">
                        <span>'.number_format($old_price, 0, ',', '.').'</span>đ
                    </div>
                    <div class="add-to-cart">
                        THÊM VÀO&nbsp;
                        <i class="fas fa-cart-plus"></i>
                    </div>
                </li>
            ';
        }

        // them link phan chia trang
        $product_page_quantity = ceil($product_quantity / $page_size);

        if ($product_page_quantity > 1) {
            $product_page_link = '<ul class="product-page-list">';

            $offset = 2;
            $from = $page_num - $offset;
            $to = $page_num + $offset;

            if ($from < 1) {
                $from = 1;
            } 
            if ($to > $product_page_quantity) {
                $to = $product_page_quantity;
            }

            if ($page_num > 1) {
                $product_page_link .= ' <li data-page_num="1">
                                            <i class="fas fa-angle-double-left"></i>
                                        </li>';
                $product_page_link .= ' <li data-page_num="'.($page_num-1).'">
                                            <i class="fas fa-chevron-left"></i>
                                        </li>';
            }
            for($i = $from; $i <= $to; $i++) {
                if ($i != $page_num) {
                    $product_page_link .= ' <li data-page_num="'.$i.'">
                                                '.$i.'
                                            </li>';

                } else {
                    $product_page_link .= ' <li>
                                                '.$i.'
                                            </li>';
                }
            }
            if ($page_num < $product_page_quantity) {
                $product_page_link .= ' <li data-page_num="'.($page_num+1).'">
                                            <i class="fas fa-chevron-right"></i>
                                        </li>';
                $product_page_link .= ' <li data-page_num="'.$product_page_quantity.'">
                                            <i class="fas fa-angle-double-right"></i>
                                        </li>';
            }

            $output .= $product_page_link;
        }

        // dong the ul
        $output .= '</ul>';

    } else {
        $output = ' <div class="prod-list-empty">
                        <i class="fas fa-swatchbook"></i>
                        <span>
                            Không có sản phẩm thỏa điều kiện lọc của bạn <br>
                            Bạn vui lòng thay đổi điều kiện lọc nhé!
                        </span>
                    </div>';
    }
    
    // tra ve ket qua thu duoc
    echo $output;
?>