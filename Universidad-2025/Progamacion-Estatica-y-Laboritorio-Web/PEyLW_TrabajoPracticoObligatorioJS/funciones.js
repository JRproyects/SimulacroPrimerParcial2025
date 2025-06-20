function validar() {
    //optengo todos los campos para trabajarlos
    const nombre = document.getElementById('nombre');
    const apellido = document.getElementById('apellido');
    const email = document.getElementById('email');
    const dia = document.getElementById('dia');
    const mes = document.getElementById('mes');
    const anio = document.getElementById('anio');
    const obraSocial = document.getElementById('obras_sociales');


    let errores = false;

    // Validacion de los datos de forma corrcta

    if (nombre.value.trim() === "") {
        marcarError(nombre);
        errores = true;
    }
    if (apellido.value.trim() === "") {
        marcarError(apellido);
        errores = true;
    }w
    if (email.value.trim() === "" || !validarEmail(email.value)) {
        marcarError(email);
        errores = true;
    }
    if (dia.value.trim() === "" || !esEnteroPositivo(dia.value)) {
        marcarError(dia);
        errores = true;
    }
    if (mes.value.trim() === "" || !esEnteroPositivo(mes.value)) {
        marcarError(mes);
        errores = true;
    }
    if (anio.value.trim() === "" || !esEnteroPositivo(anio.value)) {
        marcarError(anio);
        errores = true;
    }
    if (obraSocial.value.trim() === "") {
        marcarError(obraSocial);
        errores = true;
    }

    // Validar fecha si los campos son numéricos ene stos casos 
    if (!errores) {
        const d = parseInt(dia.value);
        const m = parseInt(mes.value);
        const a = parseInt(anio.value);

        const fecha = new Date(a, m - 1, d);
        if (fecha.getFullYear() !== a || fecha.getMonth() !== m - 1 || fecha.getDate() !== d) {
            marcarError(dia);
            marcarError(mes);
            marcarError(anio);
            errores = true;
        }
    }

    if (errores) {
        return false; // No enviar
    }

    alert("Todos los datos son correctos.");
    return true; // Permitir envío
}

// Marcar visualmente los errores en el html 
function marcarError(elemento) {
    elemento.style.border = '2px solid red';
    elemento.style.backgroundColor = '#ffe6e6';
}

// Verificar si un valor es un número entero positivo
function esEnteroPositivo(valor) {
    const num = parseInt(valor);
    return !isNaN(num) && Number.isInteger(num) && num > 0;
}

// Validar formato básico de email
function validarEmail(correo) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(correo);
}
