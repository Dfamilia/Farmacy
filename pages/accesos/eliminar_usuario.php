<?php
    require_once '../../conexion.php';

    $id_user=$_POST['valor'];
    $sql = "DELETE FROM modulo_usuario where id_user='$id_user'";
    $result=mysqli_query ($conn,$sql);
    $conn->close();  

    if ($conn->connect_error) {
        die("Conecxión fallida: " . $conn->connect_error);
    }elseif (!$result){
        echo "Ha ocurrido un error";
    }else {
        echo "Un usuario ha sido eleminado";
    }
?>