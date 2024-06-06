<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Registro</title>
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
    <div id="box">
        <form method="post">
            <h1 class="mb-4">Eliminar</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="id" placeholder="ID">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Nombres">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
            </div>
        </form>
    </div>

    <?php 
    include("crud.php");

    $inc = include 'conexionDB.php';

    if ($inc) {
        $consulta = "SELECT * FROM datos";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            ?>
            <div class="container mt-5">
                <form action="update.php">
                    <table class="table table-bordered" id="tabla">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Email</th>
                                <th>Fecha de registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $resultado->fetch_array()) {
                                $id = $row['id'];
                                $nombre = $row['nombre'];
                                $email = $row['email'];
                                $fechareg = $row['fecha_reg'];
                                ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $fechareg ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <?php
        }
    }
    ?>
        <footer class="footer mt-auto py-3">
            <div class="container text-center">
                <span class="text-muted">&copy; <?php echo date("Y"); ?> Centauro. Todos los derechos reservados.</span>
            </div>
        </footer>
</body>
</html>