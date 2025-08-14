const agregarCarrito = document.getElementById('agregar-carrito');
const carritoDelegation = document.getElementById('carrito');

carritoDelegation.addEventListener("click", capturaTargetEliminar);
carritoDelegation.addEventListener("click", capturaTargetIncrementoDecremento);


fetch('includes/functions/mostrar_carrito')
.then(function(respuesta) {
    if (respuesta.ok) {
        return respuesta.json();
    } else {
        throw "Error en la llamada Fetch(AJAX)";
    }
})
.then(function(productos) {
    llenaCarrito(productos);
})


fetch('includes/functions/mostrar_carrito')
.then(function(respuesta) {
    if (respuesta.ok) {
        return respuesta.json();
    } else {
        throw "Error en la llamada Fetch(AJAX)";
    }
})
.then(function(productos) {
    llenaTablaCarrito(productos);
})


agregarCarrito.addEventListener("click", carritoAgregar);

function carritoAgregar(e) {
    e.preventDefault();
    let id = agregarCarrito.getAttribute('data-id');
    let imagen = agregarCarrito.getAttribute('data-imagen');
    let marca = agregarCarrito.getAttribute('data-marca');
    let nombre = agregarCarrito.getAttribute('data-nombre');
    let precio = agregarCarrito.getAttribute('data-precio');
    let cantidad = 1;

    let datosProducto = new FormData();
    datosProducto.append("id", id);
    datosProducto.append("imagen", imagen);
    datosProducto.append("marca", marca);
    datosProducto.append("nombre", nombre);
    datosProducto.append("precio", precio);
    datosProducto.append("cantidad", cantidad);
    
    fetch('includes/functions/carrito_compras.php', {
        method: "POST",
        body: datosProducto
    })
    .then(function(respuesta) {
        if (respuesta.ok) {
            return respuesta.json();
        } else {
            throw "Error en la llamada Fetch(AJAX)";
        }
    })
    .then(function(productos) {
        llenaCarrito(productos);
        mostrarCarrito();
    })
}

function llenaCarrito(productos) {
    let notificacion = document.getElementById('notificacion-numero-productos-carrito');
    let cantidadCarritoYTotal = document.getElementById('cantidad-carrito-total');
    let listaProductos = document.getElementById('lista-productos');
    let enlacesCarrito = document.getElementById('enlaces-carrito');
    
    listaProductos.innerHTML = "";
    let cantidad = Object.keys(productos).length;
    
    let total = 0;

    if (cantidad === 0) {
        notificacion.innerText = "";
    } else {
        notificacion.innerText = cantidad;
    }
    
    productos.forEach(producto => {
    let subTotal = parseInt([`${producto['subtotal']}`]);
    total += subTotal;
    
        listaProductos.innerHTML += `
            <tr>
                <td class = "imagen-producto">
                    <a href="detalle-producto?id=${producto['id']}"><img src="img/${producto['imagen']}" alt=""></a>
                </td>
                <td text-center">
                    <p class="font-weight-bold">${producto['marca']} ${producto['nombre']}</p>
                    <button class="btn-incremento-decremento" data-tipo="decremento" data-id="${producto['id']}">-</button>
                    <span>${producto['cantidad']}</span>
                    <button class="btn-incremento-decremento" data-tipo="incremento" data-id="${producto['id']}">+</button>
                </td>
                <td>
                    <span>$${producto['subtotal']} MXN</span>
                </td>
                <td>
                    <img src="img/icono-borrar2.png" alt="" class="icono-borrar" data-id="${producto['id']}">
                </td>
            </tr>
        `;
    });
    cantidadCarritoYTotal.innerHTML = `
        <p><span class="numero-productos">En el carrito:</span> ${cantidad} productos</p>
        <p class="m-0"><span class="total">Total:</span> $${total} MXN</p>
    `;
    enlacesCarrito.innerHTML = `
        <a href="carrito" class="btn btn-outline-primary mr-1">VER CARRITO</a>
        <a href="resumen-pedido" class="btn btn-primary ml-1">PAGAR</a> 
    `;
}

function llenaTablaCarrito(productos) {
    const tablaListaCarrito = document.getElementById('tabla-lista-carrito');
    const totalEnlacePagar = document.getElementById('total-enlace-pagar');

    tablaListaCarrito.addEventListener("click", capturaTargetEliminarTabla);
    tablaListaCarrito.addEventListener("click", capturaTargetIncrementoDecremento);

    tablaListaCarrito.innerHTML = "";
    let total = 0;

    productos.forEach(producto => {
        let subTotal = parseInt([`${producto['subtotal']}`]);
        total += subTotal;

        tablaListaCarrito.innerHTML += `
            <tr>
                <td><img src="img/${producto['imagen']}" alt=""></td>
                <td class="text-left">${producto['marca']} ${producto['nombre']}</td>
                <td>$${producto['precio']} MXN</td>
                <td><button class="btn-incremento-decremento" data-tipo="decremento" data-id="${producto['id']}">-</button> <span>${producto['cantidad']}</span> <button class="btn-incremento-decremento" data-tipo="incremento" data-id="${producto['id']}">+</button></td>
                <td>$${producto['subtotal']} MXN</td>
                <td><a class="eliminar-producto"><i class="icono-borrar fas fa-trash-alt" data-id="${producto['id']}"></i></a></td>
            </tr>
        `;    
    })
    totalEnlacePagar.innerHTML = `
        <span class="total">Total: $<span class="total-numero">${total}</span> MXN</span>
        <a href="resumen-pedido" class="btn btn-primary">PAGAR</a>
    `;
}

function capturaTargetEliminar(e) {
    if (e.target.classList.contains('icono-borrar')) {
        id = e.target.getAttribute('data-id');

        let idProducto = new FormData();
        idProducto.append("id", id);

        fetch('includes/functions/eliminar_producto_carrito.php', {
            method: "POST",
            body: idProducto
        })
        .then(function(respuesta) {
            if (respuesta.ok) {
                return respuesta.json();
            } else {
                throw "Error en la llamada Fetch(AJAX)";
            }
        })
        .then(function(producto) {
            e.target.parentNode.parentNode.remove();
            llenaCarrito(producto);
            llenaTablaCarrito(producto);
        })
    }
}

function capturaTargetEliminarTabla(e) {
    if (e.target.classList.contains('icono-borrar')) {
        id = e.target.getAttribute('data-id');

        let idProducto = new FormData();
        idProducto.append("id", id);

        fetch('includes/functions/eliminar_producto_carrito.php', {
            method: "POST",
            body: idProducto
        })
        .then(function(respuesta) {
            if (respuesta.ok) {
                return respuesta.json();
            } else {
                throw "Error en la llamada Fetch(AJAX)";
            }
        })
        .then(function(producto) {
            e.target.parentNode.parentNode.parentNode.remove();
            llenaTablaCarrito(producto);
            llenaCarrito(producto);
        })
    }
}

function capturaTargetIncrementoDecremento(e) {
    if (e.target.classList.contains('btn-incremento-decremento')) {
        id = e.target.getAttribute('data-id');
        tipo = e.target.getAttribute('data-tipo');
        let cantidad = 1;

        let incrementaDecrementa = new FormData();
        incrementaDecrementa.append("id", id);
        incrementaDecrementa.append("tipo", tipo);
        incrementaDecrementa.append("cantidad", cantidad);

        fetch('includes/functions/incremento_decremento_carrito.php', {
            method: "POST",
            body: incrementaDecrementa
        })
        .then(function(respuesta) {
            if (respuesta.ok) {
                return respuesta.json();
            } else {
                throw "Error en la llamada Fetch(AJAX)";
            }
        })
        .then(function(producto) {
            llenaCarrito(producto);
            llenaTablaCarrito(producto);
        })
    }
}


