<?php 
include "./../dbconfig/config.php";
session_start();
error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hash_password = sha1($password);

    $sql = "SELECT * FROM user WHERE username = '$username' and password = '$hash_password'";

    $result = $connection->query($sql);


    if($result->num_rows > 0)
    {
        session_regenerate_id();
        $_SESSION['username'] = $username;
        header("location: ./../index.php");
    }
    else {
        $_SESSION['error'] = "Wrong username and password";
        header("location: ./../login.php");
    }
}
