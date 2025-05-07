<?php
class Alquiler
{
    private  Cliente $clientes;
    private  Auto $autos;
    private  int $dias;
    private  string $fecha;
    private  float $precioFinal;

    public function __construct(Cliente $clientes, Auto $auto, int $dias, string $fecha, float $precioFinal)
    {
        $this->clientes = $clientes;
        $this->autos = $auto;
        $this->dias = $dias;
        $this->fecha = $fecha;
        $this->precioFinal = $precioFinal;
    }
    public function getClientes()
    {
        return $this->clientes;
    }
    public function getAutos()
    {
        return $this->autos;
    }
    public function getDias()
    {
        return $this->dias;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }
    public function setClientes($clientes)
    {
        $this->clientes = $clientes;
    }
    public function setAutos($autos)
    {
        $this->autos = $autos;
    }
    public function setDias($dias)
    {
        $this->dias = $dias;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }


    //Método calcularPrecio() que devuelva el precio final (dias * costoPorDia)
    public function calcularPrecio()
    {
        return ($this->autos->getCostoPorDia() * $this->dias);
    }

    public function __toString()
    {
        return "El cliente: {$this->clientes} , alquilo el siguiente vehiculo: {$this->autos}, por un total de {$this->dias} dias. Dado el caso tiene un valor de {$this->calcularPrecio()}, desde la fecha {$this->fecha}";
    }
}
