<?php
class Auto
{


    private string $patente;
    private string $marca;
    private string $modelo;
    private int $anio;
    private float $costoPorDia;
    private bool $activo;



    public function __construct(string $patente, string $marca, string $modelo, int $anio, float $costoPorDia, bool $activo)
    {
        $this->patente = $patente;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anio = $anio;
        $this->costoPorDia = $costoPorDia;
        $this->activo = $activo;
    }
    public function getPatente()
    {
        return $this->patente;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getModelo()
    {
        return $this->modelo;
    }
    public function getCostoPorDia()
    {
        return $this->costoPorDia;
    }
    public function getAnio()
    {
        return $this->anio;
    }
    public function getActivo()
    {
        return $this->activo;
    }

    public function setPatente($patente)
    {
        $this->patente = $patente;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function setAnio($anio)
    {
        $this->anio = $anio;
    }
    public function setCostoPorDia($costoPorDia)
    {
        $this->costoPorDia = $costoPorDia;
    }
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }
    public function __toString()
    {
        $estado = $this->activo ? "activo" : "inactivo";
        return "El auto con patente:  {$this->patente} , es un {$this->marca} {$this->modelo}, del año {$this->anio}, con un valor por dia {$this->costoPorDia}, el mismo se encuntra Estado: {$estado}";
    }
    public function darDeBaja()
    {
        if ($this->activo) {
            $this->activo = false;
            return "El vehículo fue dado de baja correctamente.\n";
        } else {
            return "El vehículo ya estaba dado de baja.\n";
        }
    }
}
$Test_auto = new Auto("BXL704", "ford", "escort", 1998, 18000, true);
echo " " . $Test_auto;
echo $Test_auto->darDeBaja();
