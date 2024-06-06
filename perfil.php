<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Perfil</title>
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
                        <a class="nav-link" href="logout.php">Cerrar sesion</a>
                </li>
                <li>
                    <img class="circulo" src="imagen.php" alt="">
                </li>
            </ul>
        </div>

        </nav>
    </header>
    
    <div class="container">
        <h1>Agrega una imagen de perfil</h1>
        <form action="subir_image.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="text-center" for="profile_image">Selecciona tu imagen de perfil:</label>
                <input type="file" class="form-control-file center-input" id="profile_image" name="profile_image">
            </div>
            <button type="submit" class="btn btn-custom">Cargar Imagen</button>
        </form>
    </div>
    <footer class="footer mt-auto py-3">
            <div class="container text-center">
                <span class="text-muted">&copy; <?php echo date("Y"); ?> Centauro. Todos los derechos reservados.</span>
            </div>
    </footer>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
