<?php
class Cliente
{
    private string $nombre;

    private string $apellido;

    private string $tipoDocumento;

    private int $numeroDocumento;

    private bool $activo;

    public function __construct(string $nombre, string $apellido, string $tipoDocumento, int $numeroDocumento, bool $activo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        $this->activo = $activo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function  getApellido()
    {
        return $this->apellido;
    }
    public function  getTipoDocumento()
    {
        return $this->tipoDocumento;
    }
    public function  getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }
    public function  getActivo()
    {
        return $this->activo;
    }
    public function   setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function   setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function   setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }
    public function  setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }
    public function  setActivo($activo)
    {
        $this->activo = $activo;
    }
    public function __toString()
    {

        $estado = $this->activo ? "Activo" : "Inactivo";
        return "El cliente;" . "{$this->nombre}" . " , " . "{$this->apellido}" . " , " . "{$this->tipoDocumento}" . " , " . "{$this->numeroDocumento}" . " , el mismo se encuentra:  " . " ," . "Estado: {$estado}";
    }
    public function darDeBaja()
    {
        if ($this->activo) {
            return $this->activo = false;
            return "Cliente dado de baja correctamente.\n";
        } else {
            return "el cliente ya se encutra dado de baja. \n";
        }
    }
}
