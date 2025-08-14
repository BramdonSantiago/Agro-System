const formulario = document.getElementById('formulario');

formulario.addEventListener("submit", enviarFormulario);

function enviarFormulario(e) {
    e.preventDefault();
    const formulario = new FormData(document.getElementById('formulario'));

    fetch('includes/functions/editar_perfil_cliente.php', {
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
        if (texto === 'edito') {
            notificacionCorrecta("Datos actualizados correctamente");
            setTimeout(() => {
                location.reload();
            }, 7000);
        } else {
            notificacionIncorrecta("Tu información no se pudo actualizar, revisa o intenta más tarde");
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
