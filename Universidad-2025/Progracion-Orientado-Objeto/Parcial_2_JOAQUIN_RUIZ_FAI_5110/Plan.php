<?php
include "Canal.php";
class Plan
{
    private $codigo;
    private $coleccionCanales;
    private $costo;

    public function __construct($codigo, $coleccionCanales, $costo)
    {
        $this->codigo = $codigo;
        $this->coleccionCanales = $coleccionCanales;
        $this->costo = $costo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getColeccionCanales()
    {
        return $this->coleccionCanales;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setColeccionCanales($coleccionCanales)
    {
        $this->coleccionCanales = $coleccionCanales;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function __toString()
    {
        return "Plan Código: " . $this->codigo . ", Costo: $" . $this->costo;
    }
}
