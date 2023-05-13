<?php
/**
 */

include('../../app/config/config.php');

$id_pedido = $_GET['id_p'];
$email_r = $_GET['email_r'];

$estado_pedido = 'PEDIDO FINALIZADO';

$sentencia = $pdo->prepare("UPDATE tb_pedidos SET estado_pedido ='$estado_pedido' WHERE id_pedido='$id_pedido' ");
if($sentencia->execute()){
    //header("Location: ".$URL."/web/pedidos/");
    //  echo "se actualizo correctamente el pedido";

    $estado_delivery = "LIBRE";
    $sentencia2 = $pdo->prepare("UPDATE tb_ubicacion SET estado_delivery ='$estado_delivery' WHERE email='$email_r' ");
    if($sentencia2->execute()){
        header("Location: ".$URL."/sistema_movil/app/pedidos.php?email=".$email_r);
        //   echo "se actualizo correctamente la ubicacion";
    }else{
        //echo "No se pudo actualizar ";
        echo "no se pudo actualizar la ubicacion, comuniquese con el encargado del sistema. Gracias";
    }

}else{
    //echo "No se pudo actualizar ";
    echo "no se pudo tomar el pedido, comuniquese con el encargado del sistema. Gracias";
}
