<?php
$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
<p>Sửa sản phẩm</p>
<table width="100%" border="1" style="border-collapse: collapse;">

<?php
while($dong=mysqli_fetch_array($query_sua_sp)){
?>
<form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $dong['id_sanpham'] ?>" enctype="multipart/form-data"
 <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" value="<?php echo $dong['tensanpham']?>" name="tensanpham"></td>
  </tr>
  <tr>
    <td>Mã sản phẩm</td>
    <td><input type="text" value="<?php echo $dong['masp']?>"name="masp"></td>
  </tr>

  <tr>
    <td>Giá sản phẩm</td>
    <td><input type="text" value="<?php echo $dong['giasp'] ?>"  name="giasp"></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" value="<?php echo $dong['soluong'] ?>" name="soluong"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><img src="modules/quanlysp/uploads/<?php echo $dong['hinhanh'] ?>" width="150px"></td>
    <td><input type="file" name="hinhanh"></td>
  </tr>
  <tr>
    <td>Tóm tắt</td>
    <td><textarea rows="10"   name="tomtat" style="resize: none;"><?php echo $dong['tomtat'] ?></textarea></td>
  </tr> 
  <tr>
    <td>Nội dung</td>
    <td><textarea rows="10"   name="noidung" style="resize: none;"> <?php echo $dong['noidung'] ?></textarea></td>
  </tr>
  <tr>
    <td>Danh mục sản phẩm</td>
    <td>
      <select name="danhmuc" id="">
       <?php
       $sql_danhmuc= "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
       $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
       while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
      
       ?>
       <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
      <?php 
      }else{
        
        ?>
        <option  value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
        <?php
      }
      }
      ?> 
      </select>
    </td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td>
      <select name="tinhtrang" id="">
        <?php
         if($dong['tinhtrang'==0]){
         
         
         ?>
        <option value="1" selected>Kích hoạt</option>
        <option value="0"t>Ẩn</option>
        <?php
          }else{
            
        ?>
            <option value="1" >Kích hoạt</option>
            <option value="0" selected>Ẩn</option>
  <?php
}
  ?>

        ?>
      </select>
    </td>
  </tr>
  
  
    <td colspan="2" style="text-align: center;"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
  </tr>

  <?php
  }
  ?>
  </form>
</table>