<?php
include "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/TPobligatorio/Universidad-2025/Primer_Parcial/ClasePersona.php";
include "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/TPobligatorio/Universidad-2025/Primer_Parcial/ClaseVuelos.php";
include "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/TPobligatorio/Universidad-2025/Primer_Parcial/ClaseAerolineas.php";
include "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/TPobligatorio/Universidad-2025/Primer_Parcial/ClaseAeropuerto.php";

$coleccionVuelos1 = [];
$coleccionVuelos2 = [];

$aerolinea1 = new Aerolineas("CCQ563", "SOL", []);
$aerolinea2 = new Aerolineas("AME11", "American Jet", []);
$encargado = new Persona("joaquin", "ruiz", "nqn capital", "rj45redd@gmail.com", 2994567489);
$vuelo1 = new Vuelos(112, 1832, "1/04/25", "mendoza", "18:40", "19:30", 145, 180, $encargado);
$vuelo2 = new Vuelos(113, 1200, "10/04/25", "usa", "18:40", "23:30", 175, 180, $encargado);
$vuelo3 = new Vuelos(14, 1500, "12/05/25", "colombia", "6:40", "9:30", 155, 180, $encargado);
$vuelo4 = new Vuelos(115, 1112, "9/12/25", "madrid", "0:00", "3:01", 125, 180, $encargado);

$aeropuerto = new Aeropuerto("Aeropuerto Manuel Belgrano(allen)", "Allen a las afuera", [$aerolinea1, $aerolinea2]);
echo $aeropuerto;
$aerolinea1->incorporarVuelo($vuelo1);
$aerolinea1->incorporarVuelo($vuelo2);
$aerolinea2->incorporarVuelo($vuelo3);
$aerolinea2->incorporarVuelo($vuelo4);

$cantidadAsientos = 3;
$fecha = "04/06/2025";
$destino = "colombia";

$ventaExitosa = $aeropuerto->ventaAutomatica($cantAsientos, $fecha, $destino);

if ($ventaExitosa) {
    echo "la venta fue un exito nos vemos el $fecha.\n";
} else {
    echo "No podemos darte esas fechas.\n";
}


$promedio = $aerolinea->promedioRecaudadoXAerolinea();
echo "El promedio recaudado por la aerolíneas es: $" . number_format($promedio, 2) . "dolarriños";
