<?php
class Prestamo
{
    private string $identificacion;
    private string $fecha;
    private bool $otorgamiento;
    private float $monto;
    private int $cantidadDeCuotas;
    private float $tasaDeInteres;
    private array $coleccionDeCuota;
    private Persona $cliente;

    public function __construct(string $identificacion, string $fecha, bool $otorgamiento, float $monto, int $cantidadDeCuotas, float $tasaDeInteres, array $coleccionDeCuota, Persona $cliente)
    {
        $this->identificacion = $identificacion;
        $this->fecha = $fecha;
        $this->otorgamiento = $otorgamiento;
        $this->monto = $monto;
        $this->cantidadDeCuotas = $cantidadDeCuotas;
        $this->tasaDeInteres = $tasaDeInteres;
        $this->coleccionDeCuota = $coleccionDeCuota;
        $this->cliente = $cliente;
    }
    // GETTERS
    public function getIdentificacion(): string
    {
        return $this->identificacion;
    }
    public function getFecha(): string
    {
        return $this->fecha;
    }
    public function getOtorgamiento(): bool
    {
        return $this->otorgamiento;
    }
    public function getMonto(): float
    {
        return $this->monto;
    }
    public function getCantidadDeCuotas(): int
    {
        return $this->cantidadDeCuotas;
    }
    public function getTasaDeInteres(): float
    {
        return $this->tasaDeInteres;
    }
    public function getColeccionDeCuota(): array
    {
        return $this->coleccionDeCuota;
    }
    public function getCliente(): Persona
    {
        return $this->cliente;
    }

    // SETTERS
    public function setIdentificacion(string $identificacion): void
    {
        $this->identificacion = $identificacion;
    }
    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }
    public function setOtorgamiento(bool $otorgamiento): void
    {
        $this->otorgamiento = $otorgamiento;
    }
    public function setMonto(float $monto): void
    {
        $this->monto = $monto;
    }
    public function setCantidadDeCuotas(int $cantidad): void
    {
        $this->cantidadDeCuotas = $cantidad;
    }
    public function setTasaDeInteres(float $tasa): void
    {
        $this->tasaDeInteres = $tasa;
    }
    public function setColeccionDeCuota(array $cuotas): void
    {
        $this->coleccionDeCuota = $cuotas;
    }
    public function setCliente(Persona $cliente): void
    {
        $this->cliente = $cliente;
    }
    public function __toString(): string
    {
        $cuotasStr = "";
        foreach ($this->coleccionDeCuota as $cuota) {
            $cuotasStr .= $cuota . "\n";
        }

        return "Identificación: {$this->identificacion}\n" .
            "Fecha: {$this->fecha}\n" .
            "Otorgado: " . ($this->otorgamiento ? "Sí" : "No") . "\n" .
            "Monto: {$this->monto}\n" .
            "Cantidad de cuotas: {$this->cantidadDeCuotas}\n" .
            "Tasa de interés: {$this->tasaDeInteres}%\n" .
            "Cliente:\n{$this->cliente}\n" .
            "Cuotas:\n{$cuotasStr}";
    }

    public function calcularDeudaTotal()
    {
        $deuda = 0;
        foreach ($this->coleccionDeCuota as $cuota) {
            if (!$cuota->getCancelada()) {
                $deuda += $cuota->darMontoFinalCuota();
            }
        }
    }

    public function cantidadCuotasCanceladas(): int
    {
        $contador = 0;
        foreach ($this->coleccionDeCuota as $cuota) {
            if ($cuota->getCancelada()) {
                $contador++;
            }
        }
        return $contador;
    }
}
