<?php

    session_start();
    include 'conexionDB.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $contra = $_POST["contraseña"];
        $fecha = date("d/m/y");

        $consulta_existencia = "SELECT id FROM empleado WHERE email = '$email'";
        $resultado = $conexion->query($consulta_existencia);

        if($resultado->num_rows > 0){
            echo "El email que ingreso ya se encuentra resgistrado";
        } else {
            $consulta_insertar = "INSERT INTO empleado (nombre, email, contraseña, fecha_reg) VALUES ('$nombre', '$email', '$contra', '$fecha')";
            if ($conexion->query($consulta_insertar) === TRUE){
                header("Location: registrado.html");
            } else {
                echo "No se ha podido registrar correctamente"; 
                ?>
                <a href="login.php">Volver</a>
                <?php
            }
        }
    $conexion->close();
    }

?>