const formularioContacto = document.getElementById('formulario-contacto');

formularioContacto.addEventListener("submit", enviarFormularioEmail);

function enviarFormularioEmail(e) {
    e.preventDefault();

    const formularioContacto = new FormData(document.getElementById('formulario-contacto'));

    fetch('includes/functions/enviar_email.php', {
        method: "POST",
        body: formularioContacto
    })
    .then(function(respuesta) {
        if (respuesta.ok) {
            return respuesta.text();
        } else {
            throw "Error en la llamada Fetch(AJAX)";
        }
    })
    .then(function(email) {
        if (email === 'El correo se ha enviado') {
            notificacionCorrecta("Tu mensaje se envió correctamente");
            document.getElementById("formulario-contacto").reset();
        } else {
            notificacionIncorrecta("Tu mensaje no pudo ser enviado, intenta más tarde");
        }
    })
}

function notificacionCorrecta(mensaje) {
    Swal.fire({
        toast: true,
        position: 'bottom-start',
        icon: 'success',
        title: mensaje,
        showConfirmButton: false,
        timer: 6000,
        // timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false
    })
}

function notificacionIncorrecta(mensaje) {
    Swal.fire({
        toast: true,
        position: 'bottom-start',
        icon: 'error',
        title: mensaje,
        showConfirmButton: false,
        timer: 6000,
        // timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false
    })
}