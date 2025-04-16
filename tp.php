<?php
// Función para inicializar datos predeterminados brindados por la catedraa
function datosP() {
    $datosP=[
        [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29],
        [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31],
        [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32],
        [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31],
        [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30],
        [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29],
        [31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29],
        [30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30],
        [31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30],
        [32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31]
    ];
    return $datosP;
}

// Mostrar matriz
function mostrarMatriz($matriz, $mesesFiltrados) {
    foreach ($matriz as $fila) {
        foreach ($fila as $i => $valor) {
            echo $mesesFiltrados[$i] . ": " . $valor . " ";
        }
        echo "\n";
    }
}


// Traductor de año a índice
function traductorA($anio) {
    if ($anio < 2014 || $anio > 2023) {
        echo "Error: Año fuera de rango, los años validos son desde 2014 al 2023.\n";
        return -1;
    }
    return $anio - 2014;
}

// Traductor de mes a índice
function traductorMes($mes, $meses) {
    $indice = array_search($mes, $meses);
    if ($indice === false) {
        echo "Error: Mes inválido.\n
        Los meses validos son enero, febrero, marzo, abril, junio, julio, agosto, septimbre, octubre, noviembre y diciembre.";
        return -1;
    }
    return $indice;
}

// Mostrar temperaturas de un año
function mostrarAnio($datosP, $indiceAnios, $meses) {
    echo "Temperaturas del año " . (2014 + $indiceAnios) . ":\n";
    foreach ($meses as $i => $mes) {
        echo "$mes: {$datosP[$indiceAnios][$i]}°C\n";
    }
}

// Calcular promedio por mes
function calculoPromPorMes($datosP, $indiceMes, $mes) {
    $suma = array_sum(array_column($datosP, $indiceMes));
    $promedio = $suma / count($datosP);
    echo "Promedio para $mes: $promedio\n";
}

// Buscar máximos y mínimos
function hallarMax($datosP, $meses) {
    $max = -999;
    $filaMax = $colMax =0;

    foreach ($datosP as $i => $fila) {
        foreach ($fila as $j => $valor) {
            if ($valor > $max) {
                $max = $valor;
                $filaMax = $i;
                $colMax = $j;
            }

        }
    }
    $max1="Temperatura máxima: $max en {$meses[$colMax]} de " . (2014 + $filaMax) . "\n";
    return $max1;
}



function hallarMin($datosP, $meses){
        $min=999;
        $filaMin = $colMin = 0;

        foreach($datosP as $i => $fila){
            foreach($fila as $j=>$valor){
            if ($valor < $min) {
            $min = $valor;
            $filaMin = $i;
            $colMin = $j;
        }   
    }
}
$min1="Temperatura mínima: $min en {$meses[$colMin]} de " . (2014 + $filaMin) . "\n";
return $min1;
}
//Mostrar datos Manualmente
function cargaManual($meses, $datosP) {
    $datosP = [];
    for ($i = 0; $i < 10; $i++) {
        $fila = [];
        for ($j = 0; $j < count($meses); $j++) {
            echo "Ingrese la temperatura para el año " . (2014 + $i) . " en " . $meses[$j] . ": ";
            $fila[] = intval(trim(fgets(STDIN))); // Leer y convertir a entero tuvimos que usar interval porque no encotramos otra forma 

        }
        $datosP[] = $fila;
    }
    return $datosP;
}
// Mostrar datos de primavera
function crearMostrarPrimavera($datosP){
    $primavera=[];
    for($i=0;  $i<10; $i++){
     $fila=[];
        for ($j=0; $j<12; $j++) { 
            if($j==9 || $j==10 || $j==11 ){
                $fila[] = $datosP[$i][$j];
        }
        }
        $primavera[] = $fila;
    }

   // $ArrayPrimavera[]=$primavera[$primaveras];
   // print_r($ArrayPrimavera);
    return $primavera;
}

// Mostrar datos de invierno
function crearMostrarInvierno($datosP) {
    $invierno =[];
    for($i=5; $i<10; $i++){
        $fila=[];
        for ($j=0; $j <12 ; $j++) { 
            if($j==6 || $j==7 || $j==8 ){
                $fila[] = $datosP[$i][$j];
        }
        }
        $invierno[]=$fila;
    }
    return $invierno;

}

// Programa principal

$meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
$datosP = datosP();


echo "Bienvenido al programa principal :) \n";

echo "Desea ingresar datos de forma manual?(si/no)\n";
$manualDatos=strtolower(trim(fgets(STDIN)));
if ($manualDatos=="si"){
$datosP=cargaManual($meses, $datosP);
}
do {
    echo "¿Qué desea hacer?\n";
    echo "1. Mostrar la matriz completa\n";
    echo "2. Ingresar un año y un mes para ver su temperatura\n";
    echo "3. Ingresar un año y obtener todas las temperaturas de sus meses\n";
    echo "4. Ingresar un mes y obtener todas las temperaturas del año y su promedio\n";
    echo "5. Buscar y mostrar las temperaturas máximas y mínimas\n";
    echo "6. Mostrar datos de primavera\n";
    echo "7. Mostrar datos de invierno\n";
    echo "8. Salir\n";

    $opcion = intval(readline("Elija una opción: "));

    switch ($opcion) {
        case 1:
            mostrarMatriz($datosP,$meses);
            break;
        case 2:
            $anio = intval(readline("Ingrese el año (2014-2023): "));
            $mes = readline("Ingrese el mes: ");
            $indiceAnios = traductorA($anio);
            $indiceMeses = traductorMes($mes, $meses);
            if ($indiceAnios !== -1 && $indiceMeses !== -1) {
                echo "La temperatura en $mes de $anio fue de {$datosP[$indiceAnios][$indiceMeses]}°C\n";
            }
            break;
        case 3:
            $anio = intval(readline("Ingrese el año (2014-2023): "));
            $indiceAnios = traductorA($anio);
            if ($indiceAnios !== -1) {
                mostrarAnio($datosP, $indiceAnios, $meses);
            }
            break;
        case 4:
            $mes = readline("Ingrese el mes: ");
            $indiceMeses = traductorMes($mes, $meses);
            if ($indiceMeses !== -1) {
                calculoPromPorMes($datosP, $indiceMeses, $mes);
            }
            break;
        case 5:
            $max1=hallarMax($datosP, $meses);
            echo"".$max1;
            $min1=hallarMin($datosP, $meses);
            echo"".$min1;
            break;
        case 6:
            $mesesPrimavera = ["octubre", "noviembre", "diciembre"];
            $primavera = crearMostrarPrimavera($datosP);
            mostrarMatriz($primavera, $mesesPrimavera);
            break;
        case 7:
            $mesesInvierno = ["julio", "agosto", "septiembre"];
            $invierno = crearMostrarInvierno($datosP);
            mostrarMatriz($invierno, $mesesInvierno);<
            break;
        case 8:
            echo "Saliendo del programa.\n";
            break;
        default:
            echo "Opción no válida. Intente nuevamente.\n";
            break;
    }
} while ($opcion !== 8);

echo "Gracias por usar el programa.\n";
$primavera=crearMostrarPrimavera($datosP);
$invierno=crearMostrarInvierno($datosP);
$todito=[$datosP,$invierno,$primavera];
// en fe mz ab my jn jl ag sp oc nv di