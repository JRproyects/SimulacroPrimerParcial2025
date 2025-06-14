<?php
$conexion = new mysqli("localhost", "root", "", "bdviajes");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$destino = $_POST['destino'] ?? null;
$maxPasajeros = $_POST['maxPasajeros'] ?? null;
$importe = $_POST['importe'] ?? null;
$idempresa = $_POST['idempresa'] ?? null;
$idresponsable = $_POST['idresponsable'] ?? null;

if ($destino && $maxPasajeros && $importe && $idempresa && $idresponsable) {
    $stmt = $conexion->prepare(
        "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("siiid", $destino, $maxPasajeros, $idempresa, $idresponsable, $importe);

    if ($stmt->execute()) {
        echo "Viaje agregado correctamente.";
    } else {
        echo "Error al insertar viaje: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Faltan datos.";
}

$conexion->close();
?>
