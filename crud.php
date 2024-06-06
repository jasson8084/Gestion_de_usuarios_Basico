<?php 

include 'conexionDB.php';

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1) {
	    $name = trim($_POST['name']);
	    $email = trim($_POST['email']);
	    $fechareg = date("d/m/y");
	    $consulta = "INSERT INTO datos(nombre, email, fecha_reg) VALUES ('$name', '$email','$fechareg')";
	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Usuario registrado correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

if (isset($_POST['delete'])) {
    if (strlen($_POST['id']) >= 1 && strlen($_POST['name']) >= 1) {
	    $id = trim($_POST['id']);
	    $name = trim($_POST['name']);
	    $consulta = "DELETE FROM datos WHERE id = $id";
	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Usuario eliminado correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

if (isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $name = trim($_POST['nombre']); 
    $email = trim($_POST['email']);
    $fechareg = date("d/m/y");

    $consulta = "UPDATE datos SET nombre=?, email=?, fecha_reg=? WHERE id=?";
    
    $resultado = mysqli_prepare($conexion, $consulta);

    if ($resultado) {
        // Vincula los parámetros y ejecuta la consulta
        mysqli_stmt_bind_param($resultado, "sssi", $name, $email, $fechareg, $id);
        mysqli_stmt_execute($resultado);

        // Verifica si la ejecución fue exitosa
        if (mysqli_stmt_affected_rows($resultado) > 0) {
            ?> 
	    	<h3 class="ok">¡Usuario editado correctamente!</h3>
           <?php
        } else {
            ?> 
	    	<h3 class="bad">¡No se ha podido editar correctamente!</h3>
           <?php
        }
        // Cierra la consulta preparada
        mysqli_stmt_close($resultado);
    } else {
        ?> 
	    <h3 class="bad">¡Ups ha ocurrido un error!</h3>
        <?php
    }
}


?>