<?php
$host = "localhost";
$user = "root"; // Ajusta según tu configuración
$password = "";
$dbname = "bdviajes";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}
?>