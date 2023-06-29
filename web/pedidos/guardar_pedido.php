<?php

// Verificar si se recibieron los datos del formulario
if (isset($_POST['nombreOrigen']) && isset($_POST['direccionOrigen']) && isset($_POST['celularOrigen']) && isset($_POST['nombreDestino']) && isset($_POST['direccionDestino']) && isset($_POST['celularDestino']) && isset($_POST['obs'])) {
    // Obtener los valores del formulario
    $nombreOrigen = $_POST['nombreOrigen'];
    $direccionOrigen = $_POST['direccionOrigen'];
    $celularOrigen = $_POST['celularOrigen'];
    $nombreDestino = $_POST['nombreDestino'];
    $direccionDestino = $_POST['direccionDestino'];
    $celularDestino = $_POST['celularDestino'];
    $tipoPedido = $_POST['tipoPedido'];
    $obs = $_POST['obs'];

    // Realizar la conexión a la base de datos (reemplaza los valores con tus propias credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cybercore";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Generar un código de seguimiento aleatorio de 15 caracteres numéricos
    $codigoSeguimiento = generateRandomNumericCode(15);

    // Preparar la consulta SQL para insertar los datos en la tabla correspondiente
    $sql = "INSERT INTO tb_pedidos (nombre_origen, direccion_origen, celular_origen, nombre_destino, direccion_destino, celular_destino, tipo_pedido, obs, estado_pedido, estado, codigo_seguimiento) 
    VALUES ('$nombreOrigen', '$direccionOrigen', '$celularOrigen', '$nombreDestino', '$direccionDestino', '$celularDestino', '$tipoPedido', '$obs', 'PREPARANDO', '1', '$codigoSeguimiento')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        // La inserción fue exitosa
        echo "El pedido se ha registrado exitosamente.";
    } else {
        // Ocurrió un error al ejecutar la consulta
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // No se recibieron los datos esperados
    echo "Error: Datos del formulario incompletos.";
}

// Función para generar un código de seguimiento aleatorio de longitud especificada
function generateRandomNumericCode($length) {
    $code = "";
    $characters = "0123456789";
    $charactersLength = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, $charactersLength - 1)];
    }

    return $code;
}
?>
