<?php

/**
 */

include('../../app/config/config.php');

$nombres = $_POST['nombres'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$rut = $_POST['rut'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$password = $_POST['password'];
$cargo = $_POST['cargo'];

// Generar el hash de la contraseña
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

date_default_timezone_set("America/Santiago");

$estado = "1";

$nombre_completo = $nombres . " " . $ap_paterno . " " . $ap_materno;

$email_tabla = '';
$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email ='$email' AND estado ='1' ");
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $email_tabla = $usuario['email'];
}
if ((($email) == ($email_tabla))) {
    echo "<h1>Este usuario ya existe, Revise la lista de Repartidores</h1>";
} else {
    //echo "usuario nuevo listo para trabajar";
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
    ( nombres, ap_paterno, ap_materno, rut, fecha_nacimiento, sexo, celular, email, password, cargo, estado) 
VALUES(:nombres,:ap_paterno,:ap_materno,:rut,:fecha_nacimiento,:sexo,:celular,:email,:password,:cargo,:estado)");

    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':ap_paterno', $ap_paterno);
    $sentencia->bindParam(':ap_materno', $ap_materno);
    $sentencia->bindParam(':rut', $rut);
    $sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $sentencia->bindParam(':sexo', $sexo);
    $sentencia->bindParam(':celular', $celular);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $hashedPassword);
    $sentencia->bindParam(':cargo', $cargo);
    $sentencia->bindParam(':estado', $estado);

    if ($sentencia->execute()) {
        header("Location:" . $URL . "/web/repartidor");
        echo "se registro correctamente a la base de datos";
    } else {
        echo "No se pudo registrar";
    }
}
