<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el mensaje de saludo de la API
    $response = file_get_contents('https://music-pro.test/api/v1/test/saludo');
    $saludo = json_decode($response)->message;

    // Guardar el saludo en la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cybercore";

    // Crear una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si hay errores de conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar el saludo en la tabla
    $sql = "INSERT INTO saludos (mensaje) VALUES ('$saludo')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "El saludo se ha guardado correctamente en la base de datos.";
    } else {
        echo "Error al guardar el saludo en la base de datos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Integración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        .button-container {
            text-align: center;
        }

        .button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0F2137;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Integraciones</h1>
        <div class="message">
            <?php if (!empty($saludo)): ?>
                <p id="saludo"><?php echo $saludo; ?></p>
            <?php endif; ?>
        </div>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="button-container">
                <button class="button" type="submit">Obtener Saludo y Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>

