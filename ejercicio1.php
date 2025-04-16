<?php 
/**
 * n
 * m
 * hear
 */
$hear=[1,2,3,4,5,6,7,8,9,10,11,12,13];
$n=5;
$m=3;
$j=0;
$i=0;
$a=count($hear);
$subArray=[];
$newArray=[];
if(count($hear)!= ($m * $n)){
    for ($i = count($hear); $i < ($m * $n); $i++) { 
        array_push($hear, -1);
    }
}
for ($i = 0 ; $i < count($hear) ; $i++ ) { 
    if((($hear[$i]) % $n ) != 0) {
        $newArray[]=$hear[$i];
       print_r($newArray);
        
}if(($hear[$i] % $n)==0 || ($i == count($hear)-1)){
    $newArray[]=$hear[$i];
    $subArray[]=$newArray;
    $newArray=[];
    
}


}
print_r($subArray);