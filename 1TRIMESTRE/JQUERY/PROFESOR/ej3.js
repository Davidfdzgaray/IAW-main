/* Rellena este fichero */
$(document).ready(function () {
    let tamano = 100;
    $("#btn-aumentar").click(function () {
        tamano+=100;
        $(".pares").css({fontSize: tamano+'%'});
    });
    $("#btn-disminuir").click(function () { 
        tamano-=100;
        $(".pares").css({fontSize: tamano+'%'});
    });
});