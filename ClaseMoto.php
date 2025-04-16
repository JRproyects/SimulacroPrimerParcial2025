<?php
class Moto
{
    private int $codigo;
    private float $costo;
    private int $anioF;
    private string $descripcion;
    private float $porcentajeDeIncrementoAnual;
    private bool $activa;
    public function __construct(int $codigo, float $costo, int $anioF, string $descripcion, float $porcentajeDeIncrementoAnual, bool $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioF = $anioF;
        $this->descripcion = $descripcion;
        $this->porcentajeDeIncrementoAnual = $porcentajeDeIncrementoAnual;
        $this->activa = $activa;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function getAnioF()
    {
        return $this->anioF;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getPorcentajeDeIncrementoAnual()
    {
        return $this->porcentajeDeIncrementoAnual;
    }
    public function getActiva()
    {
        return $this->activa;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function setAnioF($anioF)
    {
        $this->anioF = $anioF;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeDeIncrementoAnual($porcentajeDeIncrementoAnual)
    {
        $this->porcentajeDeIncrementoAnual = $porcentajeDeIncrementoAnual;
    }
    public function setActiva($activa)
    {
        $this->activa = $activa;
    }
    public function __toString()
    {
        return "Código: {$this->codigo}\n" .
            "Costo: \${$this->costo}\n" .
            "Año de fabricación: {$this->anioF}\n" .
            "Descripción: {$this->descripcion}\n" .
            "Incremento anual: {$this->porcentajeDeIncrementoAnual}\n" .
            "Estado: " . ($this->activa ? "Activa" : "Inactiva") . "\n";
    }
    public function darPrecioVenta()
    {
        if ($this->activa) {
            return $this->costo + $this->costo * ((2025 - $this->anioF) * $this->porcentajeDeIncrementoAnual);
        } else {
            return -1; // Usamos -1 para indicar que la moto no está disponible
        }
    }
}
