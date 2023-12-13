let lista = [];
let dias = [];
window.onload=guardados();

function mostrar() {
    document.getElementById("contenedor").innerHTML="";
    
    for (let x=0; x<lista.length; x++){
        document.getElementById("contenedor").innerHTML+=lista[x] + " ";
        document.getElementById("contenedor").innerHTML+=dias[x];
        document.getElementById("contenedor").innerHTML += "  <button onclick='borrarMensaje("+x+")' class='papelera'></button>"+ "<br>";
    };

    localStorage.setItem(lista,dias);
}

function enviarMensaje() {
    //MENSAJES
    var mensaje = document.getElementById("mensaje").value;
    lista.push(mensaje);
    
    //DIAS
    var hoy = new Date();
    
    var ahora = hoy.toLocaleString();

    dias.push(ahora);

    mostrar();
}

function borrarMensaje(a) {
    lista.splice(a, 1);
    dias.splice(a, 1);

    mostrar();
}


function guardados() {
    let lista = localStorage.getItem(lista);
    let dias = localStorage.getItem(dias);

    if (lista == null || lista == "undefined" || dias == null || dias == "undefined") {
        
    } 
    else {
        for (let x=0; x<lista.length; x++){
            document.getElementById("contenedor").innerHTML+=lista[x] + " ";
            document.getElementById("contenedor").innerHTML+=dias[x];
            document.getElementById("contenedor").innerHTML += "  <button onclick='borrarMensaje("+x+")' class='papelera'></button>"+ "<br>";
            localStorage.setItem(lista,dias);
        }
    }
}

function borrartodo() {
    lista = [];
    dias = [];

    localStorage.setItem(lista,dias);

    mostrar();
}

