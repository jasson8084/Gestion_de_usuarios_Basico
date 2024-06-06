<?php

    $host = "localhost:3307";
    $user = "root";
    $password = "";
    $data = "proyecto";

    $conexion = new mysqli($host,$user,$password,$data);

    if ($conexion->connect_error){
        die ("Ha ocurrido un error!" . $conexion->connect_error);
    }
?>