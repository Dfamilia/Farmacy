<?php
session_start();
include("../../conexion.php");

// Action: try to log-in
if(isset($_POST["txtusuario"])){

	$nombre = $_POST["txtusuario"];
	$pass = $_POST["txtpassword"];
	
	$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '".$nombre."' and pass = '".$pass."'");
	
	if(mysqli_num_rows($query) > 0)
	{
		$_SESSION['username'] = $nombre;
		header('Location: ../../index.php');

	}else{
		echo "<script> alert('Usuario Invalido'); window.location= '../../index.php'; </script>";
	}		
}

// Action: Log-out
if(isset($_POST["logout"])) {
	unset($_SESSION["username"]);  
	header('Location: ../../index.php');
}
?>