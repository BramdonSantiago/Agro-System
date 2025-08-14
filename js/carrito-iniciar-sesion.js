// document.addEventListener("DOMContentLoaded", function() {
    const btnIniciarSesion = document.getElementById('btn-iniciar-sesion');
    const iniciarSesion = document.getElementById('iniciar-sesion');
    const btnImgCarrito = document.getElementById('btn-img-carrito');
    const carrito = document.getElementById('carrito');
    const btnImgBuscar = document.getElementById('btn-img-buscar');
    const buscar = document.getElementById('buscar');

    btnIniciarSesion.addEventListener("click", mostrarIniciarSesion);
    btnImgCarrito.addEventListener("click", mostrarCarrito);
    btnImgBuscar.addEventListener("click", mostrarBuscar);

    function mostrarIniciarSesion(e) {
        e.preventDefault();
        iniciarSesion.classList.toggle("active");
    }

    function mostrarCarrito() {
        carrito.classList.toggle("active");   
    }

    function mostrarBuscar() {
        buscar.classList.toggle("active");
    }
// });


