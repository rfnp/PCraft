<?php
include "./../dbconfig/config.php";
session_start();
error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hash_password = sha1($password);

    $sqluser = "SELECT username FROM user WHERE username = '$username'";
    $qresult = mysqli_query($connection,$sqluser);
    $count = mysqli_num_rows($qresult);

    if($count>0){
        $_SESSION['error'] = "Username is already taken";
        header("location: ./../register.php");
    }

    else{
    $sql = "INSERT INTO user VALUES(null, '$username', '$email','$hash_password')";

    $connection->query($sql);
    header("location: ./../login.php");
    }
}