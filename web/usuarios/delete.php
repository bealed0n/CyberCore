<?php include('../../app/config/config.php');

$id_usuario = $_GET['id'];

session_start();
if(isset($_SESSION['u_usuario'])) {
    $user = $_SESSION['u_usuario'];
    echo "session de ".$user; ///////////para comprobar sesion

    $query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$user' AND estado ='1'");
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_s = $usuario['id'];
        $ap_paterno_s = $usuario['ap_paterno'];
        $ap_materno_s= $usuario['ap_materno'];
        $nombres_s = $usuario['nombres'];
        $rut_s = $usuario['rut'];
        $cargo_s = $usuario['cargo'];
        $foto_perfil_s = $usuario['foto_perfil'];
    }
    $activePage = 'usuarios';
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include('../../layout/head.php');?>
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
                        <center><h3>¿Esta seguro de borrar a este usuario?</h3></center>
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><span class="fa fa-users"></span> Borrar  usuario</h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <?php
                                $query2 = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id = '$id_usuario' AND estado ='1'");
                                $query2->execute();
                                $datos = $query2->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($datos as $dato) {
                                    $id_usuario_d = $dato['id'];
                                    $nombres = $dato['nombres'];
                                    $ap_paterno = $dato['ap_paterno'];
                                    $ap_materno = $dato['ap_materno'];
                                    $fecha_nacimiento = $dato['fecha_nacimiento'];
                                    $celular = $dato['celular'];
                                    $rut = $dato['rut'];
                                    $email = $dato['email'];
                                    $password = $dato['password'];
                                    $sexo = $dato['sexo'];
                                }
                                ?>
                                <?php
                                // Obtener el hash de la contraseña actual almacenada en la base de datos
                                $query3 = $pdo->prepare("SELECT password FROM tb_usuarios WHERE id = '$id_usuario'");
                                $query3->execute();
                                $hashPassword = $query3->fetchColumn();
                                ?>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <input type="text" class="form-control" name="nombres" value="<?php echo $nombres;?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Apellido Materno</label>
                                                <input type="text" class="form-control" name="ap_materno" value="<?php echo $ap_materno; ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento;?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Celular</label>
                                                <input type="text" class="form-control" name="celular" value="<?php echo $celular;?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Correo Electronico</label>
                                                <input type="email" class="form-control" value="<?php echo $email; ?>" disabled>
                                                <input type="email" name="email" value="<?php echo $email; ?>" hidden>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Apellido Paterno</label>
                                                <input type="text" class="form-control" name="ap_paterno" value="<?php echo $ap_paterno;?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Rut</label>
                                                <input type="text" class="form-control" name="rut" value="<?php echo $rut;?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Sexo</label>
                                                <?php
                                                if($sexo == "MASCULINO"){?>
                                                    <select name="sexo" id="" CLASS="form-control" disabled>
                                                        <option value="<?php echo $sexo;?>"><?php echo $sexo;?></option>
                                                        <option value="FEMENINO">FEMENINO</option>
                                                    </select>
                                                <?php } ?>
                                                <?php
                                                if($sexo == "FEMENINO"){?>
                                                    <select name="sexo" id="" CLASS="form-control" disabled>
                                                        <option value="<?php echo $sexo;?>"><?php echo $sexo;?></option>
                                                        <option value="MASCULINO">MASCULINO</option>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cargo</label>
                                                <select name="cargo" id="" CLASS="form-control" disabled>
                                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input disabled type="password" class="form-control" name="password" value="">
                                                <input type="hidden" name="existing_password" value="<?php echo $hashPassword; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="<?php echo $URL;?>/web/usuarios" class="btn btn-default btn-lg">Cancelar</a>
                                    <a href="controller_delete.php?email=<?php echo $email;?>" class="btn btn-danger btn-lg">Borrar Usuario</a>
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
    <?php include('../../layout/footer_link.php');?>
    </body>
    </html>
    <?php
}else{
    header("Location: $URL/login");
}
?>