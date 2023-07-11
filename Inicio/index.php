<?php

/**
 */
include('../app/config/config.php');
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="icon" href="<?php echo $URL; ?>/public/favicon.ico" type="image/x-icon">
    <title>Transportes CYBERCORE</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <nav class="navbar">
            <picture class="logo">
                <img src="https://i.imgur.com/4uwAKk9.png" class="img-fluid" alt="logo">
            </picture>
            <ul class="nav-links">
                <li><a class="btn btn-outline-danger" role="button" href="<?php echo $URL; ?>/swagger">API</a></li>
                <li><a href="<?php echo $URL; ?>/web" class="btn btn-outline-success">Ingresar web</a></li>
                <li><a href="<?php echo $URL; ?>/sistema_movil/login" class="btn btn-outline-warning">Ingreso movil</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Bienvenido a Transportes CyberCore</h1>
        <div class="image-container">
            <img src="https://i.imgur.com/c2ucMyt.jpg" alt="Transporte" class="transport-image">
            <blockquote class="slogan">Entrega rápida, satisfacción garantizada:<br>
                <span class="quote">Nuestro transporte, tu tranquilidad.</span>
            </blockquote>

        </div>
    </div>

    <footer>
        <div class="footer-content">
            <img src="https://i.imgur.com/zcyKRMR.jpg" alt="GitHub Logo" class="github-logo">
            <p>Visita el repositorio en GitHub:</p>
            <a href="https://github.com/bealed0n/CyberCore" class="btn btn-outline-secondary">CyberCore en GitHub</a>
        </div>
    </footer>
</body>

</html>