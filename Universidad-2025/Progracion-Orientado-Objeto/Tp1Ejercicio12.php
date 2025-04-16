<?php
//Definir una clase Linea con cuatro atributos: pA , p B, pC y pD donde ( pA , p B ) y ( pC,pD ) son 2 puntos por los que pasa la línea en un espacio de dos dimensiones. La clase dispondrá de los siguientes métodos:
//12.a. Método constructor _ _construct() que recibe como parámetros las coordenadas de los puntos.
//12.b. Los métodos de acceso de cada uno de los atributos de la clase. 
//12.c. mueveDerecha($d): Desplaza la línea a la derecha la distancia(d) que se recibe por parámetro.
//12.d. mueveIzquierda($d): Desplaza la línea a la izquierda la distancia(d) que se recibe por parámetro.
//12.e. mueveArriba($d): Desplaza la línea hacia arriba la distancia que se recibe por parámetro.
//12.f. mueveAbajo($d): Desplaza la línea hacia abajo la distancia que se recibe por parámetro. 
//12.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase. 
//12.h. Crear un script Test_Linea que cree un objeto Linea e invoque a cada uno de los métodos implementados.
class linea
{
    public float $pA, $pB, $pC, $pD;
    public array $p1, $p2;
    public function __construct(float $pA, float $pB, float $pC, float $pD)
    {

        $this->pA = $pA;
        $this->pB = $pB;
        $this->pC = $pC;
        $this->pD = $pD;
    }
    // ( pA , p B ) y ( pC,pD )

    public function desplazarDerecha(float $d)
    {
        $this->pA += $d;
        $this->pC += $d;
    }
    public function desplazarIzquierda(float $d)
    {
        $this->pC -= $d;
        $this->pA -= $d;
    }
    public function desplazarArriba(float $d)
    {
        $this->pB += $d;
        $this->pD += $d;
    }
    public function desplazarAbajo(float $d)
    {
        $this->pD -= $d;
        $this->pB -= $d;
    }
    public function __toString(): string
    {
        return "Ubicación de los puntos:\n" .
            "P1: ($this->pA, $this->pB)\n" .
            "P2: ($this->pC, $this->pD)\n";
    }
}
// Script de prueba
echo "Ingrese las coordenadas iniciales de los puntos P1 y P2:\n";
echo "pA (x1): ";
$pA = (float) trim(fgets(STDIN));
echo "pB (y1): ";
$pB = (float) trim(fgets(STDIN));
echo "pC (x2): ";
$pC = (float) trim(fgets(STDIN));
echo "pD (y2): ";
$pD = (float) trim(fgets(STDIN));

$linea = new Linea($pA, $pB, $pC, $pD);
//incio de programa
$d = 0;

echo "ingresar cuanto se va a desplazar hacia la derecha: \n";
$dDerecha = trim(fgets(STDIN));
$linea->desplazarDerecha($dDerecha);

echo "ingresar cuanto se va a desplazar hacia la izquierda: \n";
$dIzquierda = trim(fgets(STDIN));
$linea->desplazarIzquierda($dIzquierda);

echo "ingresar cuanto se va a desplazar hacia arriba: \n";
$dArriba = trim(fgets(STDIN));
$linea->desplazarArriba($dArriba);
echo "ingresar cuanto se va a desplazar hacia abajo: \n";
$dAbajo = trim(fgets(STDIN));
$linea->desplazarAbajo($dAbajo);

echo $linea;
