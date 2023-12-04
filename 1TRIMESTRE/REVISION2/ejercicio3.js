var errores;

function reinicio() {
    errores = 0;
    document.getElementById("enombre").innerHTML="";
    document.getElementById("eapellido").innerHTML="";
    document.getElementById("ecorreo").innerHTML="";
    document.getElementById("edni").innerHTML="";
    document.getElementById("epin").innerHTML="";
    document.getElementById("etelefono").innerHTML="";
}

function validar() {
    reinicio();
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var correo = document.getElementById("correo").value;
    var dni = document.getElementById("dni").value;
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
    dni = dni.toUpperCase();
    var pin1 = document.getElementById("pin1").value;
    var pin2 = document.getElementById("pin2").value;
    var telefono = document.getElementById("telefono").value;
    
    //NOMBRE
    if (nombre == ""){
        document.getElementById("enombre").innerHTML="Requerido";
        errores+=1;
    }

    //APELLIDO
    if (apellido == ""){
        document.getElementById("eapellido").innerHTML="Requerido";
        errores+=1;
    }

    //CORREO
    if (correo == "") {
        document.getElementById("ecorreo").innerHTML="Requerido";
        errores+=1;
    }
    else {
        var validar =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

        if( validar.test(correo.value) ){
            
        }
        else{
            document.getElementById("ecorreo").innerHTML="Formato no válido";
            errores+=1; 
        }
    }

    //PINES
    if (pin1.length == 8 || pin2.length == 8) {
        var valoresAceptados = /^[0-9]+$/
        if (pin1 != pin2) {
            document.getElementById("epin").innerHTML="No coinciden";
            errores+=1; 
        }
        else if (pin1.match(valoresAceptados) || pin2.match(valoresAceptados)){
          
        } 
        else {
            document.getElementById("epin").innerHTML="Deben ser números";
            errores+=1; 
        }
    } 
    else {
        document.getElementById("epin").innerHTML="Debe tener 8 dígitos";
        errores+=1; 
    }

    //PIN
    if (dni == "") {
        document.getElementById("edni").innerHTML='Requerido';
        errores+=1; 
    }
    else if(expresion_regular_dni.test(dni) === true){
        numero = dni.substr(0,dni.length-1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        let = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if (letra != let) {
            document.getElementById("edni").innerHTML='Dni erroneo, la letra del NIF no se corresponde';
            errores+=1; 
        }
        else{

        }
    }
    else{
        document.getElementById("edni").innerHTML='Dni erroneo, formato no válido';
        errores+=1; 
    }

    //TELÉFONO
    if (telefono.length != 9) {
        document.getElementById("etelefono").innerHTML='Teléfono erroneo';
        errores+=1; 
    }

    //CONFIRMACIÓN
    if (errores == 0) {
        alert("Tu nombre de usuario es: " + nombre.substring(0, 2)+ apellido.substring(0, 2)+ telefono.substring(6, 9))
    }
}