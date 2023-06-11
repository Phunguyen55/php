<?php
include('../../config/config.php');
if(isset($_GET['code'])){
    $code = $_GET['code'];
    $sql_update = "Update tbl_cart set cart_status= 0 where code_cart='".$code."'";
    $query_update = mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlydonhang&query=lietke');
}

?>