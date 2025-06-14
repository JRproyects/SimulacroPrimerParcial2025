<?php
class Persona
{
    private string $nombre;
    private string $apellido;


    public function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;

    }
    // Getters
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }


    // Setters
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }



    // Método __toString()
    public function __toString(): string
    {
        return "Nombre: {$this->nombre} {$this->apellido}\n";

    }
}
