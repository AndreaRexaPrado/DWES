<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELECTRONICAWEB</title>
    <!-- Incluye los archivos de Bootstrap y Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Color de fondo del cuerpo */
        }

        nav.navbar {
            background-color: #343a40; /* Color de fondo de la barra de navegación */
        }

        a.navbar-brand {
            color: #ffffff; /* Color del texto del logo */
        }

        a.navbar-brand:hover {
            color: #ffffff; /* Color del texto del logo al pasar el ratón */
        }

        .navbar-toggler-icon {
            background-color: #ffffff; /* Color del icono del botón de navegación en dispositivos móviles */
        }

        .navbar-nav {
            margin-right: 20px;
        }

        .navbar-nav .nav-link {
            color: #ffffff; /* Color del texto de los enlaces en la barra de navegación */
            margin: 0 10px;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa; /* Color del texto de los enlaces al pasar el ratón */
        }

        #logoutButton,
        #loginButton {
            display: none;
        }

        #languageSelect {
            color: #ffffff; /* Color del texto del selector de idioma */
            background-color: #343a40; /* Color de fondo del selector de idioma */
            border: none;
            outline: none;
            margin-right: 10px;
            position: relative;
        }

        #languageSelect:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
        <img src="tu_logo.png" alt="Logo ELECTRONICAWEB" width="30" height="30" class="d-inline-block align-top">
        ELECTRONICAWEB
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-box-open"></i> Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Carrito</a>
            </li>
            <?php
                if (isset($_SESSION['usuario'])) {
                    // Usuario autenticado
                    echo '<li class="nav-item" id="logoutButton"><a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>';
                } else {
                    // Usuario no autenticado
                    echo '<li class="nav-item" id="loginButton"><a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a></li>';
                }
            ?>
            <li class="nav-item dropdown" id="languageSelect">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-globe"></i> Idioma
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Español</a>
                    <a class="dropdown-item" href="#">English</a>
                </div>
            </li>
        </ul>
    </div>


<!-- Aquí podrías agregar el resto de tu contenido -->

<!-- Incluye los archivos de jQuery y Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
