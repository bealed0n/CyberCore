<?php
/**
 */
include('../../app/config/config.php');

$id_pedido = $_GET['id_p'];
$email_r = $_GET['email_r'];

$costo_total = 0;

$query_pedidos = $pdo->prepare("SELECT * FROM tb_pedidos WHERE id_pedido = '$id_pedido' AND estado ='1' ");
$query_pedidos->execute();
$pedidos = $query_pedidos->fetchAll(PDO::FETCH_ASSOC);
foreach ($pedidos as $pedido) {
    $id_pedidos_p = $pedido['id_pedido'];
    $cliente = $pedido['nombre_cliente'];
    $rut_cliente = $pedido['rut_cliente'];
    $celular_cliente = $pedido['celular_cliente'];
    $celular_referencia_cliente = $pedido['celular_referencia_cliente'];
    $email_cliente = $pedido['email_cliente'];
    $direccion_cliente = $pedido['direccion_cliente'];
    $id_direccion_cliente = $pedido['id_direccion_cliente'];
    $costo_pedido = $pedido['costo_pedido'];
    $costo_delivery = $pedido['costo_delivery'];
    $obs = $pedido['obs'];
    $tipo_pedido = $pedido['tipo_pedido'];
    $id_carrito = $pedido['id_carrito'];
    $id_repartidor_asignado = $pedido['id_repartidor_asignado'];
    $estado_pedido = $pedido['estado_pedido'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('../../layout/head.php');?>
    <title>Delivery - MUSIC PRO</title>
</head>
<body>
<br>
<div class="container">
    <div class="">
        <h5>
            <i class="fa fa-user" style="color: #00558F"></i>
            <b style="color: #00558F"> Datos del Cliente</b>
        </h5>
        <hr>
        <p>
            <b>Cliente:</b> <?php echo $cliente;?> <br>
            <b>RUT:</b> <?php echo $rut_cliente;?> <br>
            <b>Celular:</b> <?php echo $celular_cliente;?> <br>
            <b>Cel. de referencia:</b> <?php echo $celular_referencia_cliente;?> <br>
            <b>Email del Cliente:</b> <?php echo $email_cliente;?> <br>
            <b>Tipo de Pedido:</b> <?php echo $tipo_pedido;?> <br>
        <hr>
        <h5>
            <i class="fa fa-map-marked-alt" style="color: #00558F"></i>
            <b style="color: #00558F"> Dirección de Entrega</b>
        </h5>
        <hr>
            <?php
            if($id_direccion_cliente == "")
            {
                echo "<b>Dirección del Cliente:</b>".$direccion_cliente."<br>";
            }
            ?>
        <hr>
    
        <span>
            <i class="fa fa-money-bill" style="color: #00558F"></i>
            <b style="color: #00558F">Costo del Pedido: <span style="font-size: 25px">$<?php echo $costo_pedido;?></span></b>
        </span>
        <br>
        <span>
            <i class="fa fa-motorcycle" style="color: #00558F"></i>
            <b style="color: #00558F">Costo del Delivery: <span style="font-size: 25px">$<?php echo $costo_delivery;?></span></b>
        </span>
        <hr>
        <span>
            <b style="color: #00558F">Costo Total: <span style="font-size: 25px">$<?php echo $costo_total = $costo_pedido + $costo_delivery;?></span></b>
        </span>
        <br><br>
        <?php
        if($obs == ""){

        }else{
            ?>
            <span>
                <b>Obs. </b><?php echo $obs;?>
            </span><br>
            <?php
        }
        ?>

        <br>

        <?php
        if($estado_pedido == "ASIGNADO"){ ?>
            <a href="controller_tomar_pedido.php?id_p=<?php echo $id_pedidos_p;?>&&email_r=<?php echo $email_r;?>" class="btn btn-primary btn-block btn-lg">
                <i class="fa fa-motorcycle"></i> Tomar pedido
            </a>
            <?php
        }
        if($estado_pedido == "PEDIDO TOMADO"){ ?>
            <a href="controller_finalizar_pedido.php?id_p=<?php echo $id_pedidos_p;?>&&email_r=<?php echo $email_r;?>"
               class="btn btn-danger btn-block btn-lg">
                <i class="fa fa-motorcycle"></i> FINALIZAR PEDIDO
            </a>
        <?php
        }
        ?>


        <br><br>

        </p>
    </div>
</div>
</body>
<?php include('../../layout/footer_link.php');?>
</html>
