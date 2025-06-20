<?php
include "Contrato.php";
class ContratoWeb extends Contrato
{
    private int $descuento;

    public function __construct($fechaInicio, $fechaVencimiento, $estado, $plan, $costo, $renovacion, $cliente, $descuento = 10)
    {
        parent::__construct($fechaInicio, $fechaVencimiento, $estado, $plan, $costo, $renovacion, $cliente);
        $this->descuento = $descuento;
    }

    // Getter y Setter los añados por las dudas, por mas que no este en la consigna
    public function getDescuento()
    {
        return $this->descuento;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }


    public function calcularImporte()
    {
        $importeBase = parent::calcularImporte();
        $importeFinal = $importeBase - ($importeBase * $this->getDescuento() / 100);

        return $importeFinal;
    }


    public function __toString()
    {
        return parent::__toString() . "\n Descuento aplicado: " . $this->getDescuento() . "%";
    }
}
