<?php
/**
 * Primero, convierta s en un entero reemplazando cada letra con su posición en el alfabeto (es decir, reemplace 'a'con 1, 'b'con 2, ..., 'z'con 26).
 *  Luego, transforme el entero reemplazándolo con la suma de sus dígitos . Repita la operación de transformación un total kde veces .
 */
/**
 * @param string $s
 * @param int $k
 */
 // Paso 1: Crear un array asociativo del alfabeto
$alfabeto = [
    'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5,
    'f' => 6, 'g' => 7, 'h' => 8, 'i' => 9, 'j' => 10,
    'k' => 11, 'l' => 12, 'm' => 13, 'n' => 14, 'o' => 15,
    'p' => 16, 'q' => 17, 'r' => 18, 's' => 19, 't' => 20,
    'u' => 21, 'v' => 22, 'w' => 23, 'x' => 24, 'y' => 25,
    'z' => 26
];

// Paso 2: Convertir la palabra en un array de caracteres
$palabra = "azñ"; // Ejemplo de palabra
$caracteres = str_split($palabra);

// Paso 3: Sumar los dígitos individuales de cada valor de letra
$suma = 0;
foreach ($caracteres as $letra) {
    // Convertir a minúscula para coincidir con el array asociativo
    $letra = strtolower($letra);
    if (isset($alfabeto[$letra])) {
        $valorLetra = $alfabeto[$letra];
        
        // Convertir el valor de la letra a una cadena para separar los dígitos
        $valorCadena = strval($valorLetra);
        
        // Sumar los dígitos individuales
        for ($i = 0; $i < strlen($valorCadena); $i++) {
            $suma += intval($valorCadena[$i]);
        }
    }
}

echo "La suma de los dígitos de los valores de la palabra '$palabra' es: $suma\n";
?>