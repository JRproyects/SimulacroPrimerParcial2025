document.getElementById("contactoForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const email = document.getElementById("email").value;
    const mensaje = document.getElementById("mensaje").value;
    document.getElementById("respuestaContacto").textContent = "¡Gracias por contactarte! Te llegará una respuesta a " + email;
});