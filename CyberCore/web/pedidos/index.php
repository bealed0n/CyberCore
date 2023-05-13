<?php include('../../app/config/config.php');

session_start();
if(isset($_SESSION['u_usuario'])) {
    $user = $_SESSION['u_usuario'];
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
    <!DOCTYPE html>
    <html>
    <head>
        <?php //include('../../layout/head.php');?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <title>Delivery</title>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include('../../layout/menu.php');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="container">
                        <br>
                        Sección de Pedidos
                        <br><br>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><span class="fa fa-store"></span> Lista de Pedidos </h3>
                                <div style="float:right;">
                                    <a href="create" class="btn btn-primary"><span class="fa fa-plus"></span> Nuevo Pedido</a>
                                </div>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <table id="example1" class="table table-bordered table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Cliente</th>
                                                <th>Rut</th>
                                                <th>Celular</th>
                                                <th>Dirección</th>
                                                <th>Pedido Completo</th>
                                                <th>Asignación de Motoquero</th>
                                                <th>Estado del Pedido</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $contador_de_pedidos = 0;
                                            $query_pedidos = $pdo->prepare("SELECT * FROM tb_pedidos WHERE estado ='1' ORDER BY id_pedido DESC ");
                                            $query_pedidos->execute();
                                            $pedidos = $query_pedidos->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($pedidos as $pedido) {
                                                $contador_de_pedidos = $contador_de_pedidos + 1;
                                                $id_pedidos = $pedido['id_pedido'];
                                                $cliente = $pedido['nombre_cliente'];
                                                $rut_cliente = $pedido['rut_cliente'];
                                                $celular_cliente = $pedido['celular_cliente'];
                                                $celular_referencia_cliente = $pedido['celular_referencia_cliente'];
                                                $direccion_cliente = $pedido['direccion_cliente'];
                                                $id_repartidor_asignado = $pedido['id_repartidor_asignado'];
                                                $estado_pedido = $pedido['estado_pedido'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $contador_de_pedidos;?></td>
                                                    <td><?php echo $cliente;?></td>
                                                    <td><?php echo $ci_cliente;?></td>
                                                    <td>
                                                        <a href="<?php echo "https://api.whatsapp.com/send?phone=56".$celular_cliente  ;?>"
                                                           class="btn btn-success btn-xs" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                            <?php echo $celular_cliente;?>
                                                        </a>
                                                        <br>
                                                        <a href="<?php echo "https://api.whatsapp.com/send?phone=56".$celular_referencia_cliente  ;?>"
                                                           class="btn btn-success btn-xs" target="_blank" style="margin-top: 5px">
                                                            <i class="fab fa-whatsapp"></i>
                                                            <?php echo $celular_referencia_cliente;?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $direccion_cliente;?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                                data-target="#exampleModal_ver_pedido<?php echo $id_pedidos;?>">
                                                            <span class="fa fa-shopping-cart"></span> Ver pedido <?php echo $id_pedidos;?></button>

                                                        <div class="modal fade" id="exampleModal_ver_pedido<?php echo $id_pedidos;?>" tabindex="-1" role="dialog"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Datos del Pedido</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="card card-primary card-outline">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-bordered table-striped table-sm" style="font-size: 13px">
                                                                                                <thead>
                                                                                                <tr>
                                                                                                    <th style=""><b>Nombre Cliente</b></th>
                                                                                                    <th style=""><b>Rut</b></th>
                                                                                                    <th style=""><b>Celular</b></th>
                                                                                                    <th style=""><b>Email</b></th>
                                                                                                    <th style=""><b>Dirección</b></th>
                                                                                                    <th style=""><b>Pedidos</b></th>
                                                                                                    <th style=""><b>Costo Total</b></th>
                                                                                                    <th style=""><b>Costo Delivery</b></th>
                                                                                                    <th style=""><b>Observación</b></th>
                                                                                                </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                <?php
                                                                                                $query_pedidos2 = $pdo->prepare("SELECT * FROM tb_pedidos WHERE id_pedido = '$id_pedidos' AND estado ='1'");
                                                                                                $query_pedidos2->execute();
                                                                                                $pedidos2 = $query_pedidos2->fetchAll(PDO::FETCH_ASSOC);
                                                                                                foreach ($pedidos2 as $pedido2) {
                                                                                                    $id_p = $pedido2['id_pedido'];
                                                                                                    $nombre_cliente_p = $pedido2['nombre_cliente'];
                                                                                                    $rut_cliente_p = $pedido2['rut_cliente'];
                                                                                                    $celular_cliente_p = $pedido2['celular_cliente'];
                                                                                                    $celular_cliente_r_p = $pedido2['celular_referencia_cliente'];
                                                                                                    $email_cliente_p = $pedido2['email_cliente'];
                                                                                                    $direccion_cliente_p = $pedido2['direccion_cliente'];
                                                                                                    $id_direccion_cliente_p = $pedido2['id_direccion_cliente'];
                                                                                                    $costo_pedido_p = $pedido2['costo_pedido'];
                                                                                                    $costo_delivery_p = $pedido2['costo_delivery'];
                                                                                                    $obs_p = $pedido2['obs'];
                                                                                                    $id_carrito_p = $pedido2['id_carrito'];
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td><?php echo $nombre_cliente_p;?></td>
                                                                                                        <td><?php echo $ci_cliente_p;?></td>
                                                                                                        <td>
                                                                                                            <?php echo $celular_cliente_p;?>
                                                                                                            <br>
                                                                                                            <?php echo $celular_cliente_r_p;?>
                                                                                                        </td>
                                                                                                        <td><?php echo $email_cliente_p;?></td>

                                                                                                        <td>
                                                                                                            <?php

                                                                                                            if($id_direccion_cliente_p == ""){
                                                                                                                echo $direccion_cliente_p;
                                                                                                            }else{
                                                                                                                $query_direccion = $pdo->prepare("SELECT * FROM tb_mis_direcciones WHERE id = '$id_direccion_cliente_p' AND estado ='1'");
                                                                                                                $query_direccion->execute();
                                                                                                                $dires = $query_direccion->fetchAll(PDO::FETCH_ASSOC);
                                                                                                                foreach ($dires as $dire) {
                                                                                                                    $id_dire = $dire['id'];
                                                                                                                    $email_d = $dire['email'];
                                                                                                                    $nombre_d = $dire['nombre_direccion'];
                                                                                                                    $direccion_d = $dire['direccion'];
                                                                                                                    $referencia_d = $dire['referencia'];
                                                                                                                    ?>
                                                                                                                    <div class=""
                                                                                                                         style="font-size: 12px;border-radius: 10px">
                                                                                                                        <h6 class="alert-heading" style="
                                                                    margin-left: 10px;margin-right: 10px">
                                                                                                                            <i class="fa fa-map-marked-alt"></i> <b><?php echo $nombre_d;?></b>
                                                                                                                        </h6>
                                                                                                                        <p style="margin-left: 10px">
                                                                                                                            <?php echo $direccion_d;?> <br>
                                                                                                                            <span style="margin-top: 5px;color: #bc32ee">Ref. <?php echo $referencia_d;?></span>
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                    <?php
                                                                                                                }
                                                                                                            }
                                                                                                            ?>
                                                                                                        </td>

                                                                                                        <td>
                                                                                                            <table>
                                                                                                                <th>Nro</th>
                                                                                                                <th>Producto</th>
                                                                                                                <th>Detalle</th>
                                                                                                                <th>Cantidad</th>
                                                                                                                <th>Precio Unitario</th>
                                                                                                                <th>Precio Total</th>
                                                                                                                <?php
                                                                                                                $contador_del_carrito = 0;
                                                                                                                $contador_de_cantidades = 0;
                                                                                                                $contador_de_precio_u = 0;
                                                                                                                $contador_de_precio_t = 0;
                                                                                                                $query_carrito = $pdo->prepare("SELECT * FROM tb_carrito WHERE id_pedido = '$id_carrito_p' AND estado ='1'");
                                                                                                                $query_carrito->execute();
                                                                                                                $carritos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                                                                                                foreach ($carritos as $carrito) {
                                                                                                                    $id_carrito = $carrito['id'];
                                                                                                                    $id_pedido = $carrito['id_pedido'];
                                                                                                                    $producto = $carrito['producto'];
                                                                                                                    $detalle = $carrito['detalle'];
                                                                                                                    $cantidad = $carrito['cantidad'];
                                                                                                                    $precio_u = $carrito['precio_unitario'];
                                                                                                                    $precio_t = $carrito['precio_total'];
                                                                                                                    $contador_del_carrito = $contador_del_carrito + 1;
                                                                                                                    $contador_de_cantidades = $contador_de_cantidades + $cantidad;
                                                                                                                    $contador_de_precio_u = $contador_de_precio_u + $precio_u;
                                                                                                                    $contador_de_precio_t = $contador_de_precio_t + $precio_t;
                                                                                                                    ?>
                                                                                                                    <tr>
                                                                                                                        <td><center><?php echo $contador_del_carrito;?></center></td>
                                                                                                                        <td><?php echo $producto;?></td>
                                                                                                                        <td><?php echo $detalle;?></td>
                                                                                                                        <td><center><?php echo $cantidad;?></center></td>
                                                                                                                        <td><center><?php echo $precio_u;?></center></td>
                                                                                                                        <td><center><?php echo $precio_t;?></center></td>
                                                                                                                    </tr>
                                                                                                                    <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                                <tr>
                                                                                                                    <td colspan="3" align="right" style="background: #c0c0c0"><b>Totales</b></td>
                                                                                                                    <td align="right" style="background: #c0c0c0"><b><center><?php echo $contador_de_cantidades;?></center></b></td>
                                                                                                                    <td align="right" style="background: #c0c0c0"><b><center><?php echo $contador_de_precio_u;?></center></b></td>
                                                                                                                    <td align="right" style="background: #c0c0c0"><b><center><?php echo $contador_de_precio_t;?></center></b></td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                        </td>

                                                                                                        <td><center><?php echo $costo_pedido_p;?></center></td>
                                                                                                        <td><center><?php echo $costo_delivery_p;?></center></td>
                                                                                                        <td><?php echo $obs_p;?></td>
                                                                                                    </tr>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                                </tbody>
                                                                                                <!-- <tfoot>
                                                                                                     <tr>
                                                                                                         <th>Rendering engine</th>
                                                                                                         <th>Browser</th>
                                                                                                         <th>Platform(s)</th>
                                                                                                         <th>Engine version</th>
                                                                                                         <th>CSS grade</th>
                                                                                                     </tr>
                                                                                                 </tfoot>-->
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div><!-- /.card-body -->
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($id_repartidor_asignado == ""){
                                                           // echo "no esta asignado";
                                                            ?>
                                                            <select  onchange="PasarVariable<?php echo $id_pedidos;?>();" class="form-control" id="combo_repartidor<?php echo $id_pedidos;?>">
                                                                <option value="">Elegir...</option>
                                                                <option value="" disabled>---------------------------------------------</option>
                                                                <?php
                                                                $query_repartidor = $pdo->prepare("SELECT * FROM tb_usuarios WHERE cargo = 'REPARTIDOR' AND estado ='1' ");
                                                                $query_repartidor->execute();
                                                                $repartidores = $query_repartidor->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($repartidores as $repartidor) {
                                                                    $id_rep = $repartidor['id'];
                                                                    $nombre_rep = $repartidor['nombres'];
                                                                    $ap_paterno_rep = $repartidor['ap_paterno'];
                                                                    $ap_materno_rep = $repartidor['ap_materno'];
                                                                    $email_rep = $repartidor['email'];
                                                                    ?>
                                                                    <option value="<?php echo $id_rep;?>" data-icon="fa fa-motorcycle">
                                                                        <?php echo $nombre_rep." ".$ap_paterno_rep." ".$ap_materno_rep;?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <script>
                                                                function PasarVariable<?php echo $id_pedidos;?>(){
                                                                    var id_r = $('#combo_repartidor<?php echo $id_pedidos;?>').val();
                                                                    //alert(id_r);
                                                                    $('#txt_id_rep<?php echo $id_pedidos;?>').val(id_r);
                                                                }
                                                            </script>
                                                            <center>
                                                                <form action="controller_asignar_repartidor.php" method="get">
                                                                    <input type="text" id=""  value="<?php echo $id_pedidos;?>" name="id_p" hidden>
                                                                    <input type="text" id="txt_id_rep<?php echo $id_pedidos;?>" name="id_m" hidden>
                                                                    <button class="btn btn-info btn-sm" style="margin-top: 5px">
                                                                        <i class="fa fa-motorcycle"></i> Asignar Pedido
                                                                    </button>
                                                                </form>
                                                            </center>
                                                            <?php
                                                        }else if($estado_pedido == "PEDIDO FINALIZADO"){
                                                            //echo "pedido entregado";
                                                            ?>
                                                                <center>
                                                                    <p>
                                                                    PEDIDO ENTREGADO CON EXITO <br>
                                                                        Repartidor <br>
                                                                        <?php
                                                                        $query_repartidor_final = $pdo->prepare("SELECT * FROM tb_usuarios WHERE cargo = 'REPARTIDOR' AND id = '$id_repartidor_asignado' AND estado ='1' ");
                                                                        $query_repartidor_final->execute();
                                                                        $repartidores_final = $query_repartidor_final->fetchAll(PDO::FETCH_ASSOC);
                                                                        foreach ($repartidores_final as $repartidor_final) {
                                                                            $id_rep = $repartidor_final['id'];
                                                                            $nombre_rep = $repartidor_final['nombres'];
                                                                            $ap_paterno_rep = $repartidor_final['ap_paterno'];
                                                                            $ap_materno_rep = $repartidor_final['ap_materno'];
                                                                            $email_rep = $repartidor_final['email'];
                                                                            ?>
                                                                            <?php echo $nombre_rep." ".$ap_paterno_rep." ".$ap_materno_rep;?>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </center>
                                                            <?php
                                                        }else{
                                                           // echo "ya esta asignado";
                                                                $query_repartidor_asig = $pdo->prepare("SELECT * FROM tb_usuarios WHERE cargo = 'REPARTIDOR' AND id='$id_repartidor_asignado' AND estado ='1' ");
                                                                $query_repartidor_asig->execute();
                                                                $repartidores_asignados = $query_repartidor_asig->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($repartidores_asignados as $repartidores_asignado) {

                                                                    $nombre_rep_asig = $repartidores_asignado['nombres'];
                                                                    $ap_paterno_rep_asin = $repartidores_asignado['ap_paterno'];
                                                                    $ap_materno_rep_asig = $repartidores_asignado['ap_materno'];
                                                                    $email_rep_asig = $repartidores_asignado['email'];
                                                                    ?>
                                                                    <center>
                                                                        Repartidor Asignado es<br>
                                                                        <button class="btn btn-info btn-sm"> <i class="fa fa-motorcycle"></i>
                                                                              <?php echo $nombre_rep_asig." ".$ap_paterno_rep_asin." ".$ap_materno_rep_asig;?>
                                                                        </button>
                                                                        <a href="controller_borrar_asignacion_repartidor.php?id_r=<?php echo $id_repartidor_asignado;?>&&id_p=<?php echo $id_pedidos;?>"
                                                                           class="btn btn-danger btn-xs">
                                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                                                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                                                            </svg>
                                                                            Cambiar a otro Motoquero
                                                                        </a>
                                                                    </center>
                                                                    <?php
                                                                }
                                                        }

                                                        ?>


                                                    </td>
                                                    <td>
                                                        <?php echo $estado_pedido;?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                            <!-- <tfoot>
                                                 <tr>
                                                     <th>Rendering engine</th>
                                                     <th>Browser</th>
                                                     <th>Platform(s)</th>
                                                     <th>Engine version</th>
                                                     <th>CSS grade</th>
                                                 </tr>
                                             </tfoot>-->
                                        </table>

                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><span class="fa fa-map-marked-alt"></span> Delivery de Pedidos </h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <table id="example2" class="table table-bordered table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Repartidores</th>
                                                <th>Celular</th>
                                                <th>Correo</th>
                                                <th>Pedidos Asignados</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $contador_de_repartidores = 0;
                                            $query_repartidor_delivery = $pdo->prepare("SELECT * FROM tb_usuarios WHERE cargo='REPARTIDOR' AND estado ='1' ORDER BY id DESC ");
                                            $query_repartidor_delivery->execute();
                                            $repartidor_deliverys = $query_repartidor_delivery->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($repartidor_deliverys as $repartidor_delivery) {
                                                $contador_de_repartidores = $contador_de_repartidores + 1;
                                                $id_de_repartidor = $repartidor_delivery['id'];
                                                $nombre_de_repartidores = $repartidor_delivery['nombres'];
                                                $ap_paterno_de_repartidores = $repartidor_delivery['ap_paterno'];
                                                $ap_materno_de_repartidores = $repartidor_delivery['ap_materno'];
                                                $celular_de_repartidores = $repartidor_delivery['celular'];
                                                $correo_de_repartidores = $repartidor_delivery['email'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $contador_de_repartidores;?></td>
                                                    <td><?php echo $nombre_de_repartidores." ".$ap_paterno_de_repartidores." ".$ap_materno_de_repartidores;?></td>
                                                    <td><?php echo $celular_de_repartidores;?></td>
                                                    <td><?php echo $correo_de_repartidores;?></td>
                                                    <td>
                                                        <?php
                                                        $contador_de_pedidos_asig = 0;
                                                        $query_repartidor_delivery_p = $pdo->prepare("SELECT * FROM tb_pedidos WHERE id_repartidor_asignado='$id_de_repartidor' AND estado ='1' ORDER BY id_pedido DESC ");
                                                        $query_repartidor_delivery_p->execute();
                                                        $repartidor_deliverys_pedidos = $query_repartidor_delivery_p->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($repartidor_deliverys_pedidos as $repartidor_deliverys_pedido) {
                                                             $id_delivery_pedido = $repartidor_deliverys_pedido['id_pedido'];
                                                             $estado_pedido_delivery = $repartidor_deliverys_pedido['estado_pedido'];

                                                             if($estado_pedido_delivery == "ASIGNADO"){ ?>
                                                                 <button class="btn btn-info btn-xs">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     Pedido Nro | <?php echo $id_delivery_pedido." | ".$estado_pedido_delivery;?>
                                                                 </button><br>
                                                                 <?php
                                                             }

                                                            if($estado_pedido_delivery == "PEDIDO TOMADO"){ ?>
                                                                <button class="btn btn-danger btn-xs">
                                                                    <i class="fa fa-check-circle"></i>
                                                                    Pedido Nro | <?php echo $id_delivery_pedido." | ".$estado_pedido_delivery;?>
                                                                </button><br>
                                                                <?php
                                                            }
                                                             ?>
                                                             <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                            <!-- <tfoot>
                                                 <tr>
                                                     <th>Rendering engine</th>
                                                     <th>Browser</th>
                                                     <th>Platform(s)</th>
                                                     <th>Engine version</th>
                                                     <th>CSS grade</th>
                                                 </tr>
                                             </tfoot>-->
                                        </table>

                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('../../layout/footer.php');?>
    </div>
    <?php //include('../../layout/footer_link.php');?>
    <!-- jQuery -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable( {
                "responsive": true,
                "autoWidth": false,
                "pageLength": 5,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Pedidos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Pedidos",
                    "infoFiltered": "(Filtrado de _MAX_ total Pedidos)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Pedidos",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador de Pedidos:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    </body>
    </html>
    <?php
}else{
    header("Location: $URL/login");
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Cliente</label>
                    <input type="text" class="form-control">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Celular</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Referencia</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Diirección</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>