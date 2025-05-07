<?php
//Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el saldo actual y el interés anual que se aplica a la cuenta. 
//Define en la clase los siguientes métodos:
// 14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la clase. 
// 14.b. Los método de acceso de cada uno de los atributos de la clase. 
// 14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual dividido entre 365 aplicado al saldo actual). 
// 14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta. 
// 14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo). 
// 14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase. 
// 14.g. Crear un script Test_CuentaBancaria que cree un objeto CuentaBancaria e invoque a cada uno de los métodos implementados.

class cuentaBancaria
{

    private int $numeroDeCuenta;
    private persona $duenio;
    private float $saldoActual;
    private float $interesAnual;


    public function __construct($numeroDeCuenta, persona $duenio, $saldoActual, $interesAnual)
    {
        $this->numeroDeCuenta = $numeroDeCuenta;
        $this->duenio = $duenio;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }
    //GET
    public function getNumeroDeCuenta()
    {
        return $this->numeroDeCuenta;
    }
    public function getDuenio()
    {
        return $this->duenio;
    }
    public function getSaldoActual()
    {
        return $this->saldoActual;
    }
    public function getInteresAnual()
    {
        return $this->interesAnual;
    }
    //SET
    public function setNumeroDeCuenta(int $numeroDeCuenta)
    {
        $this->numeroDeCuenta = $numeroDeCuenta;
    }

    public function setSaldoActual(float $saldoActual)
    {
        $this->saldoActual = $saldoActual;
    }
    public function setInteresAnual(float $interesAnual)
    {
        $this->interesAnual = $interesAnual;
    }
    //actualizar interes diario
    public function actualizarSaldo()
    {
        $interesDiario = ($this->interesAnual / 365) / 100;
        $this->saldoActual += $this->saldoActual * $interesDiario;
    }
    //
    public function depositar(float $cantidad)
    {
        if ($cantidad > 0) {
            $this->saldoActual += $cantidad;
            echo "Usted realizo un deposito de $cantidad, su saldo actual es {$this->saldoActual}";
        } else {
            echo "operacion no valida.\n";
        }
    }
    public function retirar(float $cantidad)

    {
        if ($cantidad > 0 && $cantidad < $this->saldoActual) {
            $this->saldoActual -= $cantidad;
            echo "Usted ha retirado $ $cantidad, le queda actualmente en la cuenta {$this->saldoActual} ";
        } elseif ($cantidad < 0) {
            echo "La cantidad que desea retirar no esta permitida \n";
        } else {
            echo "No puede retirar el monto de $ $cantidad, dado que posee {$this->saldoActual}";
        }
    }
    public function __toString()
    {
        return "Cuenta: {$this->numeroDeCuenta}, Titular: {$this->duenio}, Saldo: {$this->saldoActual}, Interés Anual: {$this->interesAnual}%";
    }
}
