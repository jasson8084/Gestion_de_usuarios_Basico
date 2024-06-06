<?php

    session_start();
    include 'conexionDB.php';

    // Obtener la imagen desde la base de datos 
    $consulta = "SELECT imagen FROM empleado WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("i", $_SESSION["id_user"]);
    $stmt->execute();
    $stmt->bind_result($image);
    $stmt->fetch();
    $stmt->close();

    //Mostrar la imagen si existe
    if ($image){
        header ("Content-type: image/jpg");
        echo $image;
    } else {
        echo "no hay imagen";
    }

?>