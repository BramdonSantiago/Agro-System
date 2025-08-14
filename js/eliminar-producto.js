eliminarProducto = document.getElementById('data-table');

eliminarProducto.addEventListener("click", productoEliminar);

function productoEliminar(e) {
    if (e.target.classList.contains('basura')) {
        const id = e.target.getAttribute('data-id');
        const notificacion = confirm("¿Estas seguro de querer eliminar este producto? 👀🛑⁉");

        if (notificacion) {
            let idProducto = new FormData();
            idProducto.append("id", id);

            fetch('includes/functions/eliminar_producto.php', {
                method: "POST",
                body: idProducto
            })
            .then(function(respuesta) {
                if (respuesta.ok) {
                    return respuesta.text();
                } else {
                    throw "Error en la llamada Fetch(AJAX)";
                }
            })
            .then(function(respuesta) {
                if (respuesta === 'Producto eliminado') {
                    Swal.fire({
                        toast: true,
                        position: 'bottom-start',
                        icon: 'success',
                        title: 'Producto eliminado, tu elejiste 😬',
                        showConfirmButton: false,
                        timer: 6000,
                        // timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    })
                    e.target.parentElement.parentElement.parentElement.remove();
                } else {
                    Swal.fire({
                        toast: true,
                        position: 'bottom-start',
                        icon: 'error',
                        title: 'Este producto no ha podido ser eliminado',
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

