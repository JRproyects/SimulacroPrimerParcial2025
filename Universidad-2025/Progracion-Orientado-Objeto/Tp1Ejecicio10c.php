<?php
//Diseñar e implementar la clase Fecha. La clase deberá disponer de los atributos mínimos y necesarios para almacenar el día, el mes y el año,
 //además de métodos que devuelvan un String con la fecha en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función incremento, 
 //que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado de incrementar la fecha recibida por parámetro en el numero de días
 // definido por el parámetro entero.

 class fecha{
    public int $dia; 
    public int $mes;
    public int $anio;
    
    function __construct(int $dia, int $mes, int $anio )
    {
        $this->dia=$dia;
        $this->mes=$mes;
        $this->anio=$anio;
    }

    //get: Un getter devuelve el valor de un atributo privado.

    public function getDia(){
        return $this->dia;
    }
    public function getMes(){
        return $this->mes;
    }
    public function getAnio(){
        return $this->anio;
    }

    //set para poder cambiar valores 
    public function setDia($nuevoDia){
        $this->dia=$nuevoDia;
    }
    public function setMes($nuevoMes){
        $this->mes=$nuevoMes;
    }
    public function setAnio($nuevoAnio){
        $this->anio=$nuevoAnio;
    }
    public function condicionesDeFechas(){
        //21/4/2012
        if($this->dia>0 && $this->dia<=31 && $this->mes>0 && $this->mes<=12){
            //meses con 31 dias = 1,3,5,7,8,10,12
            if($this->anio%4!=0){
                //año bisiesto
                if($this->mes==2 && $this->dia>28){
                    echo"fecha ingresada incorrecta año no bisiesto \n";
                    exit;
                }
            }
            if(\in_array($this->mes, [2,4,6,9,11])){
                if($this->dia>30){
                    echo"fecha ingresada incorrecta no tiene 31 dias \n";
                }
            }
            return "{$this->dia}/{$this->mes}/{$this->anio} \n";
        }
        else{
            echo"fecha ingresada incorrecta \n";
        }
    }
    
    public function diasEnMes( $mes, $anio){
        $diasPorMes = [1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30,
        7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31];
        if ($mes==2 && $this->anio%4==0 ){
            return 29;
        }
        return $diasPorMes[$mes];
    }


    public function incrementarFecha($diasIncrementar) {
        $this->dia+=$diasIncrementar;
        while ($this->dia > $this->diasEnMes($this->mes, $this->anio)) {
            $this->dia -= $this->diasEnMes($this->mes, $this->anio);
            $this->mes++;

            // Si pasa de diciembre, hay que aumentar el año
            if ($this->mes > 12) {
                $this->mes = 1;
                $this->anio++;
            }
        }
        return "{$this->dia}/{$this->mes}/{$this->anio} \n";

    }
    public function mostrarFechaExtendida(){
        $meses=["Enero","Febrero","Marzo", "Abri", "Mayo", "Junio","Julio","Agosto","Septiembre", "Octubre", "Noviembre","Diciembre"];
        return "{$this->dia} de {$meses[$this->mes-1]} del {$this->anio} \n";
    }
    
}
$fecha= new fecha(1,1,2011);
echo $fecha->condicionesDeFechas();
echo $fecha->mostrarFechaExtendida();
echo $fecha->incrementarFecha(105);


//150 dias a incrementar desde 1 de enero evaluar primero si es bisiesto el año,  luego segun eso 