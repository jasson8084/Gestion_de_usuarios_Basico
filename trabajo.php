<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Trabajo</title>
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
                        <a class="nav-link" href="logout.php">Cerrar sesion</a>
                </li>
                <li>
                    <img class="circulo" src="imagen.php" alt="">
                </li>
            </ul>
        </div>

        </nav>
    </header>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" id="sidebar">
                <div class="list-group">
                    <a href="create.php" class="list-group-item list-group-item-action">Registrar</a>
                    <a href="delete.php" class="list-group-item list-group-item-action">Eliminar</a>
                    <a href="read.php" class="list-group-item list-group-item-action">Ver tabla</a>
                </div>
            </div>
            <div class="col-md-9 d-flex justify-content-center align-items-center" id="contenido">
                <div class="text-center">
                    <img class="img-fluid" src="images/banner.jpg" alt="banner" style="border-radius: 20px;">
                </div>
            </div>  
        </div>
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
