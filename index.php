<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Centauro</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/design.css">
</head>
<body>
    <script>
        // Desactivar la funcionalidad de retroceso y avance de página
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function (event) {
            // Evitar que la página retroceda
            history.pushState(null, null, document.URL);
            // Evitar que la página avance
            event.preventDefault();
        });
    </script>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="home.php">
                <img src="images/logo.png" alt="Logo" height="60">
            </a>
        </nav>
    </header>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <h2 class="mb-4">Inicia sesión</h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control mx-auto" id="email" name="email" required style="max-width: 300px;" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control mx-auto" id="contraseña" name="contraseña" required style="max-width: 300px;" placeholder="Contrase;a">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom">Ingresar</button>
                    </div>
                </form>
                <div class="text-center">
                    <p class="mt-3">¿No tienes una cuenta? <a href="registro.html">Regístrate aquí</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-auto py-3">
            <div class="container text-center">
                <span class="text-muted">&copy; <?php echo date("Y"); ?> Centurion. Todos los derechos reservados.</span>
            </div>
    </footer>
</body>
</html>


<?php
    // CAMBIAR CONTRASENIA POR LA PALABRA ESCRITA CORRECTAMENTE 

    session_start(); // Se inicia la sesion.
    include 'conexionDB.php'; // Incluimos la conexion a la base de datos.

    if(isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }

    if (isset($_SESSION['id_user'])) {
        header("Location: home.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){ // Condicion para recopilar las credenciales del formulario y registrarlos

        $email = $_POST["email"];
        $contra = $_POST["contraseña"]; // Recopilacion de datos 

        $consulta = "SELECT id, nombre FROM empleado WHERE email = '$email' AND contraseña = '$contra'"; // Verificar las credenciales ingresados    
        $resultado = $conexion->query($consulta);

        if ($resultado->num_rows == 1){ // Verifica si las credenciales existen 
            $usuario = $resultado->fetch_assoc(); // Obtiene el resultado de la consulta en este caso el usuario
            $_SESSION["id_user"] = $usuario["id"]; // Almacena el nombre del usuario en la sesion
            $_SESSION["nombre_user"] = $usuario["nombre"]; // Almacena el nombre del usuario en la sesion
            header("Location: home.php");
        } else {
            echo "Email o contraseña incorrectos!";
        }
    }
?>

