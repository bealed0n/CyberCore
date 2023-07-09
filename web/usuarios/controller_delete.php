<?php
/**
 */
include('../../app/config/config.php');

$email = $_GET['email'];

date_default_timezone_set("America/Santiago");
$estado = '0';

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET estado='$estado' WHERE email='$email' ");
if($sentencia->execute()){
    header("Location: ".$URL."/web/usuarios/");
}else{
//echo "No se pudo actualizar ";
    echo "no se puede eliminar, comuniquese con el encargado del sistema. Gracias";
}
