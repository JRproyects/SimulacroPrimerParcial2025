<?php
/**
 * @param int $antiguedad
 */
//programar una array asociativa de las peliculas
$coleccionDePelicula=[
    ["titulo"=>'interstellar',
    "anio"=>2014,
    "duracion"=>169,
    "recaudacion"=>677.5 
],[
    "titulo"=>'inception',
    "anio"=>2010,
    "duracion"=>148,
    "recaudacion"=>836.8 
],[
    "titulo"=>'dunkirk',
    "anio"=>2017,
    "duracion"=>106,
    "recaudacion"=>526.9
     
],[
    "titulo"=>"the dark knight",
    "anio"=>2008,
    "duracion"=>152,
    "recaudacion"=>1004.9
],[
    "titulo"=>"tenet",
    "anio"=>2020,
    "duracion"=>150,
    "recaudacion"=>363.7
]
];
//programar una funcion con un arreglo asociativo el cual tiene como paramtros de salidas nombre, anio, duracion, recaudacion y antiguedad.
function mostrarPeliculas($coleccionDePelicula){
    //calcula la antiguedad de la pelicula.
    $anioActual=2024;
    foreach ($coleccionDePelicula as $pelicula){
        echo"Pelicula ". $pelicula["titulo"]."\n";
        echo"Estreno ". $pelicula["anio"]."\n";
        echo"Duracion ". $pelicula["duracion"]."min"."\n";
        echo"Recaudacion ". $pelicula["recaudacion"]."md"."\n";
        $antiguedad=($anioActual-$pelicula["anio"]);
        echo"Antiguedad ". $antiguedad." años"."\n";
    }
    

}
//Programe una función cuyo parámetro de entrada sea una colección de películas y retorne el promedio de duración
function promedioDuracion($coleccionDePelicula){
    $suma=0;
    $cantidadDePeliculas=count($coleccionDePelicula);
    foreach ($coleccionDePelicula as $pelicula){
        $suma+=$pelicula["duracion"];
    }
    if ($cantidadDePeliculas>0 ){
                $promedio=($suma/$cantidadDePeliculas);
                echo("el promedio es; ").$promedio;
             }else{
                echo"no hay peliculas ingresadas";
             } 
    }
//Película de menor recaudación: Programe una función que, a partir de una colección de películas como parámetro de entrada, retorne el índice de la película de menor recaudación. 
//En el caso de existir dos películas con la misma recaudación, se tomará la primera película.
function menorRecaudacion($coleccionDePelicula){
    $cantidadDePeliculas=count($coleccionDePelicula);
    $menor=$coleccionDePelicula[0]["recaudacion"];

    if (count($coleccionDePelicula) == 0){
        return null; 
    }
    foreach($coleccionDePelicula as $pelicula){
        if ($pelicula["recaudacion"]<$menor)
        $menor=$pelicula["recaudacion"];
    }
    echo"la menor recaudacion fue de; ".$menor."md"; 
}

//Filtrado de películas por antigüedad: Programe una función cuya entrada sea una colección de películas y un valor de antigüedad en años, y que retorne una nueva colección de películas que sean más antiguas a dicho valor.
// Si ninguna película supera la antigüedad especificada, la función devolverá un arreglo vacío.
function busquedaDeAntiguedad($coleccionDePelicula){
    if(count($coleccionDePelicula) == 0){
        return null; 
    }
    //$antiguedadSolicitud=readline("introduccir la antiguedad que desea buscar; ");
    $antiguedadSolicitud=10;
    foreach ($coleccionDePelicula as $pelicula){
        if((2024-$pelicula["anio"]) > $antiguedadSolicitud ){
        echo"Titulo; " . $pelicula["titulo"];
        echo" antiguedad " . (2024-$pelicula["anio"]) . " años"."\n";
    }
}
}
//Agregar película a la colección: Programe una función que solicite los datos de una película a un usuario, la agregue a la colección de películas y retorne la colección modificada.
// Debe asegurarse de que el nombre de la película sea agregado a la colección en minúsculas
function agregarPelicula($coleccionDePelicula){

    echo"introducir el nombre de la pelicula; ";
    $titulo=trim(fgets(STDIN));
    echo"introducir el año de la pelicula; ";
    $anio=trim(fgets(STDIN));
    echo"introducir la duracion de la pelicula; ";
    $duracion=trim(fgets(STDIN));
    echo"introducir la recaudacion de la pelicula; ";
    $recaudacion=trim(fgets(STDIN));
    $nuevaPelicula=[
        "titulo"=>strtoupper($titulo),
        "anio"=>$anio,
        "duracion"=>$duracion,
        "recaudacion"=>$recaudacion,
    ];
    $coleccionDePelicula[]=$nuevaPelicula;
    //print_r($coleccionDePelicula);
}
//i. Cargar la colección de películas precargadas.
//ii. Solicitar al usuario del programa la cantidad de películas que desea agregar a la colección de películas, y para cada una: solicite los datos de la película y agréguelas a la colección de películas.
//iii. Mostrar en pantalla la cantidad de películas cargadas.
//iv. Mostrar en pantalla el promedio de duración de las películas.
//v. Mostrar en pantalla el nombre de la película de menor recaudación.
//vi. Mostrar en pantalla la cantidad de películas cuya antigüedad es mayor a 10 años.
//vii. Mostrar en pantalla la lista completa de películas agregadas a la colección.

function inicioDePrograma($coleccionDePelicula){
    echo"cuantas peliculas desea ingresar; ";
    $p=trim(fgets(STDIN));
    for ($i=0; $i < $p && $p>0 ; $i++) {
        echo"". agregarPelicula($coleccionDePelicula);
    }
    if ($p==0){
        echo"la cantidad de peliculas cargadas es; 0"."\n";
        echo "". promedioDuracion($coleccionDePelicula)."\n";
        echo "" . menorRecaudacion($coleccionDePelicula)."\n";
        echo "" . busquedaDeAntiguedad($coleccionDePelicula)."\n";
        $anioActual=2024;
             $pelicula=$coleccionDePelicula[4];
                echo"Pelicula ". $pelicula["titulo"]."\n";
                echo"Estreno ". $pelicula["anio"]."\n";
                echo"Duracion ". $pelicula["duracion"]."min"."\n";
                echo"Recaudacion ". $pelicula["recaudacion"]."md"."\n";
                $antiguedad=($anioActual-($pelicula["anio"]));
                echo"Antiguedad ". $antiguedad." años"."\n";
            
            exit;
    }
    echo"la cantidad de peliculas cargadas es; ".(count($coleccionDePelicula));
    echo "". promedioDuracion($coleccionDePelicula);
    echo "" . menorRecaudacion($coleccionDePelicula);
    echo "" . busquedaDeAntiguedad($coleccionDePelicula);
    echo"". mostrarPeliculas($coleccionDePelicula);
}
echo"" . inicioDePrograma($coleccionDePelicula); 
//segun chat gpt es un 7.5 falta algunas cosas sonbre todo en vez de mostar las peliculas antiguas motrarlo en un contador
//tambien el tema de que hay que cambiar lo de las peliculas cuando estan en mayuscula y eso.