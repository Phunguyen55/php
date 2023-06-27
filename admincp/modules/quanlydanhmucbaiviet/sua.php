<?php
$sql_sua_danhmucbaiviet = "SELECT * FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet='$_GET[iddanhmuc]' LIMIT 1";
$query_sua_danhmucbaiviet = mysqli_query($mysqli,$sql_sua_danhmucbaiviet);
?>

<p>Sửa danh mục bài viết</p>
<table width="50%" border="1" style="border-collapse: collapse;">
<form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
 <?php
 while($dong = mysqli_fetch_array($query_sua_danhmucbaiviet)){

 
 ?>

<tr>
    <td>Tên danh mục bài viết</td>
    <td><input type="text" value="<?php echo $dong['ten_dmbv'] ?>" name="tendanhmuc"></td>
  </tr>
    
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
</tr>
  
    <td colspan="2" style="text-align: center;"><input type="submit" name="suadanhmuc" value="Sửa danh mục bài viết"></td>
  </tr>
  <?php
 }
  ?>
  </form>
</table>