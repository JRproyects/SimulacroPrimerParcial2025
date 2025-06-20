document.getElementById("talleForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const altura = parseInt(document.getElementById("altura").value);
    const peso = parseInt(document.getElementById("peso").value);
    let talle = "M";

    if (altura < 160 || peso < 50) {
        talle = "S";
    } else if (altura > 180 || peso > 80) {
        talle = "L";
    }
    document.getElementById("resultadoTalle").textContent = "Talle recomendado: " + talle;
});