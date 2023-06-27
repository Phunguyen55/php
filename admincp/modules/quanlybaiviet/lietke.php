<?php
$sql_lietke_baiviet = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_danhmucbaiviet ORDER BY id_baiviet DESC";
$query_lietke_baiviet = mysqli_query($mysqli, $sql_lietke_baiviet);
?>

<p>Liệt kê bài viết</p>
<table style="width: 100%" border="1">
<tr>
    <th>ID</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Danh mục bài viết</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>
  </tr>
   <?php
   $i = 0;
   while ($row = mysqli_fetch_array($query_lietke_baiviet)) {
       $i++;
       ?> 
 
 <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php echo $row['noidung'] ?></td>
    <td><?php echo $row['ten_dmbv'] ?></td>
    <td><?php  if($row['tinhtrang']==1){
      echo "Kích hoạt";
    }else{
      echo "Ẩn";

    } ?></td>
    <td>
        <a onclick="return confirm('Bạn có muốn xóa không')" href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet']?>">Xóa</a> | <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a>
    </td>
</tr>
  <?php
}
  ?>
  
  </table>