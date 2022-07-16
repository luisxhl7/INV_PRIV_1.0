/*Funcion para ir a validar */
$('#cont-validar').hide(0);

$('#boton-validar').click(function(){
    $("#cont-movimiento").fadeOut(function(){
        $("#cont-validar").fadeIn(1000);
    });
});

$('#boton-movimiento').click(function(){
    $('#cont-validar').fadeOut(function(){
        $("#cont-movimiento").fadeIn(1000);
    });
});