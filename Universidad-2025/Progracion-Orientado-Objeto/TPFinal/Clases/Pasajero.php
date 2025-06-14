<?php
class Pasajero extends Persona {
    private string $numDoc;
    private string $telefono;
    private $conn;

    // Constructor único, con conexión opcional
    public function __construct($conn = null, string $nombre, string $apellido, string $numDoc, string $telefono) {
        parent::__construct($nombre, $apellido);
        $this->numDoc = $numDoc;
        $this->telefono = $telefono;
        $this->conn = $conn; // Se asigna la conexión
    }

    // Método para ingresar un pasajero a la base de datos
    public function ingresarPasajero() {
        if ($this->conn === null) {
            throw new Exception("No hay conexión a la base de datos.");
        }

        $sql = "INSERT INTO pasajero (pdocumento, pnombre, papellido, ptelefono, idviaje) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $this->numDoc, $this->nombre, $this->apellido, $this->telefono, $idViaje);
        return $stmt->execute();
    }

    // Método para modificar un pasajero
    public function modificarPasajero($idViaje) {
        if ($this->conn === null) {
            throw new Exception("No hay conexión a la base de datos.");
        }

        $sql = "UPDATE pasajero SET pnombre=?, papellido=?, ptelefono=?, idviaje=? WHERE pdocumento=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssis", $this->nombre, $this->apellido, $this->telefono, $idViaje, $this->numDoc);
        return $stmt->execute();
    }

    // Método para eliminar un pasajero
    public function eliminarPasajero() {
        if ($this->conn === null) {
            throw new Exception("No hay conexión a la base de datos.");
        }

        $sql = "DELETE FROM pasajero WHERE pdocumento=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->numDoc);
        return $stmt->execute();
    }

    // Getters y Setters
    public function getNumDoc(): string {
        return $this->numDoc;
    }

    public function setNumDoc(string $numDoc): void {
        $this->numDoc = $numDoc;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }

    // Método __toString()
    public function __toString(): string {
        return parent::__toString() .
               "Documento: {$this->numDoc}\n" .
               "Teléfono: {$this->telefono}\n";
    }
}
?>