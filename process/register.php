<?php
include "connection.php";

$full_name  = $_POST['full_name'];
$email      = $_POST['email'];
$password   = md5($_POST['password']);

$query = mysqli_query($connect, "INSERT INTO users VALUES ('', '$full_name', '$email', '$password')");

header('location: ../index.php');
?>