let lista = []

function mostrar() {
    document.getElementById("contenedor").innerHTML="";
    for (let x=0; x<lista.length; x++){
        document.getElementById("contenedor").innerHTML+=lista[x];
        document.getElementById("contenedor").innerHTML += "  <button onclick='borrarMensaje("+x+")'>Eliminar</button>"+ "<br>";
    };
}

function enviarMensaje() {
    var mensaje = document.getElementById("mensaje").value;
    lista.push(mensaje);
    
    mostrar();
}

function borrarMensaje(a) {
    lista.splice(a, 1);

    mostrar();
}

