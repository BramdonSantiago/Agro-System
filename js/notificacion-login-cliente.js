const iniciarSesionCliente = document.getElementById('iniciar-sesion-cliente');

iniciarSesionCliente.addEventListener("submit", login);

function login(e) {
    e.preventDefault();
    const iniciarSesionCliente = new FormData(document.getElementById('iniciar-sesion-cliente'));

    fetch('includes/functions/enviar_login_cliente.php', {
        method: 'POST',
        body: iniciarSesionCliente
    })
    .then(function(response) {
        if(response.ok) {
            return response.text();
        } else {
            throw "Error en la llamada Ajax";
        }
    })
    .then(function(texto) {
        if (texto === 'logueado') {
            notificacionCorrecta("¡BIENVENIDO!");
            document.getElementById("iniciar-sesion-cliente").reset();
            setTimeout(() => {
                location.reload();
            }, 5000);
        } else {
            notificacionIncorrecta("Usuario y/o contraseña incorrecta");
        }
    })
    .catch(function(error) {
        alert(error);
    });
}

function notificacionCorrecta(mensaje) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: mensaje,
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
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
