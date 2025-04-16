<?php 
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

// function crearMostrarPrimavera($datosP){
//     $primavera=[];
//     foreach($datosP as $filas){
//      $filas(3,4,5,6,7,8,9);
//      foreach($filas as $i ){
//         $filas[$i(9,10,11)];
//      }  
//     }
//     $primavera=$filas;
//     return $primavera;
// }
// echo"".crearMostrarPrimavera($datosP);

function crearMostrarPrimavera($datosP){
    $primavera=[];
    for($i=0;  $i<10; $i++){
     $filas=[];
        for ($j=0; $j<12; $j++) { 
            if($j==9 || $j==10 || $j==11 ){
                $filas[] = $datosP[$i][$j];
        }
        }
        $primavera[] = $filas;
    }

   // $ArrayPrimavera[]=$primavera[$primaveras];
   // print_r($ArrayPrimavera);
    return $primavera;
}
//lo que necesito es que cuando lo imprima ahora lo /3 para separarlo por años 

///////programa principal


$datosP=datosP();
$primavera=crearMostrarPrimavera($datosP);
echo "Temperaturas de primavera (octubre, noviembre, diciembre) por año:\n";
foreach ($primavera as $año => $meses) {
    echo "Año " . (2014 + $año) . ": ";
    print_r($meses);
}