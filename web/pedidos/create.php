<?php
include('../../app/config/config.php');

session_start();
if (isset($_SESSION['u_usuario'])) {
    $user = $_SESSION['u_usuario'];

    $query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = :user AND estado = '1'");
    $query->bindParam(':user', $user);
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
    $activePage = 'pedidos';
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include('../../layout/head.php');?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <title>Transporte | CyberCore</title>
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
                                <?php
                                $contar_pedido = 1;
                                $query_pedido = $pdo->prepare("SELECT * FROM tb_pedidos WHERE estado = '1'");
                                $query_pedido->execute();
                                $pedidos = $query_pedido->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($pedidos as $pedido) {
                                    $contar_pedido = $contar_pedido + 1;
                                }
                                ?>
                                <h3 class="card-title">
                                    <span class="fa fa-store"></span>
                                    Pedido <input type="text" style="text-align: center;width: 150px" value="<?php echo $contar_pedido; ?>" disabled>
                                    <input type="text" id="id_pedido" value="<?php echo $contar_pedido; ?>" hidden>
                                </h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-condensed table-bordered table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th style="background: #c0c0c0"><b>Nombre remitente</b></th>
                                                        <th style="background: #c0c0c0"><b>Direccion remitente</b></th>
                                                        <th style="background: #c0c0c0"><b>Celular remitente</b></th>
                                                        <th style="background: #c0c0c0" colspan="2"><b>Nombre destinatario</b></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control" id="nombre_origen_2"></td>
                                                        <td><input type="text" class="form-control" id="direccion_origen_2"></td>
                                                        <td><input type="text" class="form-control" id="celular_origen_2"></td>
                                                        <td colspan="2"><input type="text" class="form-control" id="nombre_destino"></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="background: #c0c0c0" colspan="2">Dirección destinatario </th>
                                                        <th style="background: #c0c0c0">Celular destinatario </th>
                                                        <th style="background: #c0c0c0">Tipo de pedido</th>
                                                        <th style="background: #c0c0c0">obs</th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <input type="text" id="direccion_destinatario" class="form-control">
                                                            <input type="text" id="id_direccion_p_2" hidden>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="celular_destino">
                                                        </td>
                                                        <td>
                                                            <select class="form-control" id="tipo_pedido">
                                                                <option value="SUCURSAL">SUCURSAL</option>
                                                                <option value="BODEGA">BODEGA</option>
                                                                <option value="INTERNO">INTERNO</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="obs">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <button class="btn btn-primary btn-lg" id="btn_registrar_pedido" onclick="registrarPedido()">
                            Registrar Pedido
                        </button>
                        <!-- create button for clean forms -->
                        <button class="btn btn-danger btn-lg" onclick="resetForm()">
                            Limpiar Formulario

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
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        function registrarPedido() {
            var nombreOrigen = document.getElementById('nombre_origen_2').value;
            var direccionOrigen = document.getElementById('direccion_origen_2').value;
            var celularOrigen = document.getElementById('celular_origen_2').value;
            var nombreDestino = document.getElementById('nombre_destino').value;
            var direccionDestino = document.getElementById('direccion_destinatario').value;
            var celularDestino = document.getElementById('celular_destino').value;
            var tipoPedido = document.getElementById('tipo_pedido').value;
            var obs = document.getElementById('obs').value;

            // Validar que los campos obligatorios estén llenos
            if (nombreOrigen && direccionOrigen && celularOrigen && nombreDestino && direccionDestino && celularDestino && tipoPedido && obs) {
                // Hacer la solicitud AJAX para guardar los datos en la base de datos
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        // Respuesta del servidor
                        alert('El pedido se ha registrado exitosamente.');
                        // Limpiar los campos del formulario
                        resetForm()
                    }
                };
                xhttp.open("POST", "<?php echo $URL; ?>/web/pedidos/guardar_pedido.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("nombreOrigen=" + nombreOrigen + "&direccionOrigen=" + direccionOrigen + "&celularOrigen=" + celularOrigen + "&nombreDestino=" + nombreDestino + "&direccionDestino=" + direccionDestino + "&celularDestino=" + celularDestino + "&tipoPedido=" + tipoPedido + "&obs=" + obs);
            } else {
                alert('Por favor, complete todos los campos obligatorios.');
            }
        }
        //Funcion que permite limpiar los campos del formulario
        function resetForm() {
            document.getElementById('nombre_origen_2').value = '';
            document.getElementById('direccion_origen_2').value = '';
            document.getElementById('celular_origen_2').value = '';
            document.getElementById('nombre_destino').value = '';
            document.getElementById('direccion_destinatario').value = '';
            document.getElementById('celular_destino').value = '';
            document.getElementById('obs').value = '';
        }
    </script>
    </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}
?>
