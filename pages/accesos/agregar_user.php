<?php
    require_once '../../conexion.php';
    $json= $_POST['valor'];
    $valor=json_decode($json);
    $u="";
    $c="";
    $a="";
    $f= date('Y-m-d H:i:s');
    
    foreach( $valor as $i=> $value){
        if($i ==="name_user"){
            $u=$value;
        }
        if($i ==="pass"){
            $c=$value;
        }
        if($i ==="rol"){
            $a=$value;
        }
    } 
    $sql = "INSERT INTO modulo_usuario (name_user,pass,rol,f_creation ) VALUES('$u','$c','$a','$f')";
    $result= mysqli_query($conn,$sql);
  
    if ($conn->connect_error) {
        echo("Conecxión fallida: " . $conn->connect_error);
    }elseif (!$result){
        echo "Ha ocurrido un error'$u','$c','$a','$f'" ;
    }else {
        echo "Un usuario ha sido agregado";
    } 
    $conn->close();
?>