<?php
class ResponsableV extends Persona {
    private int $numEmpleado;
    private int $numLicencia;

    // Constructor con validaciones
    public function __construct(string $nombre, string $apellido, int $numEmpleado, int $numLicencia) {
        parent::__construct($nombre, $apellido);

        if ($numEmpleado <= 0 || $numLicencia <= 0) {
            throw new InvalidArgumentException("El número de empleado y licencia deben ser positivos.");
        }

        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
    }

    // Getters
    public function getNumEmpleado(): int {
        return $this->numEmpleado;
    }

    public function getNumLicencia(): int {
        return $this->numLicencia;
    }

    // Setters con validaciones
    public function setNumEmpleado(int $numEmpleado): void {
        if ($numEmpleado <= 0) {
            throw new InvalidArgumentException("El número de empleado debe ser positivo.");
        }
        $this->numEmpleado = $numEmpleado;
    }

    public function setNumLicencia(int $numLicencia): void {
        if ($numLicencia <= 0) {
            throw new InvalidArgumentException("El número de licencia debe ser positivo.");
        }
        $this->numLicencia = $numLicencia;
    }

    // Sobrescribimos __toString() para incluir los nuevos datos
    public function __toString(): string {
        return parent::__toString() .
            "Empleado N°: {$this->numEmpleado}\n" .
            "Licencia N°: {$this->numLicencia}\n";
    }
}
?>