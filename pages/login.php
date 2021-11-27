<?php

$dbhost = "localhost";
$dbuser = "faunter";
$dbpass = "admin";
$dbname = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
		echo "Bienvenido:" .$nombre;
}
else if ($nr == 0) 
{
	echo "<script> alert('Usuario Invalido');window.location= 'login.html' </script>";
}
	


?>