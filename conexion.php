<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "localdb";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) 
{
	die("Error en la conexion con el servidor: ".mysqli_connect_error());
}

?>