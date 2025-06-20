<?php

require_once 'ClaseLocomotora.php';
require_once 'ClaseVagonPersonas.php';
require_once 'ClaseVagonCarga.php';

class Formacion {
    private Locomotora $locomotora;
    private array $vagones = [];
    private int $maxVagones;

    public function __construct(Locomotora $locomotora, int $maxVagones) {
        $this->locomotora = $locomotora;
        $this->maxVagones = $maxVagones;
    }

    public function incorporarVagonFormacion(Vagon $vagon) {
        if (count($this->vagones) < $this->maxVagones) {
            $this->vagones[] = $vagon;
            return true;
        }
        return false;
    }

    public function incorporarPasajeroFormacion(int $cantidad) {
        foreach ($this->vagones as $vagon) {
            if (is_a($vagon, 'VagonPasajeros') && $vagon->incorporarPasajeroVagon($cantidad)) {
                return true;
            }
        }
        return false;
    }

    public function promedioPasajeroFormacion() {
        $totalPasajeros = 0;
        $cantidadVagonesPasajeros = 0;

        foreach ($this->vagones as $vagon) {
            if (is_a($vagon, 'VagonPasajeros')) {
                $cantidadVagonesPasajeros++;
                $totalPasajeros += $vagon->getPasajerosActuales();
            }
        }

        if ($cantidadVagonesPasajeros === 0) return 0.0;
        return $totalPasajeros / $cantidadVagonesPasajeros;
    }
}
