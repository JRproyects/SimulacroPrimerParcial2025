<?php
include_once "ClaseVagon.php";
class vagonPersonas extends vagon{
    private int $cantidadMaxP;
    private int $cantidadPActuales;
    private float $pesoPromedioP=50;
    public function __construct($anioInstalacion, $largoV, $anchoV, $pesoVagonVacio, $cantidadMaxP, $cantidadPActuales)
    {
        parent::__construct($anioInstalacion, $largoV, $anchoV, $pesoVagonVacio);
        $this->cantidadMaxP=$cantidadMaxP;
        $this->cantidadPActuales=$cantidadPActuales;
    }
    public function getCantidadMaxP(){
        return $this->cantidadMaxP;
    }
    public function getCantidadPActuales(){
        return $this->cantidadPActuales;
    }
    Public function getPesoPromedio(){
return $this->pesoPromedioP;
}
    public function setCantidadMaxP($cantidadMaxP){
        $this->cantidadMaxP=$cantidadMaxP;
    }
    public function setCantidadPActuales($cantidadPActuales){
        $this->cantidadPActuales=$cantidadPActuales;
    }
Public function setPesoPromedioP($pesoPromedioP){
$this->pesoPromedioP=$pesoPromedioP;
}
    public function incorporarPasajeroVagon(int $cantidad): bool {
        $maxP=$this->getCantidadMaxP();
        $perA=$this->getCantidadPActuales();
        if ($perA+ $cantidad <= $maxP()) {
            $perA += $cantidad;
            return true;
        }
        return false;
    }

    public function calcularPesoVagon(): float {
        $pesoV=$this->getPesoVagonVacio();
        $pasajeA=$this->getCantidadPActuales();
        return $pesoV + ($pasajeA * $this->getPesoPromedio());
    }
     public function getPasajerosActuales(): int {
        return $this->getCantidadPActuales();
    }

}