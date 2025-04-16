<?php
//13. Desarrollar una clase Cafetera con los atributos capacidadMaxima (la cantidad máxima de café que puede contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera). Implementar los siguientes métodos: 
//13.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la clase.
//13.b. Los método de acceso de cada uno de los atributos de la clase.
//13.c. llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera. 
//13.d. servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje al consumidor para que sepa porque no se le sirvió un taza completa. 
//13.e. vaciarCafetera(): pone la cantidad de café actual en cero. 
//13.f. agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada. 
//13.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase. 
//13.h. Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los métodos implementados.
class cafetera{
    private int $capacidadMax;
    private int $cantidadActual;

    public function __construct(int $capacidadMax, int $cantidadActual)
    {
        $this->capacidadMax=$capacidadMax;
        $this->cantidadActual=$cantidadActual;
    }
    public function getCantidadMaxima(){
        return $this->capacidadMax;
    }
    public function getCapacidadActual(){
        return $this->cantidadActual;
    }
    public function setCantidadMaxima(int $capacidadMax){
        $this->capacidadMax=$capacidadMax;
    }

    public function setCantidadActual(int $capacidadMaxima,int $cantidadActual){
        $this->cantidadActual=min($cantidadActual,$this->capacidadMax);
    }
    public function llenarCafetera(){
        $this->cantidadActual=$this->capacidadMax;
    }
    public function servirTaza(int $cantidad){
        if($this->cantidadActual>=$cantidad){
        $this->cantidadActual-=$cantidad;
        echo "Se sirvio la taza de cafe con la cantidad de $cantidad ml \n";
    }else{
        echo"No alcanzo, se sirvieron solamente {$this->cantidadActual} ml \n";
        $this->cantidadActual=0;
    }
}
    public function vaciarCafetera(){
        $this->cantidadActual=0;
    }

    public function agregarCafe(int $cantidad){
        $this->cantidadActual=min($this->cantidadActual+$cantidad, $this->capacidadMax);
        echo"La cantidad actual de la cafetera es de {$this->cantidadActual} ml \n";
    }
    public function __toString()
    {
        return "Capacidad Máxima: {$this->capacidadMax} ml, Cantidad Actual: {$this->cantidadActual} ml";
    }
}


//inicio del programa:
$miCafetera= new cafetera(1000,500);
echo $miCafetera;
$miCafetera->llenarCafetera();
echo $miCafetera . "\n";
$miCafetera->servirTaza(300);
echo $miCafetera . "\n";
$miCafetera->servirTaza(800);
echo $miCafetera . "\n";
$miCafetera->agregarCafe(400);
echo $miCafetera . "\n";
$miCafetera->vaciarCafetera();
echo $miCafetera . "\n";


?>