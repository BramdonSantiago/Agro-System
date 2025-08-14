const flechaCircularIzquierda = document.getElementById('flecha-circular-izquierda');

flechaCircularIzquierda.addEventListener("click", ocultarSidebar);

function ocultarSidebar() {
    const sidebar = document.getElementById('sidebar');
    const flechaCircularDerecha = document.getElementById('flecha-circular-derecha');
    
    sidebar.style.maxWidth = "0";
    flechaCircularIzquierda.classList.remove("active");
    flechaCircularIzquierda.classList.add("no-active");
    flechaCircularDerecha.classList.remove("no-active");
    flechaCircularDerecha.classList.add("active");
    
    flechaCircularDerecha.addEventListener("click", mostrarSidebar);
}

function mostrarSidebar() {
    const sidebar = document.getElementById('sidebar');
    const flechaCircularDerecha = document.getElementById('flecha-circular-derecha');

    sidebar.style.maxWidth = "25%";
    flechaCircularDerecha.classList.remove("active");
    flechaCircularDerecha.classList.add("no-active");
    flechaCircularIzquierda.classList.remove("no-active");
    flechaCircularIzquierda.classList.add("active");
}

