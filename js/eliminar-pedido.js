const tablaPedidos = document.getElementById('pedidos');

tablaPedidos.addEventListener("click", delegationEliminarPedido);

function delegationEliminarPedido(e) {
    const iconoBasura = e.target.classList.contains('basura');
    if (iconoBasura) {
        const numPedido =  e.target.getAttribute('data-id');
        const notificacion = confirm("¿Estas seguro de querer eliminar este pedido? 👀🛑⁉");
        if (notificacion) {
            const idPedido = new FormData();
            idPedido.append("numero_pedido", numPedido);

            fetch('includes/functions/eliminar_pedido.php', {
                method: "POST",
                body: idPedido
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
                if (respuesta === 'Pedido eliminado') {
                    Swal.fire({
                        toast: true,
                        position: 'bottom-start',
                        icon: 'success',
                        title: 'Pedido eliminado correctamente',
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
                        title: 'Este pedido no ha podido ser eliminado',
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