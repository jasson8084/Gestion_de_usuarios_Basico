<?php
session_start();
include 'conexionDB.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_user'])){
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/design.css">
    <title>Cerrar sesion</title>
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
    <div class="text-center">
        <h2><?php echo $_SESSION["nombre_user"]; ?>, ¿Estás seguro que deseas cerrar sesión?</h2>
        <!-- Formulario para cerrar sesión y redirigir a login.php -->
    </div><br><br>
    <div class="text-center">
        <form action="index.php" method="get">
            <button class="btn btn-custom" type="submit" name="logout">Cerrar sesión</button>
            <a href="home.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <footer class="footer py-3">
            <div class="container text-center">
                <span>&copy; <?php echo date("Y"); ?> Mi Empresa. Todos los derechos reservados.</span>
            </div>
    </footer>
</body>
</html>
