<p style="color: red; font-size: 25px;">Chi tiết bài viết</p>
<?php 
$sql_chitiet = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = 
tbl_danhmucbaiviet.id_danhmucbaiviet AND tbl_baiviet.id_baiviet = '$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
while($row_chitiet = mysqli_fetch_array($query_chitiet)){

?>
<div class="wrapper_chitiet">
<div class="hinhanh_sanpham">
      <img width="50%" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_chitiet['hinhanh']?>">
</div>
<div class="chitiet_sanpham">
    <h3>Tên bài viết : <?php echo $row_chitiet['tenbaiviet']?></h3>
    <p><?php echo $row_chitiet['noidung'] ?></p>
</div>
</div>

<?php
}
?>