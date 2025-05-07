<?php
//Implementar una clase Disquera con los atributos: hora_desde y hora_hasta (que indican el horario de atención de la tienda), estado (abierta o cerrada), dirección y dueño. El atributo dueño debe referenciar a un objeto de la clase Persona implementada en el punto 
//1. Defina en la clase los siguientes métodos: 
//a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos de la clase. 
//b) Los métodos de acceso de cada uno de los atributos de la clase. 
//c) dentro HorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe encontrarse abierta en ese horario y false en caso contrario. 
//d) abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura. 
//e) cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre. 
//f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase. 
//g) Crear un script Test_Disquera que cree un objeto Disquera e invoque a cada uno de los métodos implementados.

class Disquera
{
    private int $hora_desde;
    private int $hora_hasta;
    private string $estado;
    private string $direccion;
    private Persona $duenio;
    public function __construct(int $hora_desde, int $hora_hasta, string $estado, string $direccion, Persona $duenio)
    {
        $this->hora_desde = $hora_desde;
        $this->hora_hasta = $hora_hasta;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->duenio = $duenio;
    }
    public function gethora_desde()
    {
        return $this->hora_desde;
    }
    public function gethora_hasta()
    {
        return $this->hora_hasta;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getDuenio()
    {
        return $this->duenio;
    }
    public function sethora_desde(int $hora_desde)
    {
        $this->hora_desde = $hora_desde;
    }

    public function sethora_hasta(int $hora_hasta)
    {
        $this->hora_hasta = $hora_hasta;
    }
    public function setEstado(string $estado)
    {
        $this->estado = $estado;
    }
    public function setDireccion(string $direccion)
    {
        $this->direccion = $direccion;
    }
    public function setDuenio(Persona $duenio)
    {
        $this->duenio = $duenio;
    }


    public function dentroHorarioAtencion(int $hora, int $minutos): bool
    {
        $hora_actual = $hora + ($minutos / 60); // lo pasamos a decimal
        return $hora_actual >= $this->hora_desde && $hora_actual <= $this->hora_hasta;
    }

    public function abrirDisquera(int $hora, int $minutos)
    {
        if ($this->dentroHorarioAtencion($hora, $minutos)) {
            $this->estado = 'Abierto';
        } else {
            echo "no se abre la disquera fuera del horario establecido.\n";
        }
    }
    public function cerrarDisquera(int $hora, int $minutos)
    {
        if (!$this->dentroHorarioAtencion($hora, $minutos)) {
            $this->estado = 'Cerrado';
        } else {
            echo "No se puede cerrar la disquera durante el horario de atención.\n";
        }
    }

    public function __toString(): string
    {
        return "La tienda se encuentra abierta desde {$this->hora_desde} hasta {$this->hora_hasta}. 
Estado actual: {$this->estado}. 
Dirección: {$this->direccion}. 
Dueño: {$this->duenio}.\n";
    }
}
