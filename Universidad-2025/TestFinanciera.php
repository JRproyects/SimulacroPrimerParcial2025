<?php

include_once 'ClaseCliente.php';
include_once 'ClasePrestamo.php';
include_once 'ClaseCuota.php';
include_once 'ClaseFinanciera.php';

$financiera = new Financiera("ElectroCash", "Av. Arg 1234",[]);

$cliente1 = new Cliente("Pepe", "Florez", "Bs As 12", "dir@mail.com", "299444567", 40000);
$cliente2 = new Cliente("Luis", "Suarez", "Bs As 123", "dir@mail.com", "2994455", 4000);

$prestamo1 = new Prestamo(1, "E001", "", 50000, 5, 0.1, $cliente1);
$prestamo2 = new Prestamo(2, "E002", "", 10000, 4, 0.1, $cliente2);
$prestamo3 = new Prestamo(3, "E003", "", 10000, 2, 0.1, $cliente2);

$financiera->agregarPrestamo($prestamo1);
$financiera->agregarPrestamo($prestamo2);
$financiera->agregarPrestamo($prestamo3);

$financiera->otorgarPrestamoSiCalifica();



if ($objCuota != null) {
    echo "Cuota encontrada: Numero " . $objCuota->getNumero() . "\n";
    echo "Monto final con interés: " . $objCuota->darMontoFinalCuota() . "\n";
} else {
    echo "No se encontró la cuota solicitada.\n";
}

echo $financiera;