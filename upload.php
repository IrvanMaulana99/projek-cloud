<?php
session_start();
require_once 'functions.php';
$conn;
if(ISSET($_POST['submit'])){
	if($_FILES['upload']['name'] != "") {
		$file = $_FILES['upload'];
		$id = $_SESSION['id'];
		$file_name = $file['name'];
		$file_temp = $file['tmp_name'];
		$name = explode('.', $file_name);
		$path = "files/".$file_name;
		
		$conn->query("INSERT INTO `file` VALUES('', '$name[0]', '$path', '$id')") or die(mysqli_error($conn));
		
		move_uploaded_file($file_temp, $path);
		header("location:index.php");
		
	}else{
		echo "<script>alert('Required Field!')</script>";
		echo "<script>window.location='index.php'</script>";
	}
}
?>