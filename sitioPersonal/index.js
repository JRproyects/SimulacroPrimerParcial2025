document.addEventListener("DOMContentLoaded", () => {
    const progressBars = document.querySelectorAll(".progreso");
  
    progressBars.forEach(bar => {
      const percentage = bar.getAttribute("data-percentage");
      bar.style.width = `${percentage}%`;
      bar.querySelector("span").textContent = `${percentage}%`;
    });
  });
  
  function enviarMensaje() {
    const botonTexto = document.getElementById("boton-texto");

    // Cambiar el texto a "Enviando..."
    botonTexto.textContent = "Enviando...";

    // Simular un retraso de envío (ej: 2 segundos)
    setTimeout(() => {
        // Limpiar los campos
        document.getElementById("nombre").value = "";
        document.getElementById("telefono").value = "";
        document.getElementById("email").value = "";
        document.getElementById("mensaje").value = "";

        // Restaurar el texto original del botón
        botonTexto.textContent = "Enviar mensaje";
    }, 2000);
}