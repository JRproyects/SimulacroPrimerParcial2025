function valorSeleccionado(valor) {
    if (valor < 0) return -1;
    else if (valor >= 0 && valor < 10) return 0;
    else if (valor >= 10 && valor < 50) return 1;
    else if (valor >= 50 && valor < 100) return 2;
    else return 3;
}
