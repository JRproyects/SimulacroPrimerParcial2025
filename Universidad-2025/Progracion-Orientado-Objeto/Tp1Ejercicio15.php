<?php
//15. Un teatro se caracteriza por su nombre y su dirección y en él se realizan 4 funciones al día. Cada función tiene un nombre y un precio.
//Realice el diseño de la clase Teatro e indique qué métodos tendría que tener la clase, teniendo en cuenta que se pueda cambiar el nombre del teatro y la dirección, el nombre de un función y el precio.
//Implementar las 4 funciones usando array de array asociativo. Cada función es un array asociativo con las claves “nombre” y “precio”

// Clase Teatro
class Teatro
{
    private string $nombre;
    private string $direccion;
    private array $cantidadDeFunciones;

    // Constructor
    public function __construct(string $nombre, string $direccion, array $cantidadDeFunciones)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->cantidadDeFunciones = $cantidadDeFunciones;
    }

    // Getters
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function getCantidadDeFunciones(): array
    {
        return $this->cantidadDeFunciones;
    }

    // Setters
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDireccion(string $direccion)
    {
        $this->direccion = $direccion;
    }

    public function setCantidadDeFunciones(array $cantidadDeFunciones)
    {
        $this->cantidadDeFunciones = $cantidadDeFunciones;
    }

    // Modificar función específica por índice
    public function modificarFuncion(int $indice, string $nuevoNombre, float $nuevoPrecio)
    {
        if (isset($this->cantidadDeFunciones[$indice])) {
            $this->cantidadDeFunciones[$indice]['nombre'] = $nuevoNombre;
            $this->cantidadDeFunciones[$indice]['precio'] = $nuevoPrecio;
        } else {
            echo "El índice es inválido.\n";
        }
    }

    // ToString
    public function __toString(): string
    {
        $info = "Teatro: {$this->nombre}\nDirección: {$this->direccion}\nFunciones:\n";
        foreach ($this->cantidadDeFunciones as $indice => $funcion) {
            $info .= "  [$indice] {$funcion['nombre']} - Precio: \$" . number_format($funcion['precio'], 2) . "\n";
        }
        return $info;
    }
}

// Funciones iniciales
$funciones = [
    ['nombre' => 'Hamlet', 'precio' => 1500],
    ['nombre' => 'Fantasma de la ópera', 'precio' => 2500],
    ['nombre' => 'La vida es sueño', 'precio' => 2600],
    ['nombre' => 'Casa de muñecas', 'precio' => 3300]
];

// Crear instancia del teatro
$miTeatro = new Teatro("Teatro Central", "Av. Siempre Viva 123", $funciones);

// Mostrar teatro original
echo $miTeatro . "\n";

// Modificar una función
$miTeatro->modificarFuncion(1, "Obra X", 750);

// Mostrar teatro modificado
echo $miTeatro . "\n";

// Cambiar nombre y dirección
$miTeatro->setNombre("Gran Teatro Nacional");
$miTeatro->setDireccion("Calle Falsa 456");

// Mostrar teatro final
echo $miTeatro . "\n";
