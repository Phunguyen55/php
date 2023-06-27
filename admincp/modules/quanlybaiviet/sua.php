<?php
$sql_sua_baiviet = "SELECT * FROM tbl_baiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
$query_sua_baiviet = mysqli_query($mysqli,$sql_sua_baiviet);
?>
<p>Sửa bài viết</p>
<table width="100%" border="1" style="border-collapse: collapse;">

<?php
while($dong=mysqli_fetch_array($query_sua_baiviet)){
?>
<form method="POST" action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $dong['id_baiviet'] ?>" enctype="multipart/form-data"
  <tr>
    <td>Tên bài viết</td>
    <td><input type="text" value="<?php echo $dong['tenbaiviet']?>" name="tenbaiviet"></td>
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
    <td>Hình ảnh</td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $dong['hinhanh'] ?>" width="150px"></td>
    <td><input type="file" name="hinhanh"></td>
  </tr>
  
  <tr>
    <td>Danh mục bài viết</td>
    <td>
      <select name="danhmuc" id="">
       <?php
       $sql_danhmuc= "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
       $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
       while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            if($row_danhmuc['id_danhmucbaiviet']==$row['id_danhmucbaiviet']){
      
       ?>
       <option selected value="<?php echo $row_danhmuc['id_danhmucbaiviet']?>"><?php echo $row_danhmuc['ten_dmbv'] ?></option>
      <?php 
      }else{
        
        ?>
        <option  value="<?php echo $row_danhmuc['id_danhmucbaiviet']?>"><?php echo $row_danhmuc['ten_dmbv'] ?></option>
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
  
  
    <td colspan="2" style="text-align: center;"><input type="submit" name="suabaiviet" value="Sửa bài viết"></td>
  </tr>

  <?php
  }
  ?>
  </form>
</table>