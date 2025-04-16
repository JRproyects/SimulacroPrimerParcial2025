<?php
class Vuelos
{
    // número, importe, fecha, destino, hora arribo, hora partida, cantidad asientos totales y disponibles, y una referencia a la persona responsable del vuelo. 
    private int $numero;
    private float $importe;
    private string $fecha;
    private string $destino;
    private string $horaArribo;
    private string $horaPartida;
    private int $cantidadDeAsientosT;
    private int $cantidadDeAsientosD;
    private Persona $responsableVuelo;

    public function __construct(int $numero, float $importe, string $fecha, string $destino, string $horaArribo, string $horaPartida, int $cantidadDeAsientosD, int $cantidadDeAsientosT, Persona $responsableVuelo)
    {
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->destino = $destino;
        $this->horaArribo = $horaArribo;
        $this->horaPartida = $horaPartida;
        $this->cantidadDeAsientosD = $cantidadDeAsientosD;
        $this->cantidadDeAsientosT = $cantidadDeAsientosT;
        $this->responsableVuelo = $responsableVuelo;
    }

    //gettess
    public function getNumero()
    {
        return $this->numero;
    }
    public function getImporte()
    {
        return $this->importe;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getHoraArribo()
    {
        return $this->horaArribo;
    }
    public function getHoraPartida()
    {
        return $this->horaPartida;
    }
    public function getCantidadDeAsientosD()
    {
        return $this->cantidadDeAsientosD;
    }
    public function getCantidadDeAsientosT()
    {
        return $this->cantidadDeAsientosT;
    }
    public function getResponsableVuelo()
    {
        return $this->responsableVuelo;
    }

    //setterss

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function setHoraArribo($horaArribo)
    {
        $this->horaArribo = $horaArribo;
    }
    public function setHoraPartida($horaPartida)
    {
        $this->horaPartida = $horaPartida;
    }
    public function setCantidadDeAsientosD($cantidadDeAsientosD)
    {
        $this->cantidadDeAsientosD = $cantidadDeAsientosD;
    }
    public function setCantidadDeAsientosT($cantidadDeAsientosT)
    {
        $this->cantidadDeAsientosT = $cantidadDeAsientosT;
    }
    public function setResponsableVuelo($responsableVuelo)
    {
        $this->responsableVuelo = $responsableVuelo;
    }

    public function asignarAsientosDisponibles($cant_pasajeros)
    {
        $respuesta = false;
        if ($this->cantidadDeAsientosT > $this->cantidadDeAsientosD) {
            $cant_disp = $this->getCantidadDeAsientosD();
            if ($cant_pasajeros <= $cant_disp) {
                $this->setCantidadDeAsientosD($cant_disp - $cant_pasajeros); //para mi tendria actualizarlo 
                $respuesta = true;
            }
            return $respuesta; //y lo devuelve en un return 
        }
        return false;
    }
}
