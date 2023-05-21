<?php
include('../../app/config/config.php');

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

    <!DOCTYPE html >
    <html>
    <head>
        <?php include('../../layout/head.php');?>
        <title>Delivery</title>
        <style type="text/css">
            body { font: normal 10pt Helvetica, Arial; }
            #map { width: 100%; height: 500px; border: 0px; padding: 0px; }
        </style>
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


                        <br><br><br>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><span class="fa fa-motorcycle"></span> Delivery MUSIC PRO</h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-sm">
                                            <th><b>Nº</b></th>
                                            <th><b>Repartidor</b></th>
                                            <th><b>Delivery</b></th>
                                            <th><b>Pedido</b></th>
                                            <?php
                                            $cont_r = 0;
                                            $query2 = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado ='1' AND cargo = 'Repartidor' ");
                                            $query2->execute();
                                            $vehiculo = $query2->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($vehiculo as $vehiculo) {
                                                $id_r = $vehiculo['id'];
                                                $ap_paterno_r = $vehiculo['ap_paterno'];
                                                $ap_materno_r = $vehiculo['ap_materno'];
                                                $nombres_r = $vehiculo['nombres'];
                                                $cont_r = $cont_r + 1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $cont_r;?></td>
                                                    <td><?php echo $nombres_r." ".$ap_paterno_r." ".$ap_materno_r;?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

    </body>
    </html>

    <?php
}else{
    header("Location: $URL/login");
}
?>




