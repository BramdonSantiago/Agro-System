const clientes = document.getElementById('clientes');
clientes.addEventListener("click", delegationOjo);

function delegationOjo(e) {
    const ojo = e.target.classList.contains('ojo');
    if (ojo) {
        const idCliente = e.target.getAttribute('data-id');

        const detalleCliente = new FormData();
        detalleCliente.append("id_cliente", idCliente);

        fetch('includes/functions/detalle_cliente.php', {
            method: "POST",
            body: detalleCliente
        })
        .then(function(respuesta) {
            if (respuesta.ok) {
                return respuesta.json();
            } else {
                throw "Error en la llamada Fetch(AJAX)";
            }
        })
        .then(function(cliente) {
            llenaDetalleCliente(cliente);
        })
    }
}

function llenaDetalleCliente(cliente) {
    const id = cliente.id;
    const nombre = cliente.nombre;
    const apellido = cliente.apellido;
    const direccion = cliente.direccion;
    const estado = cliente.estado;
    const ciudad = cliente.ciudad;
    const codigoPostal = cliente.codigo_postal;
    const telefono = cliente.telefono;
    const email = cliente.email;
    const fechaRegistro = cliente.fecha_registro;

    const detalleCliente = document.getElementById('detalle-cliente');
    detalleCliente.innerHTML = `
        <div class="modal-header mb-5 px-0 align-items-center">
            <h2 class="modal-title" id="exampleModalLabel">ID cliente:<span> ${id}</span></h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="d-flex justify-content-end align-items-center">
            <p><span class="bold">Fecha registro:</span> ${fechaRegistro}</p>
        </div>
        <h3 class="mb-4">Detalles del cliente</h3>
        <div class="d-flex justify-content-between mb-4">
            <div>
                <p><span class="bold">Nombre(s):</span> ${nombre}</p>
                <p><span class="bold">Dirección:</span> ${direccion}</p>
                <p><span class="bold">CIudad:</span> ${ciudad} ${estado} ${codigoPostal}</p>
            </div>
            <div>
                <p><span class="bold">Apellido(s):</span> ${apellido}</p>
                <p><span class="bold">Teléfono:</span> ${telefono}</p>
                <p><span class="bold">Email:</span> ${email}</p>
            </div>
        </div>
    `;
}