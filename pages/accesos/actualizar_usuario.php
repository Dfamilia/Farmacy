<?php
require '../../conexion.php';
$json= $_POST['valor'];
$valor=json_decode($json);
$id_user=0;
$result=0;
$sql="";
foreach($valor as $i=> $value){
    if($i ==="id_user"){
        $id_user=$value;
    }else{
        $sql = "UPDATE modulo_usuario set $i='$value' where id_user='$id_user'";
        $result +=mysqli_query ($conn,$sql);
    }
}
$conn->close();  

if ($conn->connect_error) {
    die("Conecxión fallida: " . $conn->connect_error);
}elseif (!$result){
    echo "Ha ocurrido un error";
}else {
    if($result===1){
        echo $result ." Un registro ha sido actualizado. ";
    }else{
        echo $result ." registros han sido actualizados. ";
    }
}
?>