<?php
include('../../config/config.php');

$tenloaidanhmuc = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
    //them 
    $sql_them = "INSERT INTO tbl_danhmucbaiviet(ten_dmbv,thutu) VALUE('".$tenloaidanhmuc."','".$thutu."')";
    mysqli_query($mysqli, $sql_them);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
    
}elseif(isset($_POST['suadanhmuc'])){
    $sql_update = "UPDATE tbl_danhmucbaiviet SET ten_dmbv='".$tenloaidanhmuc."',thutu='".$thutu."'WHERE id_danhmucbaiviet='$_GET[iddanhmuc]'";
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');

}else{
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tbl_danhmucbaiviet Where id_danhmucbaiviet='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header("Location:../../index.php?action=quanlydanhmucbaiviet&query=them");
}
