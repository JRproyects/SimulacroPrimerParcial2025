<?php
class Cliente
{
    private string $nombre;
    private string $apellido;
    private int $dni;
    private string $direccion;
    private string $mail;
    private int $telefono;
    private float $neto;
    public function __construct(string $nombre, string $apellido, int $dni, string $direccion, string $mail, int $telefono, float $neto)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->mail = $mail;
        $this->neto = $neto;
    }

    // GETTERss
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

    public function getdni(): int
    {
        return $this->dni;
    }
    public function getMail(): string
    {
        return $this->mail;
    }
    public function getTelefono(): int
    {
        return $this->telefono;
    }
    public function getNeto(): float
    {
        return $this->neto;
    }

    // SETTERss
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

    public function setdni(int $dni): void
    {
        $this->dni = $dni;
    }
    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }
    public function setTelefono(int $telefono)
    {
        $this->telefono = $telefono;
    }
    public function setNeto(float $neto)
    {
        $this->neto = $neto;
    }
    public function __toString()
    {
        return "Nombre: {$this->nombre}\n" .
            "Apellido: {$this->apellido}\n" .
            "DNI: {$this->dni}\n" .
            "Dirección: {$this->direccion}\n" .
            "Mail: {$this->mail}\n" .
            "Teléfono: {$this->telefono}\n" .
            "Neto: {$this->neto}\n";
    }
}
