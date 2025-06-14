<?php
class Viaje {
    private array $pasajeros;
    private ResponsableV $responsable;
    private $conn;

    // Constructor único con parámetros opcionales
    public function __construct($conn = null, array $pasajeros = [], ResponsableV $responsable = null) {
        $this->conn = $conn;
        $this->pasajeros = $pasajeros;
        $this->responsable = $responsable;
    }

    public function ingresarViaje($destino, $cantMax, $idEmpresa, $idResponsable, $importe) {
        $sql = "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siiii", $destino, $cantMax, $idEmpresa, $idResponsable, $importe);
        return $stmt->execute();
    }

    public function modificarViaje($idViaje, $destino, $cantMax, $idEmpresa, $idResponsable, $importe) {
        $sql = "UPDATE viaje SET vdestino=?, vcantmaxpasajeros=?, idempresa=?, rnumeroempleado=?, vimporte=? WHERE idviaje=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siiiii", $destino, $cantMax, $idEmpresa, $idResponsable, $importe, $idViaje);
        return $stmt->execute();
    }

    public function eliminarViaje($idViaje) {
        $sql = "DELETE FROM viaje WHERE idviaje=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idViaje);
        return $stmt->execute();
    }

    // Getters
    public function getPasajeros(): array {
        return $this->pasajeros;
    }

    public function getResponsable(): ResponsableV {
        return $this->responsable;
    }

    // Setters
    public function setPasajeros(array $pasajeros): void {
        $this->pasajeros = $pasajeros;
    }

    public function setResponsable(ResponsableV $responsable): void {
        $this->responsable = $responsable;
    }

    // Método __toString()
    public function __toString(): string {
        $info = "Responsable del viaje:\n" . $this->responsable . "\n";
        $info .= "Lista de pasajeros:\n";

        foreach ($this->pasajeros as $i => $pasajero) {
            $info .= "Pasajero " . ($i + 1) . ":\n" . $pasajero . "\n";
        }

        return $info;
    }
}
?>