<?php
//clase del cliente
class Cliente
{
    private string $nombre;
    private string $apellido;
    private bool $baja;
    private string $tipoDeDocumento;
    private int $documento;
    public function __construct(string $nombre, string $apellido, bool $baja, string $tipoDeDocumento, int $documento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->baja = $baja;
        $this->tipoDeDocumento = $tipoDeDocumento;
        $this->documento = $documento;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getbaja()
    {
        return $this->baja;
    }
    public function getTipoDeDocumento()
    {
        return $this->tipoDeDocumento;
    }
    public function getDocumento()
    {
        return $this->documento;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function setBaja($baja)
    {
        $this->baja = $baja;
    }
    public function setTipoDeDocumento($tipoDeDocumento)
    {
        $this->tipoDeDocumento = $tipoDeDocumento;
    }
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }
    public function estadoBaja()
    {
        return $this->baja;
    }

    public function __toString()
    {
        return "Cliente: {$this->nombre} {$this->apellido}\n" .
            "Dado de baja: " . ($this->baja ? 'Sí' : 'No') . "\n" .
            "Documento: {$this->tipoDeDocumento} {$this->documento}\n";
    }
}
