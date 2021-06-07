<?php
$conn =  mysqli_connect('localhost', 'root', '', 'cloud');
if($conn->connect_error){
	die("Fatal Error: Can't connect to database: ". $conn->connect_error);
}

?>