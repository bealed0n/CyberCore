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
$new_password = $_POST['password'];

// Generar el hash de la contraseña
$password = password_hash($new_password, PASSWORD_DEFAULT);

date_default_timezone_set("America/Santiago");

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET nombres='$nombres',ap_paterno='$ap_paterno',ap_materno='$ap_materno',rut='$rut',fecha_nacimiento='$fecha_nacimiento',sexo='$sexo',celular='$celular',password='$password' WHERE email='$email' ");

if ($sentencia->execute()) {
    header("Location: ".$URL."/web/usuarios/");
} else {
    echo "No se pudo actualizar. Comuníquese con el encargado del sistema. Gracias.";
}
