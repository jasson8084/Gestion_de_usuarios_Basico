<?php
include("conexionDB.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM datos WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado->num_rows == 1) {
        $registro = $resultado->fetch_assoc();
        $nombre = $registro['nombre'];
        $email = $registro['email'];
        $fechareg = $registro['fecha_reg'];
    } else {
        // No se encontró el registro con el ID proporcionado
        echo "Registro no encontrado.";
        exit;
    }
} else {
    // No se proporcionó un ID válido en la URL
    echo "ID de registro no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
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

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trabajo.php">Trabajo</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesion</a>
                </li>
                <li>
                    <img class="circulo" src="imagen.php" alt="">
                </li>
            </ul>
        </div>

        </nav>
    </header>
    <div class="container mt-5 text-center">
        <h1>Editar Registro</h1>
        <form action="create.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <center>
                <label for="nombre">Nombre y Apellido</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" style="max-width: 300px;">
                </center>
            </div>
            <div class="form-group">
                <center>
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email ?>" style="max-width: 300px;">
                </center>
            </div>
            <div class="form-group">
                <center>
                <label for="fechareg">Fecha de registro</label>
                <input type="text" class="form-control" name="fechareg" value="<?php echo $fechareg ?>" disabled style="max-width: 300px;">
                </center>
            </div>
            <button type="submit" class="btn btn-custom" name="actualizar">Actualizar</button>
        </form>
    </div>
    <footer class="footer mt-auto py-3">
            <div class="container text-center">
                <span class="text-muted">&copy; <?php echo date("Y"); ?> Centauro. Todos los derechos reservados.</span>
            </div>
        </footer>
</body>
</html>
