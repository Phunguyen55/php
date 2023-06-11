<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet"  href="./css/style.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web phụ kiện điện thoại</title>
</head>
<body>
   <div class="wrapper">
    <?php
    session_start();
    
    include("admincp/config/config.php");
    include("pages/header.php");
    include("pages/menu.php");
    include("pages/main.php");
    include("pages/footer.php");  
    ?>
   </div>
</body>
</html>