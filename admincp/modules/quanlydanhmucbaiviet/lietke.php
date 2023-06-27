<?php
$sql_lietke_danhmucbaiviet= "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
$query_lietke_danhmucbaiviet = mysqli_query($mysqli, $sql_lietke_danhmucbaiviet);
?>

<p>Liệt kê danh mục bài viết</p>
<table style="width: 100%" border="1">
<tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
   <?php
   $i = 0;
   while ($row = mysqli_fetch_array($query_lietke_danhmucbaiviet)) {
       $i++;
       ?> 
 
 <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['ten_dmbv'] ?></td>
    
    <td>
    
    <a onclick="return confirm('Bạn có muốn xóa không')" href="modules/quanlydanhmucbaiviet/xuly.php?iddanhmuc=<?php echo $row['id_danhmucbaiviet']?>">Xóa</a> | <a href="?action=quanlydanhmucbaiviet&query=sua&iddanhmuc=<?php echo $row['id_danhmucbaiviet'] ?>">Sửa</a>
    </td>
</tr>
  <?php
}
  ?>
  
  </table>

  