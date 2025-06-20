<?php
class Cliente
{
    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct($nombre, $apellido, $tipoDocumento, $numeroDocumento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function __toString()
    {
        return "Cliente: {$this->nombre} {$this->apellido}, Documento: {$this->tipoDocumento} {$this->numeroDocumento}";
    }
}
