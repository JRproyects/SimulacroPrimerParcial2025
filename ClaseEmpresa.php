<?php
class Empresa
{
    private string $denominacion;
    private string $direccion;
    private array $coleccionClientes = [];
    private array $coleccionMotos = [];
    private array $coleccionVentas = [];

    public function __construct(string $denominacion, string $direccion)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
    }
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setColeccionMotos(array $motos)
    {
        $this->coleccionMotos = $motos;
    }

    public function setColeccionClientes(array $clientes)
    {
        $this->coleccionClientes = $clientes;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }
    public function setDirecciom($direccion)
    {
        $this->direccion = $direccion;
    }
    public function __toString()
    {
        return " La denominacion es:" . $this->denominacion . 'La direccion del cliente es : ' . $this->direccion;
    }
    public function retornarMoto($codigoMoto)
    {
        foreach ($this->coleccionMotos as $moto) {
            if ($moto->getCodigo() == $codigoMoto) {
                return $moto;
            }
        }
        return null; // si no encuentra la moto
    }
    public function registrarVenta(array $colCodigosMoto, Cliente $objCliente)
    {
        //se verifica si el cliente esta dado de baja
        if ($objCliente->estadoBaja()) {
            return -1; // Clliente no habilitado
        }
        $motosParaVender = [];
        $precioFinal = 0;

        foreach ($colCodigosMoto as $codigo) {
            $moto = $this->retornarMoto($codigo);
            if ($moto !== null && $moto->getActiva()) {
                $motosParaVender[] = $moto;
            }
        }
        if (count($motosParaVender) === 0) {
            return -1;
        }
        //okay una ves terminado de comprobar lo que hay que hacer es ver de generar la venta.
        $numeroVenta = count($this->coleccionVentas) + 1;
        $fecha = date("Y-m-d");
        $venta = new Venta($numeroVenta, $fecha, $objCliente, 0.0);

        foreach ($motosParaVender as $moto) {
            $venta->incorporarMoto($moto);
        }

        // se agrega a coleccion de ventas-
        $this->coleccionVentas[] = $venta;

        return $venta->getPrecioFinal();
    }

    public function retornarVentasXCliente($tipoDeDocumento, $documento)
    {
        $ventasCliente = [];
        foreach ($this->coleccionVentas as $venta) {
            $cliente = $venta->getObjCliente();
            if (
                $cliente->getTipoDeDocumento() === $tipoDeDocumento &&
                $cliente->getDocumento() === $documento
            ) {
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }
}
