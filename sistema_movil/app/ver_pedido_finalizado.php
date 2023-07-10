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
    $cliente_origen = $pedido['nombre_origen'];
    $direccion_origen = $pedido['direccion_origen'];
    $celular_origen = $pedido['celular_origen'];
    $celular_destino = $pedido['celular_destino'];
    $direccion_destino = $pedido['direccion_destino'];
    $nombre_destino = $pedido['nombre_destino'];
    $obs = $pedido['obs'];
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
            <b style="color: #00558F"> Datos de origen</b>
        </h5>
        <hr>
        
        <p>
            <b>Cliente de origen:</b> <?php echo $cliente_origen;?> <br>
            <b>Celular de origen:</b> <?php echo $celular_origen;?> <br>
            <hr>
            <h5>
            <i class="fa fa-user" style="color: #00558F"></i>
            <b style="color: #00558F"> Datos de destino</b>
        </h5>
            <b>Cliente destinatario:</b> <?php echo $nombre_destino;?> <br>
            <b>Celular destinatario:</b> <?php echo $celular_destino;?> <br>
        <hr>

        <h5>
            <i class="fa fa-map-marked-alt" style="color: #00558F"></i>
            <b style="color: #00558F"> Detalle de pedido de Pedido</b>
        </h5>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-xs table-condensed" style="font-size: 12px">
                <th style="background: #c0c0c0">Nro</th>
                <th style="background: #c0c0c0">Nombre remitente</th>
                <th style="background: #c0c0c0">Direccion de origen</th>
                <th style="background: #c0c0c0">Celular de origen</th>
                <th style="background: #c0c0c0">Nombre de destino</th>
                <th style="background: #c0c0c0">Direccion de destino</th>
                <th style="background: #c0c0c0">Numero de destino</th>
                    <tr>
                        <td><center><?php echo $id_pedido;?></center></td>
                        <td><?php echo $nombre_destino;?></td>
                        <td><?php echo $direccion_destino;?></td>
                        <td><center><?php echo $celular_destino;?></center></td>
                        <td><center><?php echo $nombre_destino;?></center></td>
                        <td><center><?php echo $direccion_destino;?></center></td>
                        <td><center><?php echo $celular_destino;?></center></td>
                    </tr>
                    <?php
                
                ?>
            </table>
        </div>
        
        <hr>
        
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
        <hr>
        <br>

        <button
           class="btn btn-danger btn-block btn-lg" disabled="">
            <i class="fa fa-motorcycle"></i> PEDIDO ENTREGADO
        </button>


        <br><br>

        </p>
    </div>
</div>
</body>
<?php include('../../layout/footer_link.php');?>
</html>
