<?php
session_start();
ob_start();
include ("../include/config.php");
if(isset($_SESSION['id'])){
  $id=$_SESSION['id'];
  $query ="SELECT * FROM registrars WHERE user_id ='$id' AND (role ='admin' OR role ='writer')";
  $sql= mysqli_query($conn,$query);
  $sqlrow= mysqli_num_rows($sql);
  if(mysqli_num_rows($sql) != 1 ){
  	header("location:../index.php");
  }
  else{

  }
}
else{
	header("location:../index.php");
}

?>