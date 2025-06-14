<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Viaje</title>
</head>
<body>
    <h2>Agregar Nuevo Viaje</h2>
    <form action="insertar_viaje.php" method="POST">
        <label>Destino:</label>
        <input type="text" name="destino" required><br><br>

        <label>Cantidad Máxima de Pasajeros:</label>
        <input type="number" name="maxPasajeros" required><br><br>

        <label>Importe:</label>
        <input type="number" step="0.01" name="importe" required><br><br>

        <label>ID Empresa:</label>
        <input type="number" name="idempresa" required><br><br>

        <label>ID Responsable:</label>
        <input type="number" name="idresponsable" required><br><br>

        <input type="submit" value="Agregar Viaje">
    </form>
</body>
</html>
