const formulario = document.getElementById('formulario');

formulario.addEventListener("submit", enviarFormulario);

function enviarFormulario(e) {
    e.preventDefault();
    const formulario = new FormData(document.getElementById('formulario'));

    fetch('includes/functions/enviar_registro_usuario_cliente.php', {
        method: 'POST',
        body: formulario
    })
    .then(function(response) {
        if(response.ok) {
            return response.text();
        } else {
            throw "Error en la llamada Ajax";
        }
    })
    .then(function(texto) {
        if (texto === 'agrego') {
            notificacionCorrecta("Cuenta creada correctamente");
            document.getElementById("formulario").reset();
        } else {
            notificacionIncorrecta("No se pudo crear esta cuenta");
        }
    })
    .catch(function(error) {
        alert(error);
    });
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
