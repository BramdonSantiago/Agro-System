const pedidos = document.getElementById('pedidos');
pedidos.addEventListener("click", delegationOjo);

function delegationOjo(e) {
    const ojo = e.target.classList.contains('ojo');
    if (ojo) {
        const numPedido = e.target.getAttribute('data-numero-pedido');
        const numeroPedido = new FormData();
        numeroPedido.append("numero_pedido", numPedido);

        fetch('includes/functions/detalle_pedido.php', {
            method: "POST",
            body: numeroPedido
        })
        .then(function(respuesta) {
            if (respuesta.ok) {
                return respuesta.json();
            } else {
                throw "Error en la llamada Fetch(AJAX)";
            }
        })
        .then(function(pedido) {
            llenaDetallePedido(pedido);
        })

        fetch('includes/functions/detalle_pedido_productos.php', {
            method: "POST",
            body: numeroPedido
        })
        .then(function(respuesta) {
            if (respuesta.ok) {
                return respuesta.json();
            } else {
                throw "Error en la llamada Fetch(AJAX)";
            }
        })
        .then(function(pedidoProductos) {
            llenaTablaDetallePedido(pedidoProductos);
        })
    }
}

function llenaDetallePedido(pedido) {
    console.log(pedido);
    const numeroPedido = pedido.numero_pedido;
    const total = pedido.total;
    const fecha = pedido.fecha;
    const hora = pedido.hora;
    const referenciaPago = pedido.referencia_pago;
    const nombre = pedido.nombre;
    const apellido = pedido.apellido;
    const direccion = pedido.direccion;
    const estado = pedido.estado;
    const ciudad = pedido.ciudad;
    const codigoPostal = pedido.codigo_postal;
    const telefono = pedido.telefono;
    const email = pedido.email;
    const metodoPago = pedido.metodo_pago;

    const detallePedido = document.getElementById('detalle-pedido');
    detallePedido.innerHTML = `
        <div class="modal-header mb-5 px-0 align-items-center">
            <h2 class="modal-title" id="exampleModalLabel">Pedido #<span>${numeroPedido}</span></h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <p><span class="bold">Total:</span> $${total} MXN</p>
            <p><span class="bold">Fecha:</span> ${fecha} ${hora}</p>
        </div>
        <p class="mb-5"><span class="bold">Referencia de pago: </span>${referenciaPago}</p>
        <h3 class="mb-4">Detalles del cliente</h3>
        <div class="d-flex justify-content-between mb-4">
            <div>
                <p><span class="bold">Nombre:</span> ${nombre} ${apellido}</p>
                <p><span class="bold">Dirección:</span> ${direccion}</p>
                <p><span class="bold">Estado:</span> ${estado}</p>
                <p><span class="bold">Ciudad/Municipio/Localidad:</span> ${ciudad}</p>
            </div>
            <div>
                <p><span class="bold">Código postal:</span> ${codigoPostal}</p>
                <p><span class="bold">Teléfono:</span> ${telefono}</p>
                <p><span class="bold">Email:</span> ${email}</p>
                <p><span class="bold">Método de pago:</span> ${metodoPago}</p>
            </div>
        </div>
    `;
}

function llenaTablaDetallePedido(pedidoProductos) {
    const detallePedidoProductos = document.getElementById('detalle-pedido-productos');

    detallePedidoProductos.innerHTML = "";

    pedidoProductos.forEach(producto => {
        const imagen = producto.imagen;
        const marca = producto.marca;
        const nombre = producto.nombre;
        const precio = producto.precio;
        const cantidad = producto.cantidad;
        const subtotal = producto.subtotal;
        
        detallePedidoProductos.innerHTML += `
            <tr>
                <td><img src="img/${imagen}" alt=""></td>
                <td>${marca} ${nombre}</td>
                <td>$${precio} MXN</td>
                <td>${cantidad}</td>
                <td>$${subtotal} MXN</td>
            </tr>
        `;
    });
}