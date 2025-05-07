<?php
class Prestamo
{
    private string $identificacion;
    private string $codElectroDomestico;
    private bool $otorgamiento;
    private float $monto;
    private int $cantidadDeCuotas;
    private float $tasaDeInteres;
    private array $coleccionDeCuota;
    private Cliente $cliente1;

    public function __construct(int $identificacion, string $codElectroDomestico, string $otorgamiento, float $monto, int $cantidadDeCuotas, float $tasaDeInteres, Cliente $cliente1)
    {   $this->identificacion=1;
        $this->codElectroDomestico = "ESPERA UNA ENTRADA";
        $this->otorgamiento = $otorgamiento;
        $this->monto = $monto;
        $this->cantidadDeCuotas = $cantidadDeCuotas;
        $this->tasaDeInteres = $tasaDeInteres;
        $this->cliente1 = $cliente1;
    }
    // GETTERS
    public function getIdentificacion(): string
    {
        return $this->identificacion;
    }
    public function getCodElectroDomestico(): string
    {
        return $this->codElectroDomestico;
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
    public function getCliente(): Cliente
    {
        return $this->cliente1;
    }

    // SETTERS
    public function setIdentificacion(string $identificacion): void
    {
        $this->identificacion = $identificacion;
    }
    public function setCodElectroDomestico(string $codElectroDomestico): void
    {
        $this->codElectroDomestico = $codElectroDomestico;
    }
    public function setOtorgamiento(string $otorgamiento): void
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
            "codElectroDomestico: {$this->codElectroDomestico}\n" .
            "Otorgado: " . ($this->otorgamiento ? "Sí" : "No") . "\n" .
            "Monto: {$this->monto}\n" .
            "Cantidad de cuotas: {$this->cantidadDeCuotas}\n" .
            "Tasa de interés: {$this->tasaDeInteres}%\n" .
            "Cliente:\n{$this->cliente}\n" .
            "Cuotas:\n{$cuotasStr}";
    }
    private function calcularInteresPrestamo(int $numCuota)
    {
        $cuotaCapital = $this->getMonto() / $this->getCantidadDeCuotas();
        $saldoDeudor = $this->getMonto() - ($cuotaCapital * ($numCuota - 1));
        $interes = $saldoDeudor * $this->getTasaDeInteres();
        return $interes;
    }

    public function otorgarPrestamo()
{    $this->setOtorgamiento(date("Y-m-d"));

    $cuotas = [];
    $cuotaCapital = $this->getMonto() / $this->getCantidadDeCuotas();
    for ($i = 1; $i <= $this->getCantidadDeCuotas(); $i++) {
        $interes = $this->calcularInteresPrestamo($i);
        $montoTotalCuota = $cuotaCapital + $interes;
        $cuotas[] = new Cuota($i, $montoTotalCuota, $interes, false);
    }
    $this->setColeccionDeCuota($cuotas);

}

public function darSiguienteCuotaPagar()
{   $siguienteCuota=null;
    foreach ($this->coleccionDeCuota as $cuota ) {
        if (!$cuota->getCancelada()&& $siguienteCuota === null) {
             $siguienteCuota=$cuota;
        }
    }
    return $siguienteCuota;
}



    public function calcularDeudaTotal()
    {
        $deuda = 0;
        foreach ($this->coleccionDeCuota as $cuota) {
            if (!$cuota->getCancelada()) {
                $deuda += $cuota->darMontoFinalCuota();
            }
        }
        return $deuda;
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
