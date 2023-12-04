function calcular() {
    var masa = document.getElementById("masa").value;
    var altura = document.getElementById("altura").value;
    altura=altura/100
    var imc = masa / (Math.pow(altura, 2));
    
    if (masa <= 0 || altura <=0 || masa == "" || altura == "") {
        document.getElementById("resultado").innerHTML = "ERROR";
    }
    else {
        if (imc < 18.5){
            document.getElementById("resultado").innerHTML = "Su peso es mas bajo de lo normal";
        }
        else if (imc >= 18.5 && imc <=24.9){
            document.getElementById("resultado").innerHTML = "Normal";
        }
        else if (imc >= 25 && imc <=29.9){
            document.getElementById("resultado").innerHTML = "Su peso es superior a lo normal";
        }
        else {
            document.getElementById("resultado").innerHTML = "Obesidad"; 
        }
    }
}