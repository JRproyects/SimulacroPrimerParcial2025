<?php
//año de instalación, largo, ancho, peso del vagón vacío.
//Si se trata de un vagón de pasajeros también se almacena la cantidad máxima de pasajeros
//la cantidad de pasajeros que está transportando y el peso promedio de los pasajeros.
class vagon{ 

    private int $anioInstalacion;
    private float $largoV;
    private float $anchoV;
    private float $pesoVagonVacio;

    public function __construct($anioInstalacion, $largoV, $anchoV,$pesoVagonVacio) {
        $this->anioInstalacion=$anioInstalacion;
        $this->largoV=$largoV;
        $this->anchoV=$anchoV;
        $this->pesoVagonVacio=$pesoVagonVacio;
    }
    public function getAnioInstalacion(){
        return $this->anioInstalacion;
    }
    public function getLargoV(){
        return $this->largoV;
    }
    public function getPesoVagonVacio(){
        return $this->pesoVagonVacio;
    }
    public function getAnchoV(){
        return $this->anchoV;
    }

    public function setAnioInstalacion($anioInstalacion){
         $this->anioInstalacion=$anioInstalacion;
    }
    public function setLargoV($largoV){
         $this->largoV=$largoV;
    }
    public function setPesoVagonVacio($pesoVagonVacio){
         $this->pesoVagonVacio=$pesoVagonVacio;
    }
    public function setAnchoV($anchoV){
        $this->anchoV=$anchoV;
    }
    

}