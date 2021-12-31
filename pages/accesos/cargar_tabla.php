<?php
    require_once '../../conexion.php';

    $sql = "select * from modulo_usuario";
    $result = mysqli_query ($conn,$sql);
    $conn->close();  
    if (!$result) {
    echo "Error al intentar realizar la operación. " . $conn->error;
    }
    $json=array();
    while($row = mysqli_fetch_array($result)){
        $json[]=array(
            'id_user'=>$row['id_user'],
            'name_user'=>$row['name_user'],
            'pass'=>$row['pass'],
            'rol'=>$row['rol'],
            'f_creation'=>$row['f_creation'],
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
?>