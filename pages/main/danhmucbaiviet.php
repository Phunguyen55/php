<?php
$sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc='$_GET[id]' ORDER BY id_baiviet DESC";
$query_bv = mysqli_query($mysqli, $sql_bv);
//get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_danhmucbaiviet ='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>

<h3>Danh mục bài viết : <?php echo $row_title['ten_dmbv'] ?></h3>
<ul class="product_list">
    <?php
    while ($row = mysqli_fetch_array($query_bv)) {
    ?>
        <li>
            <a href="index.php?quanly=baiviet&id=<?php echo $row['id_baiviet'] ?>">
                <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>">
                <p class="title">Tên bài viết : <?php echo $row['tenbaiviet'] ?></p>
                <p><?php echo $row['tomtat'] ?></p>
            </a>
        </li>

    <?php
    }
    ?>
</ul>