<?php
    require_once('./functions.php');

    $id_tl = $_GET['id_tl'];
    settype($id_tl, 'int');
    xoaTheLoai($id_tl);

    header('location: index.php?page=the_loai_ds')
?>