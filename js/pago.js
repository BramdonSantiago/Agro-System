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

function llenaTablaCarrito(productos) {
    const tablaListaCarrito = document.getElementById('tabla-lista-carrito');
    const valoresHidden = document.getElementById('valores-hidden');

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
                <td>${producto['cantidad']}</td>
                <td>$${producto['subtotal']} MXN</td>
            </tr>
        `;
    })
    document.getElementById("total-valor").innerText = `$${total} MXN`;
    document.getElementById("total-valor-envio").value = total;
}



