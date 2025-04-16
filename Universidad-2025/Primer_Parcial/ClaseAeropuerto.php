<?php
class Aeropuerto
{
    private string $denominacion;
    private string $direccionA;
    private array $colAereolineas;

    public function __construct($denominacion, $direccionA, array $colAereolineas = [])
    {
        $this->denominacion = $denominacion;
        $this->direccionA = $direccionA;
        $this->colAereolineas = $colAereolineas;
    }

    // Getter
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function getDireccionA()
    {
        return $this->direccionA;
    }

    public function getColAereolineas()
    {
        return $this->colAereolineas;
    }

    // Settes
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccionA)
    {
        $this->direccionA = $direccionA;
    }

    public function setColAereolineas($colAereolineas)
    {
        $this->colAereolineas = $colAereolineas;
    }

    public function agregarAerolinea($unaAerolinea)
    {
        $this->colAereolineas[] = $unaAerolinea;
    }
    public function __toString()
    {
        $cadena = "Aeropuerto: {$this->denominacion}\n";
        $cadena .= "Dirección: {$this->direccionA}\n";
        $cadena .= "Aerolíneas:\n";

        foreach ($this->colAereolineas as $aerolinea) {
            $cadena .= $aerolinea->__toString() . "\n";
        }

        return $cadena;
    }


    public function retornarVuelosAerolinea($unaAerolinea)
    {
        $vuelos = [];

        foreach ($this->colAereolineas as $aerolinea) {
            if ($aerolinea == $unaAerolinea) {
                $vuelos = $aerolinea->getColeccionVuelosP();
                break;
            }
        }

        return $vuelos;
    }
    public function ventaAutomatica($cantAsientos, $fecha, $destino)
    {
        $ventaExitosa = false;

        foreach ($this->colAereolineas as $aerolinea) {
            $vuelos = $aerolinea->getColeccionVuelosP();

            foreach ($vuelos as $vuelo) {
                if ($vuelo->getFecha() == $fecha && $vuelo->getDestino() == $destino) {
                    $ventaExitosa = $vuelo->venderAsientos($cantAsientos);

                    if ($ventaExitosa) {
                        break 2; //va a salire cuando coundan los forech
                    }
                }
            }
        }

        return $ventaExitosa;
    }

    public function promedioRecaudadoXAerolinea($idAerolinea)
    {

        $aerolineas = $this->colAereolineas;

        $totalRecaudado = 0;

        $cantidadVuelos = 0;



        foreach ($aerolineas as $aerolinea) {

            if ($aerolinea->getIdentificacion() == $idAerolinea) {

                $vuelos = $aerolinea->getColeccionVuelosP();



                foreach ($vuelos as $vuelo) {

                    $totalRecaudado += $vuelo->getImporteTotal();

                    $cantidadVuelos++;
                }



                break; //SI EN EL CASO DE SER ENCONTRADO NO TENDRIA QUE SEGUIR, 

            }
        }



        if ($cantidadVuelos > 0) {

            return $totalRecaudado / $cantidadVuelos;
        } else {

            return 0;
        }
    }
}
