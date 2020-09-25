<?php
include "./../dbconfig/config.php";
error_reporting(0);
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']))
{
    $search = $_POST['searching'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];

    if(!empty($brand) && !empty($category) && !empty($search)){
        $sql = "SELECT * FROM product WHERE category = '$category' AND brand = '$brand' AND productname LIKE '%$search%'";
        $result = mysqli_query($connection,$sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
            $_SESSION['sql'] = $sql;
            header("location: ./../search.php");
        }
        else{
            $_SESSION['error'] = "There are no results found.";
            header("location: ./../index.php");
        }
    }
    elseif(!empty($brand) && !empty($category) && empty($search)){
        $sql = "SELECT * FROM product WHERE category = '$category' AND brand = '$brand'";
        $result = mysqli_query($connection,$sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
            $_SESSION['sql'] = $sql;
            header("location: ./../search.php");
        }
        else{
            $_SESSION['error'] = "There are no results found.";
            header("location: ./../index.php");
        }
    }
    elseif(!empty($brand) && empty($category) && !empty($search)){
        $sql = "SELECT * FROM product WHERE productname LIKE '%$search%' AND brand = '$brand'";
        $result = mysqli_query($connection,$sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
            $_SESSION['sql'] = $sql;
            header("location: ./../search.php");
        }
        else{
            $_SESSION['error'] = "There are no results found.";
            header("location: ./../index.php");
        }
    }
    elseif(empty($brand) && !empty($category) && !empty($search)){
        $sql = "SELECT * FROM product WHERE category = '$category' AND productname LIKE '%$search%'";
        $result = mysqli_query($connection,$sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
            $_SESSION['sql'] = $sql;
            header("location: ./../search.php");
        }
        else{
            $_SESSION['error'] = "There are no results found.";
            header("location: ./../index.php");
        }
    }
    elseif(!empty($brand) && empty($category) && empty($search)){
        $sql = "SELECT * FROM product WHERE brand = '$brand'";
        $result = mysqli_query($connection,$sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
            $_SESSION['sql'] = $sql;
            header("location: ./../search.php");
        }
        else{
            $_SESSION['error'] = "There are no results found.";
            header("location: ./../index.php");
        }
    }
    elseif(empty($brand) && !empty($category) && empty($search)){
        $sql = "SELECT * FROM product WHERE category = '$category'";
        $result = mysqli_query($connection,$sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
            $_SESSION['sql'] = $sql;
            header("location: ./../index.php");
        }
        else{
            $_SESSION['error'] = "There are no results found.";
            header("location: ./../index.php");
        }
    }
    elseif(empty($brand) && empty($category) && !empty($search)){
        $sql = "SELECT * FROM product WHERE productname LIKE '%$search%'";
        $result = mysqli_query($connection,$sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
            $_SESSION['sql'] = $sql;
            header("location: ./../search.php");
        }
        else{
            $_SESSION['error'] = "There are no results found.";
            header("location: ./../index.php");
        }
    }
    else{
        $_SESSION['error'] = "Please fill the search bar or choose the option.";
        header("location: ./../index.php");
    }
}
