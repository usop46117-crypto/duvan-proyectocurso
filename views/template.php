<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Curso PHP</title>
    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/bootstrap-icons.min.css">
    <script src="views/js/sweetalert2.js"></script>
</head>

<body>
    <header>
        <?php
        include("views/modules/navegacion.php");
        ?>
    </header>

    <section>
        <?php
        $controlador = new Controlador();
        $controlador->enlacesPaginasControlador();
        ?>
    </section>

    <footer>

    </footer>

    <script src="views/js/bootstrap.bundle.min.js"></script>
    <script src="views/js/funciones.js"></script>

</body>

</html>