<div class="sidebar">
        <ul class="list_sidebar">
                <p style="color: red; font-size: 20px;">Danh mục sản phẩm</p>
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                while ($row = mysqli_fetch_array($query_danhmuc)) {
                ?>
                        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
                <?php
                }
                ?>

        </ul>
        <ul class="list_sidebar">
                <p style="color: red; font-size: 20px;">Danh mục bài viết</p>
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
                $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                while ($row = mysqli_fetch_array($query_danhmuc)) {
                ?>
                        <li><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_danhmucbaiviet'] ?>"><?php echo $row['ten_dmbv'] ?></a></li>
                <?php
                }
                ?>

        </ul>
</div>