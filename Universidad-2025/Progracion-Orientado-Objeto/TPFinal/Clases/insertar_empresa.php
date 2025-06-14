<?php
$conexion = new mysqli("localhost", "root", "", "bdviajes");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'] ?? null;
$direccion = $_POST['direccion'] ?? null;

if ($nombre && $direccion) {
    $stmt = $conexion->prepare("INSERT INTO empresa (enombre, edireccion) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $direccion);

    if ($stmt->execute()) {
        echo "Empresa agregada correctamente.";
    } else {
        echo "Error al insertar empresa: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Faltan datos.";
}

$conexion->close();
?>
