<?php
include "testViajes.php";

$test = new TestViajes();

// Agregar una empresa
$test->agregarEmpresa("Empresa Sur", "Av. Libertador 1234");

// Agregar un viaje (suponiendo que ya existen empresa con ID 1 y responsable con ID 1)
$test->agregarViaje("Córdoba", 45, 1, 1, 15000.00);
