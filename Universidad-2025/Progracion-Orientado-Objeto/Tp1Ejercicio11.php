<?php
//Crear una clase Cuadrado que modele cuadrados por medio de cuatro puntos (los vértices). Puede utilizar arreglos asociativos para implementar cada uno de los vértices. 
//La clase dispondrá de los siguientes métodos:
//11.a Método constructor _ _construct () que recibe como parámetros las coordenadas de los puntos.
//11.b. Los métodos de acceso de cada uno de los atributos de la clase.
//11.C area(): método que calcula el área del cuadrado.
//11d desplazar($d): método que recibe por parámetro un punto y desplaza el cuadrado en el plano desde su punto mas inferior izquierdo.
//11e aumentarTamaño($t): método que recibe por parámetro el tamaño que debe aumentar el cuadrado.
//11f Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
//11g Crear un script Test_Cuadrado que cree un objeto Cuadrado e invoque a cada uno de los métodos implementados.
class cuadrado{

    public array $puntoA, $puntoB, $puntoC, $puntoD;
    public function __construct(array $puntoA,array $puntoB,array  $puntoC,array $puntoD)
    {
        $this->puntoA=$puntoA;
        $this->puntoB=$puntoB;
        $this->puntoC=$puntoC;
        $this->puntoD=$puntoD;
    }
    public function __toString(): string {
        return "Puntos del cuadrado:\n" .
               "A: (" . $this->puntoA['x'] . ", " . $this->puntoA['y'] . ")\n" .
               "B: (" . $this->puntoB['x'] . ", " . $this->puntoB['y'] . ")\n" .
               "C: (" . $this->puntoC['x'] . ", " . $this->puntoC['y'] . ")\n" .
               "D: (" . $this->puntoD['x'] . ", " . $this->puntoD['y'] . ")\n";
                }
    public function vectores(){
        //primer paso crear los vectores; AB, BC, CD, DA
        
        $vectorAB=[
            'x'=>($this->puntoB['x']-$this->puntoA['x']),
            'y'=>($this->puntoB['y']-$this->puntoA['y']),
        ];
        $vectorBC=[
            'x'=>($this->puntoC['x']-$this->puntoB['x']),
            'y'=>($this->puntoC['y']-$this->puntoB['y']),
        ];
        $vectorCD=[
            'x'=>($this->puntoD['x']-$this->puntoC['x']),
            'y'=>($this->puntoD['y']-$this->puntoC['y']),
    ];
        $vectorDA=[
            'x'=>($this->puntoA['x']-$this->puntoD['x']),
            'y'=>($this->puntoA['y']-$this->puntoD['y']),];

            return [
                'AB' => $vectorAB,
                'BC' => $vectorBC,
                'CD' => $vectorCD,
                'DA' => $vectorDA
            ];
        }
    public function area():float {
        $vectores = $this->vectores();
        $vectorAB = $vectores['AB'];
        $vectorDA = $vectores['DA'];

        //realizar el producto cruzado.
        
        $productoCruzado=abs(($vectorAB['x'] * $vectorDA['y']) - ($vectorAB['y'] * $vectorDA['x']));

        return $productoCruzado;

    }
    public function comprobarCuadrado(){

        $vectores = $this->vectores();
        $vectorAB = $vectores['AB'];
        $vectorBC = $vectores['BC'];
        $vectorCD = $vectores['CD'];
        $vectorDA = $vectores['DA'];
        //paso 2 encontrar el normal
        //tener en cuenta que la posicion 0=x y posicion 1=y
        $normalABBC=($vectorAB['x']*$vectorBC['x'])+($vectorAB['y']*$vectorBC['y']);
        $normalCDDA=($vectorCD['x']*$vectorDA['x'])+($vectorCD['y']*$vectorDA['y']);
        $normalBCCD=($vectorBC['x']*$vectorCD['x'])+($vectorBC['y']*$vectorCD['y']);
        $normalDAAB=($vectorDA['x']*$vectorAB['x'])+($vectorDA['y']*$vectorAB['y']);    
        return ($normalABBC == 0 && $normalBCCD == 0 && $normalCDDA == 0 && $normalDAAB == 0);                   

}
    public function desplazar(array $d){

        $this->puntoA['x']+=$d['x'];
        $this->puntoA['y']+=$d['y'];
        
        $this->puntoB['x']+=$d['x'];
        $this->puntoB['y']+=$d['y'];

        $this->puntoC['x']+=$d['x'];
        $this->puntoC['y']+=$d['y'];

        $this->puntoC['x']+=$d['x'];
        $this->puntoC['y']+=$d['y'];
    }
    public function aumentarTamaño(float $t){
        $this->puntoA['x']*=$t;
        $this->puntoA['y']*=$t;

        $this->puntoB['x']*=$t;
        $this->puntoB['y']*=$t;

        $this->puntoC['x']*=$t;
        $this->puntoC['y']*=$t;

        $this->puntoD['x']*=$t;
        $this->puntoD['y']*=$t;

    }
}

//inicio de programa
function pedirPuntos():array{
    $puntos=[];
    $nombres=['A','B','C','D'];
    foreach ($nombres as $nombre){
        echo "Ingrese coordenadas para el punto $nombre:\n";
        echo "X: ";
        $x=trim(fgets(STDIN));
        echo "Y: ";
        $y=trim(fgets(STDIN));

        $puntos[$nombre]=['x'=>(float)$x, 'y'=>(float)$y];
    }
    return $puntos;
}

//inicio del programa princial
    $puntos=pedirPuntos();
    
    $cuadrado = new cuadrado($puntos['A'], $puntos['B'], $puntos['C'], $puntos['D']);
    
    //comprobar si es un cuadrado:
    if ($cuadrado->comprobarCuadrado()) {
        echo "Es un cuadrado, podemos proceder con los cálculos:\n";
        echo "Área del cuadrado: " . $cuadrado->area() . "\n";
    } else {
        echo "No es un cuadrado\n";
    }
    
  // Pedir valores de desplazamiento
$d = [];
echo "Ingrese cantidad a desplazar:\n";
echo "X: ";
$x = trim(fgets(STDIN));
echo "Y: ";
$y = trim(fgets(STDIN));

$d = ['x' => (float)$x, 'y' => (float)$y];

// Llamar al método desplazar
$cuadrado->desplazar($d);

echo "Después de desplazar:\n";
echo $cuadrado;
//aumentarTamaño
echo "ingrese tamaño aumentar: ";
$t=trim(fgets(STDIN));
$cuadrado->aumentarTamaño($t);

echo "Despues de aumentar tamaño: \n";
echo $cuadrado;



    
?>