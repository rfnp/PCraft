<?php
session_start();
error_reporting(0);
include "./../dbconfig/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload']))
{   
    $productname = $_POST['productname'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $image_name = $_FILES['image']['name'];

    $allowed_extensions=["jpg","jpeg","png"];
    $image_extension = PATHINFO($image_name,PATHINFO_EXTENSION);

    if($_FILES['image']['size'] > 10000000){
        $_SESSION['error'] = "size too big";
        header("location: ./../product.php");
    } elseif (in_array($image_extension,$allowed_extensions) == false){
        $_SESSION['error'] = "invalid extension";
        header("location: ./../product.php");
    }
    else {
        
        $document_root=$_SERVER['DOCUMENT_ROOT'];
        $full_upload_path = "$document_root/SoftwareEngineering/img/product/$image_name";

        move_uploaded_file($_FILES['image']['tmp_name'],$full_upload_path);
        
        $sql = "INSERT INTO product VALUES(null,'$productname','$category','$brand','$price','$image_name')";
        $connection->query($sql);

        header("location: ./../product.php");
    }

}