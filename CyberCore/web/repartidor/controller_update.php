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

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET nombres='$nombres',ap_paterno='$ap_paterno',ap_materno='$ap_materno',rut='$rut',fecha_nacimiento='$fecha_nacimiento',sexo='$sexo',celular='$celular',cargo='$cargo',password='$password', fyh_actualizacion='$fechaHora' WHERE email='$email' ");
//print_r($sentencia);
if($sentencia->execute()){
    header("Location: ".$URL."/web/repartidor/");
}else{
//echo "No se pudo actualizar ";
    echo "no se puede eliminar, comuniquese con el encargado del sistema. Gracias";
}
