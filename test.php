<?php
include_once 'ClaseMoto.php';
include_once 'ClaseVenta.php';
include_once 'ClaseEmpresa.php';
include_once 'ClaseCliente.php';

// Crear clientes
$objCliente1 = new Cliente("Lionel", "Messi", false, "DNI", 33016244);
$objCliente2 = new Cliente("Robert", "Lewandowski", true, "DNI", 7654321);

// Crear empresa
$empresa = new Empresa("Alta Gama", "Av Argentina 123");

// Crear motos
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Panella ZR 150 OHC", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Kanella Patagonian Eagle 250", 55, false);

// Setear las colecciones en la empresa
$empresa->setColeccionClientes([$objCliente1, $objCliente2]);
$empresa->setColeccionMotos([$objMoto1, $objMoto2, $objMoto3]);

// Registrar ventas
echo "Venta 1:\n";
$resultadoVenta1 = $empresa->registrarVenta([11, 12], $objCliente2); // motos activas
echo "Resultado venta: " . $resultadoVenta1 . "\n";

echo "Venta 2:\n";
$resultadoVenta2 = $empresa->registrarVenta([13], $objCliente2); // moto inactiva
echo "Resultado venta: " . $resultadoVenta2 . "\n";

echo "Venta 3:\n";
$resultadoVenta3 = $empresa->registrarVenta([11], $objCliente1); // Messi compra una moto
echo "Resultado venta: " . $resultadoVenta3 . "\n";

// Mostrar ventas por cliente
echo "Ventas del Cliente 1:\n";
$ventasCliente1 = $empresa->retornarVentasXCliente("DNI", 33016244);
foreach ($ventasCliente1 as $venta) {
    echo $venta . "\n";
}

echo "Ventas del Cliente 2:\n";
$ventasCliente2 = $empresa->retornarVentasXCliente("DNI", 7654321);
foreach ($ventasCliente2 as $venta) {
    echo $venta . "\n";
}

// Mostrar info de la empresa
echo "\nEmpresa:\n";
echo $empresa;
