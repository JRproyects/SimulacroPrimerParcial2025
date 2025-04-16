<?php
function esPar($num){
    if ( ($num % 2)==0){
   return true;
}else{
    return false;
}

}
$num=readline("introducir un numero; ");
if(esPar($num)== true){
echo"es par \n";
}else{
    echo"no es par \n";
}
