<?php
include('../../config/config.php');

$tenbaiviet = $_POST['tenbaiviet'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$danhmuc  = $_POST['danhmuc'];
$tinhtrang = $_POST['tinhtrang'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;




//xu ly hinh anh


if (isset($_POST['thembaiviet'])) {
    //them 
    $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUE('" . $tenbaiviet . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "','" . $tinhtrang . "','" . $danhmuc . "')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    header('Location:../../index.php?action=quanlybaiviet&query=them');

} elseif (isset($_POST['suabaiviet'])) {
    // Check if a new image has been uploaded
    if (!empty($_FILES['hinhanh']['name'])) {
        // If a new image has been uploaded, update the post with the new image
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
        $sql_update = "UPDATE tbl_baiviet SET tenbaiviet='" . $tenbaiviet . "', hinhanh='" . $hinhanh . "',tomtat='" . $tomtat . "',noidung='" . $noidung . "',tinhtrang='" . $tinhtrang . "',id_danhmuc='" . $danhmuc . "' WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
    } else {
        // If no new image has been uploaded, update the post without changing the image field
        $sql_update = "UPDATE tbl_baiviet SET tenbaiviet='" . $tenbaiviet . "', tomtat='" . $tomtat . "',noidung='" . $noidung . "',tinhtrang='" . $tinhtrang . "',id_danhmuc='" . $danhmuc . "' WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
    }
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlybaiviet&query=them');

} else {
    $id = $_GET['idbaiviet'];
    $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_baiviet Where id_baiviet='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header("Location:../../index.php?action=quanlybaiviet&query=them");
}
