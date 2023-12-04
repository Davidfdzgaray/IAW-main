let aleatorio = Math.random();
aleatorio = aleatorio * 5;
aleatorio = Math.trunc(aleatorio);

function reinicio() {
    aleatorio = Math.random();
    aleatorio = aleatorio * 5;
    aleatorio = Math.trunc(aleatorio);
}

function averiguar() {
    var numero = document.getElementById("numero").value;

    if (numero == aleatorio) {
        alert("CORRECTO!!");
        reinicio();
    }
    else if (numero < aleatorio) {
        alert("EL NÚMERO ES MAYOR");
    }
    else {
        alert("EL NÚMERO ES MENOR");
    }
}