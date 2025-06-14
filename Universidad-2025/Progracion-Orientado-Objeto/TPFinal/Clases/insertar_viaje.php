<?php
$conexion = new mysqli("localhost", "root", "", "bdviajes");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Valores de ejemplo
$destino = "Bariloche";
$cantMax = 40;
$idempresa = 1; // debe existir en la tabla empresa
$rnumero = 1;   // debe existir en la tabla responsable
$importe = 20000.50;

$sql = "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) 
        VALUES ('$destino', $cantMax, $idempresa, $rnumero, $importe)";

if ($conexion->query($sql) === TRUE) {
    echo "Viaje insertado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
