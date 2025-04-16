<?php
class Persona
{
    private string $nombre;
    private string $apellido;
    private string $direccion;
    private string $mail;
    private int $telefono;
    public function __construct(string $nombre, string $apellido, string $direccion, string $mail, int $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->mail = $mail;
    }

    // GETTERS
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }


    public function getMail(): string
    {
        return $this->mail;
    }
    public function getTelefono(): int
    {
        return $this->telefono;
    }


    // SETTERS
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }
    public function setTelefono(int $telefono)
    {
        $this->telefono = $telefono;
    }

    public function __toString()
    {
        return "Nombre: {$this->nombre}\n" .
            "Apellido: {$this->apellido}\n" .
            "Dirección: {$this->direccion}\n" .
            "Mail: {$this->mail}\n" .
            "Teléfono: {$this->telefono}\n";
    }
}
