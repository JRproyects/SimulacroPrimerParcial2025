<?php

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */

function twoSum($nums, $target) {
($nums[]=readline("introducir numeros"));
    $target=9;
    $numsInArray=count($nums);
    $suma=0;
    $num=$nums[0];
    for( $i=0;$i<$numsInArray ;$i++ ){
        if($target!=$suma){
        $suma=$num+$nums[$i];
        $num=$nums[$i];
    }
}
}


echo"".twoSum($nums, $target);