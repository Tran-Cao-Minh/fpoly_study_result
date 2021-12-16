<?php
    require_once('./functions.php');

    $id_lt = $_GET['id_lt'];
    settype($id_lt, 'int');
    echo $id_lt;
    xoaLoaiTin($id_lt);

    header('location: index.php?page=loai_tin_ds');
?>