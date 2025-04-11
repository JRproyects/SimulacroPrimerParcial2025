<?php
class Venta
{
    private int $numero;
    private ?string $fecha;
    private Cliente $objCliente;
    private  $IntroMoto = [];
    private float $precioFinal = 0;

    public function __construct(int $numero, ?string $fecha, Cliente $objCliente, float $precioFinal)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->precioFinal = $precioFinal;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getObjCliente()
    {
        return $this->objCliente;
    }
    public function getObjMoto()
    {
        return $this->IntroMoto;
    }
    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }
    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }
    public function setFecha(?string $fecha)
    {
        $this->fecha = $fecha;
    }
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    public function setPrecioFinal(float $precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }
    public function __toString()
    {
        $motosTexto = "";
        foreach ($this->IntroMoto as $moto) {
            $motosTexto .= $moto . "\n";
        }

        return "Venta N° {$this->numero}\n" .
            "Fecha: {$this->fecha}\n" .
            "Cliente: {$this->objCliente}\n" .
            "Motos Vendidas:\n{$motosTexto}" .
            "Precio Final: {$this->precioFinal}\n";
    }
    public function incorporarMoto(Moto $objMoto)
    {
        $precioVenta = $objMoto->darPrecioVenta();
        if ($precioVenta > 0) {
            $this->IntroMoto[] = $objMoto;
            $this->precioFinal += $precioVenta;
            return true;
        }
        return false;
    }
}
