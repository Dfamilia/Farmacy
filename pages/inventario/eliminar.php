<?php
include("../../conexion.php");
$id = $_GET['id'];
$eliminar = "DELETE FROM datos WHERE id = '$id'";
$elimina = mysqli_query($conn,$eliminar);
if ($elimina){
header("Location: Inventario.php");
}
?>