<?php  
session_start();  
require 'functions.php';
$conn;

if ( isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

//apakah submit sudah ditekan ?
if (isset ($_POST["login"])){
//cek username dan pass
	require 'functions.php';
	global $conn;
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
	//cek username
	if(mysqli_num_rows($query) === 1 ){
	//cek password
		$row =  mysqli_fetch_array($query);
		//set session	
			$_SESSION['id'] = $row["id"];
			$_SESSION['username'] = $row['username'];
			header("Location: index.php");
			$_SESSION["login"] = true;
			
			//cek "ingat saya"
		
	
	}
	
	$error = true;

}
 ?>
<!DOCTYPE html>
<html lang="en" dir="itr">
<head>
	<meta charset="utf-8">
	<title> Login </title>
	<link rel="stylesheet" href="stl.css">
</head>
<body>
<form class ="box" action="" method="POST">
<h1> LOGIN </h1>
<img src="avatar.png" alt="Avatar" class="avatar">
<?php if (isset($error)){ ?>
		
		<p style="color : red; font-style: italic; ">	
		Username atau Password Salah !</p>

<?php } ?>

	
	<input type="text" name="username" id="username" placeholder="Username">

	<input type="password" name="password" id="password" placeholder="Password">

	<input type="checkbox" name="ingat" id="ingat" >
	<label for="ingat" style="color : white; font-style: bold;"> Ingat saya!</label>
	
 <button type="submit" name="login" > Login </button> 
</form>
</div>
</body>
</html>