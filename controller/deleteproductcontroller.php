<?php
include "./../dbconfig/config.php";

$id = $_GET['id'];
$sql = "DELETE FROM product where id = $id";
$connection->query($sql);

header("location: ./../index.php");