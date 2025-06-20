<?php
include_once "ClaseVagon.php";
class vagonCarga extends vagon{
    private $pesoMaximo;
    private $pesoCarga;
    private $indiceExtra = 0.2;

      public function __construct($anioInstalacion, $largoV, $anchoV, $pesoVagonVacio, $pesoMaximo, $pesoCarga,$indiceExtra) {
        parent::__construct($anioInstalacion, $largoV, $anchoV, $pesoVagonVacio);
        $this->pesoMaximo = $pesoMaximo;
        $this->pesoCarga = $pesoCarga;
        $this->indiceExtra=$indiceExtra;
    }
    Public function getPesoMaximo(){
return $this->pesoMaximo;
}
Public function getPesoCarga(){
return $this->pesoCarga;
}

Public function getIndiceExtra(){
return $this->indiceExtra;
}

Public function setPesoMaximo($pesoMaximo){
$this->pesoMaximo=$pesoMaximo;
}
Public function setPesoCarga($pesoCarga){
$this->pesoCarga=$pesoCarga;
}
Public function setIndeceExtra($indiceExtra){
$this->indiceExtra=$indiceExtra;
}
    
    

    public function incorporarCargaVagon(float $cantidad){
        $pesoC=$this->getPesoCarga();
        if ($this->getPesoCarga() + $cantidad <= $this->getpesoMaximo()) {
            $pesoC += $cantidad;
            return true;
        }
        return false;
    }

   public function calcularPesoTotal() {
        return $this->getPesoVagonVacio() + $this->getPesoCarga() + ($this->getPesoCarga() * $this->indiceExtra);
    }
}