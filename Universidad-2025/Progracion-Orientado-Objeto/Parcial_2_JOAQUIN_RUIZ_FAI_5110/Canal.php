<?php
class Canal
{
    private $nombre;
    private $numero;

    public function __construct($nombre, $numero)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function __toString()
    {
        return "Canal: " . $this->nombre . " (N° " . $this->numero . ")";
    }
}
