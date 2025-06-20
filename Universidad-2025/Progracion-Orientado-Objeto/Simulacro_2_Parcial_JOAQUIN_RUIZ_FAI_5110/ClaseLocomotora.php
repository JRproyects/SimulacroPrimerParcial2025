<?php

class Locomotora {
    private float $peso;
    private float $velocidadMaxima;

    public function __construct(float $peso, float $velocidadMaxima) {
        $this->peso = $peso;
        $this->velocidadMaxima = $velocidadMaxima;
    }

    public function getPeso(): float {
        return $this->peso;
    }

    public function getVelocidadMaxima(): float {
        return $this->velocidadMaxima;
    }
}
