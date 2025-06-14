<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Empresa</title>
</head>
<body>
    <h2>Agregar Nueva Empresa</h2>
    <form action="insertar_empresa.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Dirección:</label>
        <input type="text" name="direccion" required><br><br>

        <input type="submit" value="Agregar Empresa">
    </form>
</body>
</html>
