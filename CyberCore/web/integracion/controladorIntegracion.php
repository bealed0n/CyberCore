<?php
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
