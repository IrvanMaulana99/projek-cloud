<?php  
session_start(); 
require 'functions.php';
$conn;
if ( !isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cloud Computing</title>
  <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bg-gradient">  
<h1> Storage </h1>
<form class="form-inline" method="POST" action="upload.php" enctype="multipart/form-data">
 <input class="form-control" type="file" name="upload"/>

 <button type="submit" class="neon" name="submit">Upload
</button>
</form>
<br> </br>
      <table>
        <thead>
      <tr>  
        <th> No </th>
        <th> File Name </th>
        <th> Action </th>
      </tr>
    </thead>
    <tbody>
   <?php $no =1;?>
      <?php
      require 'functions.php';
      $conn;
      
      $id = $_SESSION['id'];
      $row = $conn->query("SELECT * FROM `file` WHERE id_user = '$id'") or die(mysqli_error());
      
      while($fetch = $row->fetch_array()){
       ?>
       <tr>
        <?php 
        $name = explode('/', $fetch['file']);
        ?>
        <td><?php echo $no ?> </td>
        <td><?php echo $fetch['name']?></td>
        <td><a href="download.php?file=<?php echo $name[1]?>" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> Download</a></td>
        <td><a href="hapus.php?file=<?php echo $fetch['file_id'] ?>" onclick="return confirm('Apa anda yakin ingin menghapus file ini ?');" class="btn btn-primary" ><span class="glyphicon glyphicon-download"></span> Hapus </a></td>

      </tr>
      <?php $no++ ?>
      <?php
    }
    ?>
</tbody>
</table>
<br></br>
<a href="logout.php"> Logout </a>
</div>

<!--Script Javascript-->
<script>
 $(document).ready(function() {
  $('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
    'colvis'
    ]
  } );
} );
</script>

</body>

</html>