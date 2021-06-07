<?php
require 'functions.php';
global $conn;
$file =  $_GET['file'];
if(ISSET($_GET['file'])){
		
		$conn->query("DELETE FROM `file` WHERE file_id = '$file'")or die(mysqli_error());
		echo "<script>alert('Berhasil dihapus')</script>";
		header("location:index.php");
		return mysqli_affected_rows ($conn);
	}
?>