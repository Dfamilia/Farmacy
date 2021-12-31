<?php
include("../../conexion.php");


if(isset($_POST['agregarAlInventario'])){
		$codigo=$_POST["codigo"];
		$nombre=$_POST["nombre"];
		$descripcion=$_POST["descripcion"];
		$suplidor=$_POST["suplidor"];
		$cantidad=$_POST["cantidad"];
		$costo=$_POST["costo"];
		$entrada=$_POST["entrada"];
		$salida=$_POST["salida"];
		$expiracion=$_POST["expiracion"];
		$id=null;

		$insertarDatos = "INSERT INTO datos VALUES(	'$codigo',
													'$nombre',
													'$descripcion',
													'$suplidor',
													'$cantidad',
													'$costo',
													'$entrada',
													'$salida',
													'$expiracion',
													'$id')";

		$ejecutarInsertar = mysqli_query($conn, $insertarDatos);

		if(!$ejecutarInsertar){
			echo "<script> alert('Error En la linea de sql'); window.location= 'Inventario.php'; </script>";
		}else{
			header('Location: Inventario.php');
		}
	}

	if(isset($_POST['actualizarProducto'])){
		$codigo=$_POST["codigo"];
		$nombre=$_POST["nombre"];
		$descripcion=$_POST["descripcion"];
		$suplidor=$_POST["suplidor"];
		$cantidad=$_POST["cantidad"];
		$costo=$_POST["costo"];
		$entrada=$_POST["entrada"];
		$salida=$_POST["salida"];
		$expiracion=$_POST["expiracion"];
		$id=$_POST["id"];

		$actualizarDatos = "UPDATE datos SET codigo='$codigo', nombre='$nombre', descripcion='$descripcion', suplidor='$suplidor', cantidad=$cantidad, costo=$costo, entrada='$entrada', salida='$salida', expiracion='$expiracion' WHERE id=$id";

		$ejecutarInsertar = mysqli_query($conn, $actualizarDatos);

		if(!$ejecutarInsertar){
		echo "<script> alert('Error En la linea de sql'); window.location= 'Inventario.php'; </script>";
		}else{
		header('Location: Inventario.php');
		}
	}
?>