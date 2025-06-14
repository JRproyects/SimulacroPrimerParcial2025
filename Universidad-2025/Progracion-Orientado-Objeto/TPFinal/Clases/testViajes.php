<?php
class TestViajes {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "bdviajes");
        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
    }

    public function agregarEmpresa($nombre, $direccion) {
        $stmt = $this->conexion->prepare("INSERT INTO empresa (enombre, edireccion) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $direccion);
        return $stmt->execute();
    }

    public function modificarEmpresa($id, $nombre, $direccion) {
        $stmt = $this->conexion->prepare("UPDATE empresa SET enombre = ?, edireccion = ? WHERE idempresa = ?");
        $stmt->bind_param("ssi", $nombre, $direccion, $id);
        return $stmt->execute();
    }

    public function eliminarEmpresa($id) {
        $stmt = $this->conexion->prepare("DELETE FROM empresa WHERE idempresa = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

 public function agregarViaje($destino, $maxPasajeros, $idEmpresa, $idResponsable, $importe) {
    $stmt = $this->conexion->prepare(
        "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte)
        VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("siiid", $destino, $maxPasajeros, $idEmpresa, $idResponsable, $importe);
    return $stmt->execute();
}

public function modificarViaje($idViaje, $destino, $maxPasajeros, $idEmpresa, $idResponsable, $importe) {
    $stmt = $this->conexion->prepare(
        "UPDATE viaje SET vdestino = ?, vcantmaxpasajeros = ?, idempresa = ?, rnumeroempleado = ?, vimporte = ? WHERE idviaje = ?"
    );
    $stmt->bind_param("siiidi", $destino, $maxPasajeros, $idEmpresa, $idResponsable, $importe, $idViaje);
    return $stmt->execute();
}

public function eliminarViaje($idViaje) {
    $stmt = $this->conexion->prepare("DELETE FROM viaje WHERE idviaje = ?");
    $stmt->bind_param("i", $idViaje);
    return $stmt->execute();
}

}
