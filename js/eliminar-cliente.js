const tablaClientes = document.getElementById('clientes');

tablaClientes.addEventListener("click", delegationEliminarCliente);

function delegationEliminarCliente(e) {
    const iconoBasura = e.target.classList.contains('basura');
    if (iconoBasura) {
        const id =  e.target.getAttribute('data-id');
        const notificacion = confirm("¿Estas seguro de querer eliminar este producto? 👀🛑⁉");
        if (notificacion) {
            const idCliente = new FormData();
            idCliente.append("id", id);

            fetch('includes/functions/eliminar_cliente.php', {
                method: "POST",
                body: idCliente
            })
            .then(function(respuesta) {
                if (respuesta.ok) {
                    return respuesta.text();
                } else {
                    throw "Error en la llamada Fetch(AJAX)";
                }
            })
            .then(function(respuesta) {
                console.log(respuesta);
                if (respuesta === 'Cliente eliminado') {
                    Swal.fire({
                        toast: true,
                        position: 'bottom-start',
                        icon: 'success',
                        title: 'Cliente o cuenta eliminada, tu elejiste 😬',
                        showConfirmButton: false,
                        timer: 6000,
                        // timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    })
                    e.target.parentElement.parentElement.remove();
                } else {
                    Swal.fire({
                        toast: true,
                        position: 'bottom-start',
                        icon: 'error',
                        title: 'Este cliente o cuenta no pude ser eliminado(a)',
                        showConfirmButton: false,
                        timer: 6000,
                        // timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    })
                }
            })
            .catch(function(error) {
                alert("Error proceso Fetch(AJAX): " + error);
            })
            
        } else {
            Swal.fire({
                // toast: true,
                position: 'center',
                icon: 'info',
                title: 'A salvo 😅',
                showConfirmButton: false,
                timer: 6000,
                // timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            })
        }
    }
}