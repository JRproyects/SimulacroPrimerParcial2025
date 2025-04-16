<?php
include "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/Practica_Primer_Parcial_1/ClaseCliente.php";
include "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/Practica_Primer_Parcial_1/ClaseAuto.php";
include "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/Practica_Primer_Parcial_1/ClaseAlquiler.php";
include "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/Practica_Primer_Parcial_1/ClaseAlquilerEmpresa.php";

$auto1 = new Auto("BLX704", "ford", "escort", 1998, 18000, true);
$auto2 = new Auto("PJJ448", "renault", "Duster", 2015, 35000, true);
$cliente1 = new Cliente("joaquin", "Ruiz", "DNI", 45028145, true);
$cliente2 = new Cliente("miguel", "Ruiz", "DNI", 23045050, true);

$empresa = new AlquilerEmpresa("Alquiladora S.A.", "Av. Siempre Viva 123", [], [], []);

$empresa->agregarCliente($cliente1);
$empresa->agregarAuto($auto1);

$alquiler = $empresa->registrarAlquiler($cliente1, $auto1, 3, "2025-04-11");

echo $empresa . PHP_EOL;
echo $alquiler . PHP_EOL;
