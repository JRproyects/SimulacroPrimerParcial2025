    <?php
    include "Cliente.php";
    include "Contrato.php";
    include "ContratoWeb.php";
    class EmpresaCable
    {
        private string $nombre;
        private string $direccion;
        private array $coleccionPlanes;
        private array $coleccionClientes;
        private array $coleccionContratos;

        public function __construct($nombre, $direccion, $coleccionPlanes = [], $coleccionClientes = [], $coleccionContratos = [])
        {
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->coleccionPlanes = $coleccionPlanes;
            $this->coleccionClientes = $coleccionClientes;
            $this->coleccionContratos = $coleccionContratos;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getDireccion()
        {
            return $this->direccion;
        }

        public function getColeccionPlanes()
        {
            return $this->coleccionPlanes;
        }

        public function getColeccionClientes()
        {
            return $this->coleccionClientes;
        }

        public function getColeccionContratos()
        {
            return $this->coleccionContratos;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;
        }

        public function setColeccionPlanes($coleccionPlanes)
        {
            $this->coleccionPlanes = $coleccionPlanes;
        }

        public function setColeccionClientes($coleccionClientes)
        {
            $this->coleccionClientes = $coleccionClientes;
        }

        public function setColeccionContratos($coleccionContratos)
        {
            $this->coleccionContratos = $coleccionContratos;
        }



        public function incorporarPlan($nuevoPlan)
        {
            $existe = false;
            $x = 0;
            $tempTeplanes = $this->getColeccionPlanes();
            $cantidadPlanes = count($this->coleccionPlanes);

            while ($x < $cantidadPlanes && !$existe) {
                $planExistente = $this->coleccionPlanes[$x];

                if (
                    $planExistente->getColeccionCanales() == $nuevoPlan->getColeccionCanales() &&
                    $planExistente->getCantidadMG() == $nuevoPlan->getCantidadMG()
                ) {
                    $existe = true;
                }

                $x++;
            }

            if (!$existe) {
                $tempTeplanes[] = $nuevoPlan;
                $this->setColeccionPlanes($tempTeplanes);
            }

            return $existe;
        }

        public function buscarContrato($tipoDocumento, $numeroDocumento)
        {
            $contratoEncontrado = null;
            $x = 0;
            $coleccionContratos = $this->getColeccionContratos();
            $cantidadContratos = count($coleccionContratos);

            while ($x < $cantidadContratos && $contratoEncontrado === null) {
                $contrato = $coleccionContratos[$x];
                $cliente = $contrato->getCliente();

                if ($cliente->getTipoDocumento() === $tipoDocumento && $cliente->getNumeroDocumento() === $numeroDocumento) {
                    $contratoEncontrado = $contrato;
                }

                $x++;
            }

            return $contratoEncontrado;
        }

        public function retornarPromImporteContratos($codigoPlan)
        {

            $totalImporte = 0;

            $cantidadContratos = 0;

            $coleccionContratos = $this->getColeccionContratos();

            $x = 0;



            while ($x < count($coleccionContratos)) {

                $contrato = $coleccionContratos[$x];



                if ($contrato->getPlan()->getCodigo() === $codigoPlan) {

                    $totalImporte += $contrato->calcularImporte();

                    $cantidadContratos++;
                }



                $x++;
            }



            $promImporte = ($cantidadContratos > 0) ? ($totalImporte / $cantidadContratos) : 0;



            return $promImporte;
        }

        public function incorporarContrato($plan, $cliente, $fechaInicio, $fechaVencimiento, $esWeb)
        {

            $contratoExistente = $this->buscarContrato($cliente->getTipoDocumento(), $cliente->getNumeroDocumento());



            if ($contratoExistente !== null && $contratoExistente->getEstado() !== "finalizado") {

                $contratoExistente->setEstado("finalizado");
            }



            if ($esWeb) {

                $nuevoContrato = new ContratoWeb($fechaInicio, $fechaVencimiento, "al día", $plan, $plan->getImporte(), true, $cliente);
            } else {

                $nuevoContrato = new Contrato($fechaInicio, $fechaVencimiento, "al día", $plan, $plan->getImporte(), true, $cliente);
            }



            $coleccionContratos = $this->getColeccionContratos();

            $coleccionContratos[] = $nuevoContrato;

            $this->setColeccionContratos($coleccionContratos);
        }

        public function pagarContrato($codigoContrato)
        {

            $contratoEncontrado = null;

            $x = 0;

            $coleccionContratos = $this->getColeccionContratos();

            $cantidadContratos = count($coleccionContratos);



            while ($x < $cantidadContratos && $contratoEncontrado === null) {

                if ($coleccionContratos[$x]->getCodigo() === $codigoContrato) {

                    $contratoEncontrado = $coleccionContratos[$x];
                }

                $x++;
            }



            if ($contratoEncontrado !== null) {

                $importeFinal = $contratoEncontrado->calcularImporte();




                if ($contratoEncontrado->getEstado() !== "finalizado") {

                    $contratoEncontrado->setEstado("al día");
                }



                return $importeFinal;
            }
        }
    }
