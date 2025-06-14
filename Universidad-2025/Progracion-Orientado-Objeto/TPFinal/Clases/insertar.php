<?php
require_once("conexion.php");

$destino = $_POST['destino'];
$cant = $_POST['cantidad'];
$idempresa = $_POST['empresa'];
$rnumero = $_POST['responsable'];
$importe = $_POST['importe'];

$sql = "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte)
        VALUES ('$destino', $cant, $idempresa, $rnumero, $importe)";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php?success=1");
} else {
    echo "Error: " . $conn->error;
}
?>
