<?php
include('../../app/config/config.php');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Delivery</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Site Icons -->
    <!-- <link rel="shortcut icon" href="<?php //echo $URL;
                                            ?>/public/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php //echo $URL;
                                        ?>/public/apple-touch-icon.png"> -->
</head>

<body class="hold-transition login-page" style="background: #ffffff">
    <div class="login-box">
        <div class="login-logo">
            <center>
                <img src="https://i.imgur.com/4uwAKk9.png" width="300px" alt=""> <br>
                <b>Delivery </b>
            </center>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sistema de Acceso</p>

                <form action="validar_usuario.php" method="post" onsubmit="return validarFormulario()">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                            <br>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $URL; ?>/app/templeates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

    <script>
        function validarFormulario() {
            var txtEmail = document.getElementById('email').value;
            var txtPassword = document.getElementById('password').value;
            //Test email
            if (txtEmail == null || txtEmail.length == 0 || /^\s+$/.test(txtEmail)) {
                alert('ERROR: El campo email no debe ir vacío');
                return false;
            }
            //Test password
            if (txtPassword == null || txtPassword.length == 0 || /^\s+$/.test(txtPassword)) {
                alert('ERROR: El campo de contraseña no debe ir vacío');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>