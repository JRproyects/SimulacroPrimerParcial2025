<?php 
/**
 * 
 */ 
$a=[];
$b=[];

function arrayDiff($a, $b) {
  /**
   * @param array = $a
   * @param int = $b
   */
  $a=explode(",",readline("introduccir valores; "));   
  $b=intval(readline("introduccir valores a eliminar; "));
  $a = array_filter($a, function($val) use ($b){
    return $val !=$b;
  });
  echo"Array actualizado: ". implode(",",$a)."\n";
}
echo"".arrayDiff($a, $b);