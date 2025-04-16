<?php
class Aerolineas
{
    //identificación, nombre y la colección de vuelos programados
    private string $identificacion;
    private string $nombreA;
    private array $coleccionVuelosP;

    public function __construct(string $identificacion, string $nombreA, array $coleccionVuelosP)
    {
        $this->identificacion = $identificacion;
        $this->nombreA = $nombreA;
        $this->coleccionVuelosP = $coleccionVuelosP;
    }
    public function getIdentificacion()
    {
        return $this->identificacion;
    }
    public function getNombreA()
    {
        return $this->nombreA;
    }
    public function getColeccionVuelosP()
    {
        return $this->coleccionVuelosP;
    }
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }
    public function setNombreA($nombreA)
    {
        $this->nombreA = $nombreA;
    }
    public function setColeccionVuelosProgramados(array $vuelosP)
    {
        $this->coleccionVuelosP = $vuelosP;
    }
    public function __toString()
    {
        return "";
    }
    public function darVueloADestino($destino, $cant_asientos)
    {
        $colVuelos = [];
        $VuelosAereolinea = $this->getColeccionVuelosP();

        foreach ($VuelosAereolinea as $unObjVuelo) {
            $elDestino = $unObjVuelo->getDestino();
            $cant_Disponible = $unObjVuelo->getCantAsientosDisponibles();

            if ($elDestino == $destino && $cant_Disponible >= $cant_asientos) {
                array_push($colVuelos, $unObjVuelo);
            }
        }

        return $colVuelos;
    }

    public function incorporarVuelo(Vuelos $vueloNuevo)
    {
        $vuelosExistentes = $this->getColeccionVuelosP();

        foreach ($vuelosExistentes as $vuelo) {
            if (
                $vuelo->getDestino() === $vueloNuevo->getDestino() &&
                $vuelo->getFecha() === $vueloNuevo->getFecha() &&
                $vuelo->getHoraPartida() === $vueloNuevo->getHoraPartida()
            ) {
                return false;
            }
        }
        $this->coleccionVuelosP[] = $vueloNuevo;
        return true;
    }

    public function venderVueloADestino(int $cantAsientos, string $destino, string $fecha)
    {
        foreach ($this->coleccionVuelosP as $vuelo) {
            if (
                $vuelo->getDestino() === $destino &&
                $vuelo->getFecha() === $fecha &&
                $vuelo->getCantidadDeAsientosD() >= $cantAsientos
            ) {
                $asignado = $vuelo->asignarAsientosDisponibles($cantAsientos);

                if ($asignado) {
                    return $vuelo;
                }
            }
        }

        return null;
    }
    public function montoPromedioRecaudado()
    {
        $colVuelosAerolinea = $this->coleccionVuelosP;
        $cantVuelos = count($colVuelosAerolinea);
        $sumaTotal = 0.0;

        if ($cantVuelos > 0) {
            foreach ($colVuelosAerolinea as $unObjVuelo) {
                $vImporte = $unObjVuelo->getImporte();
                $vAsientosVendidos = $unObjVuelo->getCantAsientosTotales() - $unObjVuelo->getCantAsientosDisponibles();
                $sumaTotal += $vImporte * $vAsientosVendidos;
            }
            $promedio = $sumaTotal / $cantVuelos;
        } else {
            $promedio = 0;
        }

        return $promedio;
    }
}
