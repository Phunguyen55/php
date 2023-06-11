
<?php
$code = $_GET['code'];
$sql_chitiet = "SELECT * FROM tbl_cart_details,tbl_sanpham where tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart ='".$code ."' ORDER BY tbl_cart_details.id_cart_details DESC";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
?>

<p>Chi tiết đơn hàng</p>
<table style="width: 100%" border="1">
<tr>
    <th>Số thứ tự</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
    
  </tr>
   <?php
   $i = 0;
   $tongtien=0;
   while ($row = mysqli_fetch_array($query_chitiet)) {
       $thanhtien = $row['soluongmua'] * $row['giasp'];
       $tongtien += $thanhtien;
       $i++;
       ?> 
 
 <tr>
    <td><?php echo $i ?></td>  
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.').'vnđ'  ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
  
   
</tr>
  <?php
}
  ?>
  <tr>
  <td colspan="6">
    <p style="color: red;">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ'?></p>
  </td>
  </tr>
  
  </table>