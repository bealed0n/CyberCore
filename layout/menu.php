<?php
/**
 *
 */
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    Delivery
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $URL; ?>" class="brand-link">
        <img src="https://i.imgur.com/4uwAKk9.png" alt="Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Transporte</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info" style="margin-top: -5px">
                <a href="#" class="d-block" style="color: #f3f3f3">Usuario: <br><?php echo $nombres_s . " " . $ap_paterno_s . " " . $ap_materno_s; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php if ($cargo_s == "ADMINISTRADOR"): ?>
                    <li class="nav-item <?php echo ($activePage == 'usuarios') ? 'menu-open' : ''; ?>">
                        <a href="<?php echo $URL; ?>/web/usuarios/" class="nav-link <?php echo ($activePage == 'usuarios') ? 'active' : ''; ?>">
                            <i class="fas fa-users nav-icon"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($activePage == 'repartidores') ? 'menu-open' : ''; ?>">
                        <a href="<?php echo $URL; ?>/web/repartidor/" class="nav-link <?php echo ($activePage == 'repartidores') ? 'active' : ''; ?>">
                            <i class="fas fa-motorcycle nav-icon"></i>
                            <p>Repartidores</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($activePage == 'pedidos') ? 'menu-open' : ''; ?>">
                        <a href="<?php echo $URL; ?>/web/pedidos" class="nav-link <?php echo ($activePage == 'pedidos') ? 'active' : ''; ?>">
                            <i class="fas fa-store nav-icon"></i>
                            <p>Pedidos</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($cargo_s == "REPARTIDOR"): ?>
                    <li class="nav-item <?php echo ($activePage == 'mis-pedidos') ? 'menu-open' : ''; ?>">
                        <a href="<?php echo $URL; ?>/sistema_movil/login" class="nav-link <?php echo ($activePage == 'mis-pedidos') ? 'active' : ''; ?>">
                            <i class="fas fa-store nav-icon"></i>
                            <p>Mis pedidos</p>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-header">Sesión</li>

                <li class="nav-item">
                    <a href="<?php echo $URL; ?>/login/cerrarsesion.php" class="nav-link">
                        <i class="fas fa-lock nav-icon"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    /* Estilos para el color blanco */
    .nav-link.active.white {
        color: white;
    }
</style>

<!-- Script para agregar la clase al elemento activePage -->
<script>
    const activePageElement = document.querySelector('.nav-link.active');
    if (activePageElement) {
        activePageElement.classList.add('white'); 
    }
</script>
