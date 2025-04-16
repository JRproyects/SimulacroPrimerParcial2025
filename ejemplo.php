<?php
class Solution {

/**
 * @param Integer[] $original
 * @param function construct2DArray
 * @param int $m
 * @param int $n
 * @param array $arrayVacio
 * @return Integer[][]
*/

public function construct2DArray($original, $m, $n) {
    $originalLongitud = count($original);
    $orden= $m*$n;
    if ($originalLongitud!=$orden){
            return [];
    }
    $matriz2D=[];
    for ($i=0; $i < $m ; $i++) { 
        $fila= [];
        for ($j=0; $j < $n ; $j++) { 
            $fila[]= $original[$i *$n + $j];
        }
        $matriz2D[]= $fila;
    }
    return $matriz2D;
}
}$solution = new Solution();
$m = 2;
$n = 2;
$original = [1, 2, 3, 4];
$resultado = $solution->construct2DArray($original, $m, $n);
print_r($resultado);
?>