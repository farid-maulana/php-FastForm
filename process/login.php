<?php 
include 'connection.php';

$email		= $_POST['email'];
$password	= md5($_POST['password']);
 
$login	= mysqli_query($connect, "SELECT * FROM users WHERE email='$email' AND password='$password'");
$cek	= mysqli_num_rows($login);
 
if ($cek > 0) {
	session_start();
	$_SESSION['email']	= $email;
	header("location:../layouts/master.php");	
} else {
	header("location:../index.php?pesan=gagal");
}
?>