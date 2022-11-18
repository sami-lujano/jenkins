<?php
    $host = "localhost";
    $usuario = "root";
    $clave = "";
    $bd ="usuarios";

    $conexion = mysqli_connect($host, $usuario, $clave, $bd);

    if($conexion) {

        echo "Conexion Establecida!!";

    }else{
        echo "Erro al establecer conexion";
    }
?>