<?php

class Contrato
{
    // Atributos privados
    private $fechaInicio;
    private $fechaVencimiento;
    private $estado;
    private $plan;
    private $costo;
    private $renovacion;
    private $cliente;


    // Constructor
    public function __construct($fechaInicio, $fechaVencimiento, $estado, $plan, $costo, $renovacion, $cliente)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->estado = $estado;
        $this->plan = $plan;
        $this->costo = $costo;
        $this->renovacion = $renovacion;
        $this->cliente = $cliente;
    }

    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getPlan()
    {
        return $this->plan;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function getRenovacion()
    {
        return $this->renovacion;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setPlan($plan)
    {
        $this->plan = $plan;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function setRenovacion($renovacion)
    {
        $this->renovacion = $renovacion;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }


    public function __toString() {}


    private function diasContratoVencido()
    {
        $hoy = new DateTime();
        $vencimiento = new DateTime($this->getFechaVencimiento());

        $diasVencidos = ($hoy > $vencimiento) ? $vencimiento->diff($hoy)->days : 0;

        return $diasVencidos;
    }

    public function actualizarEstadoContrato()
    {
        $diasVencidos = $this->diasContratoVencido();

        if ($this->getEstado() !== "finalizado") {
            if ($diasVencidos > 10) {
                $this->setEstado("suspendido");
            } elseif ($diasVencidos > 0) {
                $this->setEstado("moroso");
            } else {
                $this->setEstado("al día");
            }
        }
        return $this->getEstado();
    }


    public function calcularImporte()
    {
        $importeFinal = $this->getCosto();

        if ($this->getEstado() === "moroso" || $this->getEstado() === "suspendido") {
            $diasVencidos = $this->diasContratoVencido();
            if ($diasVencidos > 0) {
                $multa = ($importeFinal * 0.10) * $diasVencidos;
                $importeFinal += $multa;
            }
        }

        return $importeFinal;
    }
}
