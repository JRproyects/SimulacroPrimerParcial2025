<?php
class AlquilerEmpresa
{

    private string $nombre;
    private string $direccion;
    private array $clientes;
    private  array $autos;
    private array $alquileres;

    public function __construct(string $nombre, string $direccion, array $clientes, array $autos, array $alquileres)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->clientes = $clientes;
        $this->autos = $autos;
        $this->alquileres = $alquileres;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getClientes()
    {
        return $this->clientes;
    }
    public function getAutos()
    {
        return $this->autos;
    }
    public function getAlquileres()
    {
        return $this->alquileres;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function setClientes($clientes)
    {
        $this->clientes = $clientes;
    }
    public function setAutos($autos)
    {
        $this->autos = $autos;
    }
    public function setAlquileres($alquileres)
    {
        $this->alquileres = $alquileres;
    }
    public function agregarCliente(Cliente $cliente)
    {
        $this->clientes[] = $cliente;
    }

    public function agregarAuto(Auto $auto)
    {
        $this->autos[] = $auto;
    }


    public function registrarAlquiler(Cliente $cliente, Auto $auto, int $dias, string $fecha)
    {
        if ($cliente->getActivo()  && $auto->getActivo()) {

            $precioFinal = $auto->getCostoPorDia() * $dias;

            $newAlquiler = new Alquiler($cliente, $auto, $dias, $fecha, $precioFinal);

            $this->alquileres[] = $newAlquiler;

            return $newAlquiler;
        } else {
            echo "Los datos no validos, no se encuntra habilado.";
        }
    }
    public function __toString()
    {
        return "Empresa: {$this->nombre}, Dirección: {$this->direccion}, Clientes: " . count($this->clientes) . ", Autos: " . count($this->autos) . ", Alquileres: " . count($this->alquileres);
    }
}
