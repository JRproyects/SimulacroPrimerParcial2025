<?php
class Cuota
{
    private  int $numero;
    private  float $montoCuota;
    private float $montoInteres;
    private bool $cancelada;

    public function __construct(int $numero, float $montoCuota, float $montoInteres, bool $cancelada)
    {
        $this->numero = $numero;
        $this->montoCuota = $montoCuota;
        $this->montoInteres = $montoInteres;
        $this->cancelada = $cancelada;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getMontoCuota()
    {
        return $this->montoCuota;
    }
    public function getMontoInteres()
    {
        return $this->montoInteres;
    }
    public function getCancelada()
    {
        return $this->cancelada;
    }

    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }
    public function setMontoCuota(float $montoCuota)
    {
        $this->montoCuota = $montoCuota;
    }
    public function setMontoInteres(float $montoInteres)
    {
        $this->montoInteres = $montoInteres;
    }
    public function setCancelada(bool $cancelada)
    {
        $this->cancelada = $cancelada;
    }

    public function __toString(): string
    {
        return "Número: {$this->numero}\n" .
            "Monto Cuota: {$this->montoCuota}\n" .
            "Monto Interés: {$this->montoInteres}\n" .
            "Cancelada: " . ($this->cancelada ? 'Sí' : 'No') . "\n";
    }

    public function darMontoFinalCuota()
    {
        return $this->montoCuota + ($this->montoCuota * $this->montoInteres);
    }
}
