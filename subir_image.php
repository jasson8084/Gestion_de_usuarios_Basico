<?php

    session_start();
    include 'conexionDB.php';

    // Verificar si se ha enviado un archivo 
    if (isset($_FILES["profile_image"])){ 
        $archivo = $_FILES["profile_image"];

        // Verificar si existe algun tipo de error
        if ($archivo['error'] === UPLOAD_ERR_OK){
            $name = $archivo['name'];
            $tmp_name = $archivo['tmp_name'];

            // Leer el contenido del archivo 
            $abrir = fopen($tmp_name, 'r');
            $contenido = fread($abrir, filesize($tmp_name));
            fclose($abrir);
            
            // Preparar la consulta para insertar las imagenes en la base de datos 
            $consulta = "UPDATE empleado SET imagen = ? WHERE id = ?";
            $stmt = $conexion->prepare($consulta);
            $stmt->bind_param("si", $contenido, $_SESSION['id_user']);
            $stmt->execute();
            $stmt->close();

            //Redigir al usuario
            header("Location: home.php");
            exit;
        }
    }

?>