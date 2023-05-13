<?php
/**

 */
include('../../app/config/config.php');


$id_pedido = $_GET['id_p'];
$id_repartidor = $_GET['id_m'];

$estado_pedido = 'ASIGNADO';

$email_repartidor = '';
$query_repartidor = $pdo->prepare("SELECT * FROM tb_usuarios WHERE cargo = 'REPARTIDOR' AND id='$id_repartidor' AND estado ='1' ");
$query_repartidor>execute();
$repartidores = $query_repartidor->fetchAll(PDO::FETCH_ASSOC);
foreach ($repartidores as $repartidor) {
    $id_rep = $repartidor['id'];
    $email_repartidor = $repartidor['email'];
}

//echo $id_pedido." - ".$id_repartidor;


$sentencia = $pdo->prepare("UPDATE tb_pedidos SET id_repartidor_asignado='$id_repartidor', estado_pedido='$estado_pedido' WHERE id_pedido='$id_pedido' ");
if($sentencia->execute()){
    header("Location: ".$URL."/web/pedidos/");
   // echo "se actualizo correctamente";
}else{
//echo "No se pudo actualizar ";
    echo "no se puede eliminar el objetivo, comuniquese con el encargado del sistema. Gracias";
}

