// Librería de operaciones matemáticas básicas

function suma(x, y) {
  return x + y;
}

function resta(x, y) {
  return x - y;
}

function multiplicacion(x, y) {
  return x * y;
}

function division(x, y) {
  if (y !== 0) {
    return x / y;
  } else {
    return "Error: división por cero";
  }
}

function potencia(x, y) {
  return Math.pow(x, y);
}

function cuadrado(x) {
  return x * x;
}
