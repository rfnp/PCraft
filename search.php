<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
<style>
{
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<link rel="stylesheet" href="css/header.css"> 
<body>
    <?php include_once "layout/header.php"?>
    <div class="container text-center">
    <div class="row">
    <?php
    include "./dbconfig/config.php";
    $sql = $_SESSION['sql'];
    $result = mysqli_query($connection,$sql);
                          
    while($row = $result->fetch_assoc()){
    ?>
    <div class="column">
        <img src="./img/product/<?php echo $row['image'];?>" class ="img-responsive"alt="Image" style= "width: 100%">
        <center>
        <p><a href="./productdetails?id=<?php echo $row['id']?>"><?php echo $row['productname'];?></a></p>
        <p>Rp <?php echo $row['price'];?></p>
        </center>
    </div>
    <?php
        }
    unset($_SESSION['sql']);
    ?>
    </div>
    </div>
    
</body>
</html>