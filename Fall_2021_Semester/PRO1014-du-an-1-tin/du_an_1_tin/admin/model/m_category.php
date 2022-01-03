<?php
  function getCategoryByIdentifyValue (
    $filter_column,
    $sort_rule,
    $filter_value_identify,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $keyword_list = preg_split('/[\s,]+/', $filter_value_identify);

    $sql = "SELECT COUNT(*)
            FROM `product_type`
            WHERE 1";
    foreach ($keyword_list as $keyword) {
      $sql .= " AND `$filter_column` LIKE '%$keyword%'";
    }
    $stmt = $conn->query($sql);
    $row_quantity = $stmt->fetchColumn();

    global $page_quantity;
    if ($row_quantity > 0) {
      $page_quantity = $row_quantity / $page_size;

    } else {
      $page_quantity = 0;
    }

    global $notification;
    if ($notification === '') {
      $notification = 'Lọc danh mục thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkType_Id':
          $notification .= 'Mã danh mục';
          break;
        case 'TypeName':
          $notification .= 'Tên danh mục';
          break;
      }
      $notification .= '</br>';

      $notification .= 'Cơ chế sắp xếp: ';
      if ($sort_rule === 'ASC') {
        $notification .= 'Tăng dần';

      } elseif ($sort_rule === 'DESC') {
        $notification .= 'Giảm dần';
      }
      $notification .= '</br>';

      $notification .= 'Tìm kiếm theo giá trị: ';
      if ($filter_value_identify !== '') {
        $notification .= $filter_value_identify;

      } else {
        $notification .= ' ~ Không có ~ ';
      }
      $notification .= '</br>';
    }

    // count row in talbe if row is 0 and row get from data is greater than 0, set SESSION page_num
    // it help avoid to show table with no row inside
    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT `PkType_Id`
            FROM `product_type`
            WHERE 1";
    foreach ($keyword_list as $keyword) {
      $sql .= " AND `$filter_column` LIKE '%$keyword%'";
    }
    $sql .= " LIMIT $limit_start, $page_size";
    $stmt = $conn->query($sql);
    $showed_row_quantity = $stmt->rowCount();
    if ($showed_row_quantity === 0 && $row_quantity > 0) {
      $page_num--;
      $_SESSION['page_num'] = $page_num;
    }
    // --------------------------------------------------------------------

    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT * 
            FROM `product_type`
            WHERE 1";
    foreach ($keyword_list as $keyword) {
      $sql .= " AND `$filter_column` LIKE '%$keyword%'";
    }
    $sql .= " ORDER BY `$filter_column` $sort_rule
              LIMIT $limit_start, $page_size";
    $stmt = $conn->query($sql);
    $data_result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $conn = null;
    return $data_result;
  }

  function getCategoryByIntervalValue (
    $filter_column,
    $sort_rule,
    $filter_value_interval_min,
    $filter_value_interval_max,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $sql = "SELECT COUNT(*)
            FROM `product_type`
            WHERE `$filter_column`";
    if ($filter_value_interval_min === '' && $filter_value_interval_max === '') {
      $sql .= " LIKE '%%'";

    } elseif ($filter_value_interval_min !== '' && $filter_value_interval_max === '') {
      $sql .= " >= '$filter_value_interval_min'";

    } elseif ($filter_value_interval_min === '' && $filter_value_interval_max !== '') {
      $sql .= " <= '$filter_value_interval_max'";
      
    } else {
      $sql .= " BETWEEN '$filter_value_interval_min' AND '$filter_value_interval_max'";
    }
   
    $stmt = $conn->query($sql);
    $row_quantity = $stmt->fetchColumn();

    global $page_quantity;
    if ($row_quantity !== 0) {
      $page_quantity = $row_quantity / $page_size;

    } else {
      $page_quantity = 0;
    }

    global $notification;
    if ($notification === '') {
      $notification = 'Lọc danh mục thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkType_Id':
          $notification .= 'Mã danh mục';
          break;
        case 'TypeName':
          $notification .= 'Tên danh mục';
          break;
      }
      $notification .= '</br>';

      $notification .= 'Cơ chế sắp xếp: ';
      if ($sort_rule === 'ASC') {
        $notification .= 'Tăng dần';

      } elseif ($sort_rule === 'DESC') {
        $notification .= 'Giảm dần';
      }
      $notification .= '</br>';

      $notification .= 'Tìm kiếm theo khoảng: </br>';
      $notification .= 'Giá trị nhỏ nhất: ';
      if ($filter_value_interval_min !== '') {
        $notification .= $filter_value_interval_min;

      } else {
        $notification .= ' ~ Không có ~ ';
      }
      $notification .= '</br>';
      $notification .= 'Giá trị lớn nhất: ';
      if ($filter_value_interval_max !== '') {
        $notification .= $filter_value_interval_max;

      } else {
        $notification .= ' ~ Không có ~ ';
      }
      $notification .= '</br>';
    }

    // count row in talbe if row is 0 and row get from data is greater than 0, set SESSION page_num
    // it help avoid to show table with no row inside
    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT `PkType_Id`
            FROM `product_type`
            WHERE `$filter_column`";
    if ($filter_value_interval_min === '' && $filter_value_interval_max === '') {
      $sql .= " LIKE '%%'";

    } elseif ($filter_value_interval_min !== '' && $filter_value_interval_max === '') {
      $sql .= " >= '$filter_value_interval_min'";

    } elseif ($filter_value_interval_min === '' && $filter_value_interval_max !== '') {
      $sql .= " <= '$filter_value_interval_max'";
      
    } else {
      $sql .= " BETWEEN '$filter_value_interval_min' AND '$filter_value_interval_max'";
    }
    $sql .= " LIMIT $limit_start, $page_size";

    $stmt = $conn->query($sql);
    $showed_row_quantity = $stmt->rowCount();
    if ($showed_row_quantity === 0 && $row_quantity > 0) {
      $page_num--;
      $_SESSION['page_num'] = $page_num;
    }
    // --------------------------------------------------------------------

    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT *
            FROM `product_type`
            WHERE `$filter_column`";
    if ($filter_value_interval_min === '' && $filter_value_interval_max === '') {
      $sql .= " LIKE '%%'";

    } elseif ($filter_value_interval_min !== '' && $filter_value_interval_max === '') {
      $sql .= " >= '$filter_value_interval_min'";

    } elseif ($filter_value_interval_min === '' && $filter_value_interval_max !== '') {
      $sql .= " <= '$filter_value_interval_max'";
      
    } else {
      $sql .= " BETWEEN '$filter_value_interval_min' AND '$filter_value_interval_max'";
    }
    $sql .= " ORDER BY `$filter_column` $sort_rule
              LIMIT $limit_start, $page_size";
    
    $stmt = $conn->query($sql);
    $data_result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $conn = null;
    return $data_result;
  }

  function deleteCategory($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT `ProductName`
            FROM `product` 
            WHERE `FkType_Id` = '$object_id' 
            LIMIT 1";
    $stmt = $conn->query($sql);
    $exist_result = $stmt->rowCount();

    // if product have this category it can not be deleted
    global $notification;
    if ($exist_result === 1) {
      $notification = 'Không thể xóa do có sản phẩm mang danh mục này tồn tại </br>';

    } else {
      $sql = "DELETE FROM `product_type` 
            WHERE `PkType_Id` = '$object_id'
            LIMIT 1";
      $delete_result = $conn->exec($sql);

      if ($delete_result === 1) {
        $notification = 'Xóa danh mục thành công </br>';

      } else {
        $notification = 'Xóa danh mục không thành công </br>';
      }
    }

    $conn = null;
  }

  function checkCategoryName($category_name) {
    $conn = connectDatabase();

    $sql = "SELECT `TypeName` 
            FROM `product_type`
            WHERE `TypeName` = '$category_name'
            LIMIT 1";
    $stmt = $conn->query($sql);
    $exist_result = $stmt->rowCount();

    $conn = null;

    if ($exist_result === 1) {
      return false;

    } else {
      return true;
    }
  }

  function insertCategory($category_name) {
    $conn = connectDatabase();

    $sql = "INSERT INTO `product_type` 
              (`TypeName`) 
            VALUES 
              ('$category_name')";
    $insert_result = $conn->exec($sql);

    global $notification;
    if ($insert_result === 1) {
      $notification = 'Thêm danh mục thành công </br>'
                    . 'Tên danh mục được thêm: '.$category_name.' </br>';

    } else {
      $notification = 'Thêm danh mục không thành công </br>';
    }

    $conn = null;
  }

  function getCategoryDataById($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `product_type` 
            WHERE `PkType_Id` = '$object_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    global $notification;
    if ($return_quantity === 0) {
      $notification = 'Không có danh mục có mã là "'.$object_id.'" </br>';
      return '';

    } else {
      return $data_result->fetch(PDO::FETCH_ASSOC);
    }
  }

  function updateCategory (
    $object_id,
    $category_name
  ) {
    $conn = connectDatabase();

    $sql = "UPDATE `product_type` 
            SET 
              `TypeName` = '$category_name' 
            WHERE `PkType_Id` = '$object_id'";
    $update_result = $conn->exec($sql);

    global $notification;
    if ($update_result === 1) {
      $notification = 'Sửa danh mục thành công </br>'
                    . 'Mã danh mục được sửa: '.$object_id.' </br>';

    } else {
      $notification = 'Sửa danh mục không thành công </br>'
                    . 'Có thể do bạn chưa thay đổi thông tin trước khi nhấn nút xác nhận sửa </br>';
    }

    $conn = null;
  }
?>