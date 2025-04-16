<?php
//1


$coleccionDePelicula=[
    [
        "titulo"=>"the goodfather",
        "anio"=>1972,
        "genero"=>"crime",
        "calificacion"=>9.2,
    ],[
        "titulo"=> "the shawshank redempion",
        "anio"=>1994,
        "genero"=>"drama",
        "calificacion"=>9.3,
    ],[
        "titulo"=>"puld fiction",
        "anio"=>1994,
        "genero"=>"drama",
        "calificacion"=>8.9
    ],[
        "titulo"=>"the dark knight",
        "anio"=> 2008,
        "genero"=>"action",
        "calificacion"=>9.0,
    ],
    [
        "titulo"=>"interstellar",
        "anio"=>2014,
        "genero"=>"sci-fi",
        "calificacion"=>8.6,
    ]
];
//Mostrar datos de una película: Programe una función cuyo parámetro de entrada sea un arreglo asociativo con la información de una película y muestre los datos en pantalla.
function mostarPantalla($coleccionDePelicula){
    foreach ($coleccionDePelicula as $pelicula){
        echo"Pelicula ".$pelicula["titulo"]."\n";
        echo"Estreno ".$pelicula["anio"]."\n";
        echo"Genero ".$pelicula["genero"]."\n";
        echo"Calificacion ".$pelicula["calificacion"]."\n";
    }

}
//Promedio de calificación: Programe una función cuyo parámetro de entrada sea una colección de películas y retorne el promedio de calificación.
function promedioCalificacion($coleccionDePelicula){
    $suma=0; 
    foreach($coleccionDePelicula as $pelicula){
        $suma+=$pelicula["calificacion"];
    }
    $cantidadDePeliculas=count($coleccionDePelicula);
    $promedio=($suma/$cantidadDePeliculas);
    echo"El promedio de la calificacion es ; ".$promedio."\n";
}
// Película con la mayor calificación por género: Programe una función que, a partir de una colección de películas como parámetro de entrada,
// retorne el nombre de la película con la mayor calificación para cada género.//9.2, 9.3, 8.9 ,9 ,8.6
function mayorCalificacion($coleccionDePelicula){
    $menor=0;
    $menorDrama=0;
    $tituloDrama=null; 
    $menorAction=0;
    $tituloAction=null; 
    $menorScifi=0;
    $tituloScifi=null; 
    $menorCrime=0;
    $tituloCrime=null; 
    foreach($coleccionDePelicula as $pelicula){
        $menor=$pelicula["calificacion"];
        if($pelicula["genero"]=="drama"){
            if ($menorDrama<$pelicula["calificacion"]){
                $menorDrama=$pelicula["calificacion"];
                $tituloDrama=$pelicula["titulo"];
        }
    }
        elseif($pelicula["genero"]=="action"){
            if ($menorAction<$pelicula["calificacion"]){
                $menorAction=$pelicula["calificacion"];
                $tituloAction=$pelicula["titulo"];
        }
    }
        elseif($pelicula["genero"]=="sci-fi"){
            if ($menorScifi<$pelicula["calificacion"]){
                $menorScifi=$pelicula["calificacion"];
                $tituloScifi=$pelicula["titulo"];
        }
    }
        elseif($pelicula["genero"]=="crime"){
            if ($menorCrime<$pelicula["calificacion"]){
                $menorCrime=$pelicula["calificacion"];
                $tituloCrime=$pelicula["titulo"];
        }
    }
}
echo"La mayor calificacion de drama es; ".$menorDrama." de la pelicula ".$tituloDrama."\n";
echo"La mayor calificacion de action es; ".$menorAction." de la pelicula ".$tituloAction."\n";
echo"La mayor calificacion de crime es; ".$menorCrime." de la pelicula ".$tituloCrime."\n";
echo"La mayor calificacion de sci-fi es; ".$menorScifi." de la pelicula ".$tituloScifi."\n";
}
//Filtrado de películas por calificación: Programe una función cuya entrada sea una colección de películas y un valor de calificación mínima. 
//La función debe retornar una nueva colección de películas que tengan una calificación mayor o igual al valor especificado. Si ninguna película cumple con el criterio, la función devolverá un arreglo vacío.

function filtradoPorCalificacion($coleccionDePelicula){
    $filtro=8.5;
    $nuevaColeccion=[];
    if (count($coleccionDePelicula) == 0){
       echo"".$nuevaColeccion; 
    }
    $i=1;
    foreach($coleccionDePelicula as $pelicula){
    if ($filtro<$pelicula["calificacion"]){
       # echo"Pelicula ".$pelicula["titulo"]."\n";
       # echo"Estreno ".$pelicula["anio"]."\n";
       # echo"Genero ".$pelicula["genero"]."\n";
       # echo"Calificacion ".$pelicula["calificacion"]."\n";
       $i++;
   }
    
}
echo"a cantidad de películas con una calificación mayor o igual a 8.5 es:".$i;
}
//Agregar película a la colección: Programe una función que solicite los datos de una película a un usuario, la agregue a la colección de películas y retorne la colección modificada.
// Debe asegurarse de que el nombre de la película sea agregado a la colección en formato de título capitalizado y que la calificación sea un valor entre 1 y 10
function agregarPeliculas($coleccionDePelicula, $p){
    $nuevaColeccion=[];
    for($i=0; $i<$p; $i++)
    {
        echo"introducir titulo de la pelicula; ";
        $titulo=strtoupper(trim(fgets(STDIN)));
        echo"introducir el genero de la pelicula; ";
        $genero=(trim(fgets(STDIN)));
        echo"introducir el año de lanzamiento de la pelicula; ";
        $anio=(trim(fgets(STDIN)));
        echo"introducir la calificacion de la pelicula; ";
        $calificacion=strtoupper(trim(fgets(STDIN)));
        if($calificacion<=1 && $calificacion>=10){
            echo"introduccir una calificacion del 1 a 10; ";
            $calificacion=(trim(fgets(STDIN)));

        }
    $nuevaColeccion =[
        "titulo" => $titulo ,
        "genero"=> $genero,
        "anio"=> $anio,
        "calificacion"=> $calificacion,
    ];
    $coleccionDePelicula[]=$nuevaColeccion;

    }
    
    //print_r($coleccionDePelicula);
    
}
echo"cuantas peliculas deseas agregar; ";
$p=trim(fgets(STDIN));
echo"".agregarPeliculas($coleccionDePelicula,$p);
echo"la cantidad de peliculas cargadas es; ". count($coleccionDePelicula)."\n";
echo"".promedioCalificacion($coleccionDePelicula);
echo"".mayorCalificacion($coleccionDePelicula);
echo"".filtradoPorCalificacion($coleccionDePelicula);
//echo"".mostarPantalla($coleccionDePelicula);