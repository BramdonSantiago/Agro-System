const numeroProductos = document.getElementsByClassName('numero-productos');
const totales = document.getElementsByClassName('totales');
let numerosArray = [];
let totalesArray = [];
for (let i = 0; i < numeroProductos.length; i++) {
    let numeros = parseInt(numeroProductos[i].getAttribute('data-numero-productos'));
    let numerosTotales = parseInt(totales[i].getAttribute('data-total'));
    numerosArray.push(numeros);
    totalesArray.push(numerosTotales);
}
let maxProductos = Math.max(...numerosArray);
let maxTotales = Math.max(...totalesArray);
for (let i = 0; i < numeroProductos.length; i++) {
    if (maxProductos === parseInt (numeroProductos[i].getAttribute('data-numero-productos'))) {
        numeroProductos[i].style.fontWeight = "bold";
        numeroProductos[i].style.color = "#F70000";
    }
    if (maxTotales === parseInt (totales[i].getAttribute('data-total'))) {
        totales[i].style.fontWeight = "bold";
        totales[i].style.color = "#F70000";
    }
}