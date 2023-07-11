<?php

/**
 */

include('../../app/config/config.php');

$id_pedido = $_GET['id_p'];
$email_r = $_GET['email_r'];

$estado_pedido = 'PEDIDO TOMADO';

$sentencia = $pdo->prepare("UPDATE tb_pedidos SET estado_pedido = :estado_pedido WHERE id_pedido = :id_pedido");
$sentencia->bindParam(':estado_pedido', $estado_pedido);
$sentencia->bindParam(':id_pedido', $id_pedido);

if ($sentencia->execute()) {
    header("Location: $URL/sistema_movil/app/pedidos.php");
    exit();
} else {
    echo "No se pudo tomar el pedido, comuníquese con el encargado del sistema. Gracias";
}
