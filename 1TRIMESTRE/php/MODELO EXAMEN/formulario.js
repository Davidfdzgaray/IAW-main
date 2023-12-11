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

    //ASUNTO
    var asunto = document.getElementById("asunto").value;
    
    if (asunto == ""){
        document.getElementById("easunto").innerHTML="Requerido";
        errores+=1;
    }

    //DNI
    var dni = document.getElementById("dni").value;
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
    dni = dni.toUpperCase();

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
    
    //NOMBRE
    var nombre = document.getElementById("nombre").value;

    if (nombre == ""){
        document.getElementById("enombre").innerHTML="Requerido";
        errores+=1;
    }

    //1 APELLIDO
    var apellido = document.getElementById("1apellido").value;

    if (apellido == ""){
        document.getElementById("e1apellido").innerHTML="Requerido";
        errores+=1;
    }

    //NACIMIENTO
    var nacimiento = document.getElementById("nacimiento").value;

    if (nacimiento == "dd/mm/aaaa"){
        document.getElementById("enacimiento").innerHTML="Requerido";
        errores+=1;
    }

    //TELÉFONO
    var telefono = document.getElementById("telefono").value;

    if (telefono.length != 9) {
        document.getElementById("etelefono").innerHTML='Teléfono erroneo';
        errores+=1; 
    }

    //DOMICILIO
    var domicilio = document.getElementById("domicilio").value;

    if (domicilio == ""){
        document.getElementById("edomicilio").innerHTML="Requerido";
        errores+=1;
    }

    //MUNICIPIO
    var municipio = document.getElementById("municipio").value;

    if (municipio == "selecciona"){
        document.getElementById("emunicipio").innerHTML="Requerido";
        errores+=1;
    }

    //OFICINA
    var oficina = document.getElementById("oficina").value;

    if (oficina == "selecciona"){
        document.getElementById("eoficina").innerHTML="Requerido";
        errores+=1;
    }

    //INFO
    var info = document.getElementById("info").value;

    if (info == ""){
        document.getElementById("einfo").innerHTML="Requerido";
        errores+=1;
    }

    //ANEXOS
    var fileSizeI = $('#anexo1')[0].files[0].size;
    var siezekiloByteI = parseInt(fileSizeI / 1024);
    if (siezekiloByteI >  2000) {
        document.getElementById("eanexo1").innerHTML="Demasiado grande";
    }

    var fileSizeII = $('#anexo2')[0].files[0].size;
    var siezekiloByteII = parseInt(fileSizeII / 1024);
    if (siezekiloByteII >  2000) {
        document.getElementById("eanexo2").innerHTML="Demasiado grande";
    }

    //CHECKBOX
    var isChecked = document.getElementById('acepto').checked;
    if(!isChecked){
        document.getElementById("eacepto").innerHTML="Requerido";
        errores+=1;
    }

    //CONFIRMACIÓN
    if (errores == 0) {
        alert("Tu nombre de usuario es: " + nombre.substring(0, 2)+ apellido.substring(0, 2)+ telefono.substring(6, 9))
    }
}