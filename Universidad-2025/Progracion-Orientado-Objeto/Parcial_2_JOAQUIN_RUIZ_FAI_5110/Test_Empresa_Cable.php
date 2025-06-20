<?php
require_once 'EmpresaCable.php';
require_once "ContratoWeb.php";
require_once 'Canal.php';
require_once 'Plan.php';
require_once 'Cliente.php';

$empresaCable = new EmpresaCable("TV-After-Wire", "tercer puente cipolleti s/n");

$canal1 = new Canal("TV-publica", 101);
$canal2 = new Canal("PAKAKA", 102);
$canal3 = new Canal("RIVER-PLATE", 912);

$planes = [];
$planes[] = new Plan(111, [$canal1, $canal2], 1000);
$planes[] = new Plan(222, [$canal2, $canal3], 1200);

$cliente = new Cliente("Enzo", "Perez", "DNI", 45028145);

echo "Empresa: " . $empresaCable->getNombre() . " - " . $empresaCable->getDireccion() . "\n";
echo "Cliente: " . $cliente . "\n";

echo "Planes Disponibles:\n";

$x = 0;
$cantidadPlanes = count($planes);
while ($x < $cantidadPlanes) {
    $plan = $planes[$x];
    echo "- Código: " . $plan->getCodigo() . ", Costo: $" . $plan->getCosto() . "\n";
    $x++;
}

$contratoEmpresa = new Contrato("2025-06-01", "2026-06-01", "al día", $planes[0], $planes[0]->getCosto(), true, $cliente);
$contratoWeb1 = new ContratoWeb("2025-06-01", "2025-06-01", "moroso", $planes[0], $planes[0]->getCosto(), false, $cliente);
$contratoWeb2 = new ContratoWeb("2025-06-01", "2025-01-01", "suspendido", $planes[1], $planes[1]->getCosto(), false, $cliente);

echo "Contrato en empresa - Importe final: $" . $contratoEmpresa->calcularImporte() . "\n";
echo "Contrato vía web 1 - Importe final: $" . $contratoWeb1->calcularImporte() . "\n";
echo "Contrato vía web 2 - Importe final: $" . $contratoWeb2->calcularImporte() . "\n";

$fechaInicio = date("Y-m-d");
$fechaVencimiento = date("Y-m-d", strtotime("+30 days"));

$empresaCable->incorporarContrato($planes[0], $cliente, $fechaInicio, $fechaVencimiento, false);
$empresaCable->incorporarContrato($planes[1], $cliente, $fechaInicio, $fechaVencimiento, true);

$contratoPresencial = $empresaCable->buscarContrato($cliente->getTipoDocumento(), $cliente->getNumeroDocumento());
$contratoWeb = $empresaCable->buscarContrato($cliente->getTipoDocumento(), $cliente->getNumeroDocumento());

if ($contratoPresencial !== null) {
    $importePresencial = $empresaCable->pagarContrato($contratoPresencial->getCodigo());
    echo "Pago contrato presencial: $" . $importePresencial . "\n";
} else {
    echo "No se encontró contrato presencial.\n";
}

if ($contratoWeb !== null) {
    $importeWeb = $empresaCable->pagarContrato($contratoWeb->getCodigo());
    echo "Pago contrato web: $" . $importeWeb . "\n";
} else {
    echo "No se encontró contrato web.\n";
}

$promImporte = $empresaCable->retornarPromImporteContratos(111);
echo "Promedio de importes para el plan con código 111: $" . $promImporte . "\n";
