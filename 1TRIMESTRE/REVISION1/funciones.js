function suma() {
    let n1 = parseFloat(document.getElementById("numero1").value);
    let n2 = parseFloat(document.getElementById("numero2").value);
    document.getElementById("resultado").innerHTML = n1+n2;
}

function resta() {
    let n1 = parseFloat(document.getElementById("numero1").value);
    let n2 = parseFloat(document.getElementById("numero2").value);
    document.getElementById("resultado").innerHTML = n1-n2;
}

function multiplicacion() {
    let n1 = parseFloat(document.getElementById("numero1").value);
    let n2 = parseFloat(document.getElementById("numero2").value);
    document.getElementById("resultado").innerHTML = n1*n2;
}

function division() {
    let n1 = parseFloat(document.getElementById("numero1").value);
    let n2 = parseFloat(document.getElementById("numero2").value);
    document.getElementById("resultado").innerHTML = n1/n2;
}