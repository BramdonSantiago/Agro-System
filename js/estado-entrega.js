const estadoEntrega = document.getElementsByClassName('estado-entrega-td');

for (let i = 0; i < estadoEntrega.length; i++) {
    if (estadoEntrega[i].textContent === 'Entregado') {
        estadoEntrega[i].style.color = "#25865B";
    }
}

