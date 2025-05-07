<?php
// Clase Persona
include_once "/Users/joaqu/programacion/Universidad-2025/Progracion-Orientado-Objeto/Tp2Ejercicio2.php";

class Persona
{
    private string $nombre;
    private string $apellido;
    private string $tipoDocumento;
    private int $documento;

    public function __construct(string $nombre, string $apellido, string $tipoDocumento, int $documento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->documento = $documento;
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

    public function setTipoDocumento(string $tipoDocumento): void
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setDocumento(int $documento): void
    {
        $this->documento = $documento;
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

    public function getTipoDocumento(): string
    {
        return $this->tipoDocumento;
    }

    public function getDocumento(): int
    {
        return $this->documento;
    }

    public function __toString(): string
    {
        return "{$this->nombre} {$this->apellido} - {$this->tipoDocumento} {$this->documento}";
    }
}

// Test
$duenio = new Persona("Joaquín", "Ruiz", "DNI", 45028145);
$Test_Disquera = new Disquera(8, 19, "Abierto", "calle feliz san martin al 230", $duenio);
echo $Test_Disquera->__toString();
echo "\nIntentando abrir a las 9:00...\n";
$Test_Disquera->abrirDisquera(9, 0);
echo $Test_Disquera;

echo "\nIntentando cerrar a las 20:00...\n";
$Test_Disquera->cerrarDisquera(20, 0);
echo $Test_Disquera;
