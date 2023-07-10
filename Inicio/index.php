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
</head>
<body>
    <header>
        <nav class="navbar">
            <img src="https://i.imgur.com/4uwAKk9.png" alt="Logo" class="logo">
            <ul class="nav-links">
                <li><a href="<?php echo $URL; ?>/swagger">API</a></li>
                <li><a href="<?php echo $URL; ?>/web" class="btn btn-primary">Ingresar web</a></li>
                <li><a href="<?php echo $URL; ?>/sistema_movil/login" class="btn btn-secondary">Ingreso movil</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Bienvenido a Transportes CyberCore</h1>
        <div class="image-container">
            <img src="https://i.imgur.com/c2ucMyt.jpg" alt="Transporte" class="transport-image">
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <img src="https://i.imgur.com/zcyKRMR.jpg" alt="GitHub Logo" class="github-logo">
            <p>Visita el repositorio en GitHub:</p>
            <a href="https://github.com/bealed0n/CyberCore" target="_blank" class="github-link">CyberCore en GitHub</a>
        </div>
    </footer>
</body>
</html>
