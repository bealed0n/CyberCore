<?php
/**

 */

include('../../app/config/config.php');


$id_pedido = $_GET['id_p'];
$id_repartidor = $_GET['id_r'];

$id_r = '';
$estado_pedido = 'LIBRE';

$sentencia = $pdo->prepare("UPDATE tb_pedidos SET id_repartidor_asignado='$id_r', estado_pedido='$estado_pedido' WHERE id_pedido='$id_pedido' ");
if($sentencia->execute()){
    header("Location: ".$URL."/web/pedidos/");
    //echo "se actualizo correctamente";
}else{
//echo "No se pudo actualizar ";
    echo "no se puede eliminar, comuniquese con el encargado del sistema. Gracias";
}
