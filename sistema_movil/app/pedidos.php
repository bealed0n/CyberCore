<?php include('../../app/config/config.php');

session_start();
if (isset($_SESSION['u_usuario'])) {
    $user = $_SESSION['u_usuario'];
    $email = $user;
    //echo "session de ".$user; ///////////para comprobar sesion

    $query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$user' AND estado ='1'");
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_s = $usuario['id'];
        $ap_paterno_s = $usuario['ap_paterno'];
        $ap_materno_s = $usuario['ap_materno'];
        $nombres_s = $usuario['nombres'];
        $rut_s = $usuario['rut'];
        $cargo_s = $usuario['cargo'];
        $foto_perfil_s = $usuario['foto_perfil'];
    }
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php include('../../layout/head.php'); ?>
        <title>Delivery</title>
    </head>

    <body>
        <br>
        <div class="container">
            <table class="table table-bordered table-sm">
                <tr>
                    <td style="background:gray"><b style="color: #fff;">Usuario: </b></td>
                    <td><?php echo $nombres_s . " " . $ap_paterno_s . " " . $ap_materno_s; ?></td>
                </tr>
                <tr>
                    <td style="background: gray"><b style="color: #fff;">Cargo: </b></td>
                    <td><?php echo $cargo_s; ?></td>
                </tr>
            </table>
            <hr>
            <h4>Listado de pedidos - Asignados</h4>
            <hr>
            <div class="row">
                <?php
                $query_pedidos = $pdo->prepare("SELECT * FROM tb_pedidos WHERE id_repartidor_asignado = '$id_usuario_s' AND estado ='1' ORDER BY id_pedido DESC ");
                $query_pedidos->execute();
                $pedidos = $query_pedidos->fetchAll(PDO::FETCH_ASSOC);
                foreach ($pedidos as $pedido) {
                    $id_pedidos = $pedido['id_pedido'];
                    $nombre_origen = $pedido['nombre_origen'];
                    $direccion_origen = $pedido['direccion_origen'];
                    $celular_origen = $pedido['celular_origen'];
                    $nombre_destino = $pedido['nombre_destino'];
                    $celular_destino = $pedido['celular_destino'];
                    $direccion_destino = $pedido['direccion_destino'];
                    $id_repartidor_asignado = $pedido['id_repartidor_asignado'];
                    $estado_pedido = $pedido['estado_pedido'];

                    if ($estado_pedido == "PEDIDO FINALIZADO") {
                    } else {
                ?>
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary"><i class="fa fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <h4><b>Pedido Nuevo - Orden # <?php echo $id_pedidos; ?></b></h4>
                                </span>

                                <?php
                                if ($estado_pedido == "ASIGNADO") { ?>
                                    <span class="info-box-text text-right" style="margin-top: -10px">
                                        <button class="btn btn-warning btn-xs">
                                            ASIGNADO - SIN CONFIRMAR
                                        </button>
                                    </span>
                                <?php
                                }
                                ?>

                                <?php
                                if ($estado_pedido == "PEDIDO TOMADO") { ?>
                                    <span class="info-box-text text-right" style="margin-top: -10px">
                                        <button class="btn btn-secondary btn-xs">
                                            <i class="fa fa-check-circle"></i> PEDIDO TOMADO
                                        </button>
                                    </span>
                                <?php
                                }
                                ?>

                                <span class="info-box-text">
                                    <i class="fa fa-truck"></i>
                                    Origen:
                                </span>
                                <span class="info-box-text">
                                    <i class="fas fa-user"></i>
                                    <?php echo $nombre_origen; ?>
                                </span>
                                <p align="justify">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo $direccion_origen; ?>
                                </p>
                                <span class="info-box-text">
                                    <i class="fa fa-truck"></i>
                                    Destino:
                                </span>
                                <span class="info-box-text">
                                    <i class="fas fa-user"></i>
                                    <?php echo $nombre_destino; ?>
                                </span>
                                <p align="justify">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo $direccion_destino; ?>
                                </p>

                                <span class="info-box-text">
                                    <a href="<?php echo "https://api.whatsapp.com/send?phone=56" . $celular_origen . "&text=Hola"; ?>" class="btn btn-success btn-xs">
                                        <i class="fab fa-whatsapp"></i> <?php echo $celular_origen; ?>
                                        <?php echo "Origen" ?>
                                    </a>
                                    <a href="<?php echo "https://api.whatsapp.com/send?phone=56" . $celular_destino . "&text=Hola"; ?>" class="btn btn-success btn-xs" title="Destinatario">
                                        <i class="fab fa-whatsapp"></i> <?php echo $celular_destino; ?>
                                        <?php echo "Destinatario" ?>
                                    </a>
                                </span>

                                <span class="info-box-text text-right">
                                    <a href="ver_pedido.php?id_p=<?php echo $id_pedidos; ?>&&email_r=<?php echo $email; ?>" class="btn btn-info btn-xs">
                                        <i class="fas fa-shopping-bag"></i> Ver Pedido
                                    </a>
                                </span>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
            <br>
            <hr>
            <h4>Listado de pedidos - Finalizados</h4>
            <hr>
            <div class="row" style="background: #fff">
                <?php
                $query_pedidos_f = $pdo->prepare("SELECT * FROM tb_pedidos WHERE id_repartidor_asignado = '$id_usuario_s' AND estado_pedido = 'PEDIDO FINALIZADO' AND estado ='1' ORDER BY id_pedido DESC ");
                $query_pedidos_f->execute();
                $pedidos_f = $query_pedidos_f->fetchAll(PDO::FETCH_ASSOC);
                foreach ($pedidos_f as $pedido_f) {
                    $id_pedidos = $pedido_f['id_pedido'];
                    $nombre_origen = $pedido_f['nombre_origen'];
                    $direccion_origen = $pedido_f['direccion_origen'];
                    $celular_origen = $pedido_f['celular_origen'];
                    $nombre_destino = $pedido_f['nombre_destino'];
                    $celular_destino = $pedido_f['celular_destino'];
                    $direccion_destino = $pedido_f['direccion_destino'];
                    $id_repartidor_asignado = $pedido_f['id_repartidor_asignado'];
                    $estado_pedido = $pedido_f['estado_pedido'];
                ?>
                    <div class="info-box" style="background: #d9d9d9">
                        <span class="info-box-icon bg-secondary"><i class="fa fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <h4><b>Pedido Finalizado - Orden # <?php echo $id_pedidos; ?></b></h4>
                            </span>

                            <span class="info-box-text">
                                <i class="fa fa-truck"></i>
                                Origen:
                            </span>
                            <span class="info-box-text">
                                <i class="fas fa-user"></i>
                                <?php echo $nombre_origen; ?>
                            </span>

                            <p align="justify">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo $direccion_origen; ?>
                            </p>
                            <span class="info-box-text">
                                <i class="fa fa-truck"></i>
                                Destino:
                            </span>
                            <span class="info-box-text">
                                <i class="fas fa-user"></i>
                                <?php echo $nombre_destino; ?>
                            </span>

                            <p align="justify">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo $direccion_destino; ?>
                            </p>

                            <span class="info-box-text">
                                <a href="<?php echo "https://api.whatsapp.com/send?phone=56" . $celular_origen . "&text=Hola"; ?>" class="btn btn-success btn-xs">
                                    <i class="fab fa-whatsapp"></i> <?php echo $celular_origen; ?>
                                    <?php echo "Origen" ?>
                                </a>
                                <a href="<?php echo "https://api.whatsapp.com/send?phone=56" . $celular_destino . "&text=Hola"; ?>" class="btn btn-success btn-xs">
                                    <i class="fab fa-whatsapp"></i> <?php echo $celular_destino; ?>
                                    <?php echo "Destinatario" ?>
                                </a>
                            </span>

                            <span class="info-box-text text-right">
                                <a href="ver_pedido_finalizado.php?id_p=<?php echo $id_pedidos; ?>&&email_r=<?php echo $email; ?>" class="btn btn-info btn-xs">
                                    <i class="fas fa-shopping-bag"></i> Ver Pedido Finalizado
                                </a>
                            </span>
                        </div>
                    </div>
                <?php

                }
                ?>



            </div>
        </div>
    </body>
    <?php include('../../layout/footer_link.php'); ?>

    </html>
<?php
} else {
    header("Location: $URL/sistema_movil/login");
    echo "no hay sesion";
}
?>