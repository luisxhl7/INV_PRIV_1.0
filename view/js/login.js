/*                                  funcion de ingreso al formulario de inicio de sesion                                  */
$('#Boton-inicio').click(function () {
    $('#Boton-inicio').fadeOut("flash", function () {
        $("#Contenedor-login").fadeIn();
        TweenMax.from("#Contenedor-login", .4, {
            scale: 0,
            ease: Sine.easeInOut
        });
        TweenMax.to("#Contenedor-login", .4, {
            scale: 1,
            ease: Sine.easeInOut
        });
    });
});
/*                                       funcion de ingreso a olvidaste tu contraseña                                       */
$('#olvid-pass').click(function () {
    $("#Contenedor-login").fadeOut(function () {
        $("#Contenedor-recuperar").fadeIn();
    });
});

/*                                        funcion de ingreso a cambiar tu contraseña                                        */
$('#Cambiar-pass').click(function () {
    $("#Contenedor-login").fadeOut(function () {
        $("#Contenedor-cambiar").fadeIn();
    });
});

/*                                  Funciones para volver al formulario de inicio de sesion                                 */
$('#Btn-Cancel1').click(function () {
    $('#Contenedor-recuperar').fadeOut("slow", function () {
        $("#Contenedor-login").fadeIn();
        TweenMax.from("#Contenedor-login", .4, {
            scale: 1,
            ease: Sine.easeInOut
        });
        TweenMax.to("#Contenedor-login", .4, {
            scale: 0,
            ease: Sine.easeInOut
        });
        TweenMax.to("#Contenedor-login", .4, {
            scale: 1,
            ease: Sine.easeInOut
        });
    });
});
$('#Btn-Cancel2').click(function () {
    $('#Contenedor-cambiar').fadeOut("slow", function () {
        $("#Contenedor-login").fadeIn();
        TweenMax.from("#Contenedor-login", .4, {
            scale: 1,
            ease: Sine.easeInOut
        });
        TweenMax.to("#Contenedor-login", .4, {
            scale: 0,
            ease: Sine.easeInOut
        });
        TweenMax.to("#Contenedor-login", .4, {
            scale: 1,
            ease: Sine.easeInOut
        });
    });
});

/*                                          funcion para volver al icono de inicio                                          */
$(".close-btn").click(function () {
    TweenMax.from("#Contenedor-login", .4, {
        scale: 1,
        ease: Sine.easeInOut
    });
    TweenMax.to("#Contenedor-login", .4, {
        left: "0px",
        scale: 0,
        ease: Sine.easeInOut
    });
    $("#Contenedor-login, #Contenedor-recuperar").fadeOut(800, function () {
        $("#Boton-inicio").fadeIn(800);
    });
});

/*                                            Evento del icono ojo de CONTRASEÑA                                            */
const iconOjo = document.querySelector(".inoco-ojo");
iconOjo.addEventListener("click",function(){
    const icon = this.querySelector("i");

    if(this.nextElementSibling.type === "password"){
        this.nextElementSibling.type = "text";
        icon.classList.remove("fa-eye-slash"); //ojo bloqueado
        icon.classList.add("fa-eye");          //ojo abierto

    }
    else if(this.nextElementSibling.type === "text"){
        this.nextElementSibling.type = "password";
        icon.classList.remove("fa-eye");       //ojo abierto
        icon.classList.add("fa-eye-slash");    //ojo bloqueado
    }
})
