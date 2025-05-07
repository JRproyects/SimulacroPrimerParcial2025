<?php
class Financiera
{
    private string $denominacion;
    private string $direccion;
    private array $prestamosOtorgados;

    public function __construct(string $denominacion, string $direccion,array $prestamosOtorgados)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->prestamosOtorgados = [];
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getPrestamosOtorgados()
    {
        return $this->prestamosOtorgados;
    }

    public function setDenominacion(string $denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function setDireccion(string $direccion)
    {
        $this->direccion = $direccion;
    }

    public function agregarPrestamo(Prestamo $prestamo)
    {
        $this->prestamosOtorgados[] = $prestamo;
    }

    public function otorgarPrestamo(float $monto, int $cantidadDeCuotas, float $tasaDeInteres, Cliente $cliente1)
    {
        $prestamo = new Prestamo(
            rand(1, 9999),
            "912CL",
            "",
            $monto,
            $cantidadDeCuotas,
            $tasaDeInteres,
            $cliente1
        );
        $prestamo->otorgarPrestamo();
        $this->prestamosOtorgados[] = $prestamo;
    }
    public function otorgarPrestamoSiCalifica()
    {
        foreach ($this->prestamosOtorgados as $prestamo) {
            if ($prestamo->getColeccionDeCuota() == null) {
                $cuota = $prestamo->getMonto() / $prestamo->getCantidadDeCuotas();
                if ($cuota <= $prestamo->getCliente()->getNeto() * 0.4)//le puse asi dado que es lo mismo que dividir por 100 y eso aparte vi que en el discord un chico pregunto y le dejaron multiplicar jeje

                 {
                    $prestamo->otorgarPrestamo();
                }
            }
        }
    }
    
    public function informarCuotaPagar(int $idPrestamo)
{
    $prestamoPaDar=null;
    foreach ($this->prestamosOtorgados as $prestamo) {
        if ($prestamo->getIdentificacion() === $idPrestamo && $prestamoPaDar=== null) {
             $prestamoPaDar=$prestamo->darSiguienteCuotaPagar();
        }
    }
    return $prestamoPaDar;
}

    

    
    public function __toString(): string
    {
        $prestamostomados = "";
        foreach ($this->prestamosOtorgados as $prestamo) {
            $prestamostomados .= $prestamo . "\n";
        }

        return "Denominación: {$this->denominacion}\n" .
               "Dirección: {$this->direccion}\n" .
               "Préstamos Otorgados:\n{$prestamostomados}";
    }
}
