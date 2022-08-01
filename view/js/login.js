/*                                  funcion de ingreso al formulario de inicio de sesion                                  */
$('#Boton-inicio').click(function () {
    /*===============DOCUMENTACION=======================
        Se crea una funcion tipo flecha en la cual al darle click al boton con icono de usuario desaparecera el contenedor de este y aparecera
        el contenedor de el inicio de sesion
    =====================================================*/
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

/*                                       funcion de ingreso a cambiar contraseña                                       */
$('#olvid-pass').click(function () {
    /*===============DOCUMENTACION=======================
        Se crea una funcion tipo flecha en la cual al darle click en el texto de recordar contraseña desaparecera el contenedor de inicio de sesion 
        y aparecera el contenedor de recordar contraseña
    =====================================================*/
    $("#Contenedor-login").fadeOut(function () {
        $("#Contenedor-recuperar").fadeIn();
    });
});

/*                                        funcion de ingreso a cambiar tu contraseña                                        */
$('#Cambiar-pass').click(function () {
    /*===============DOCUMENTACION=======================
        Se crea una funcion tipo flecha en la cual al darle click en el texto de cambiar contraseña desaparecera el contenedor de inicio de sesion 
        y aparecera el contenedor de cambiar contraseña
    =====================================================*/
    $("#Contenedor-login").fadeOut(function () {
        $("#Contenedor-cambiar").fadeIn();
    });
});

/*                                  Funciones para volver al formulario de inicio de sesion                                 */
$('#Btn-Cancel1').click(function () {
    /*===============DOCUMENTACION=======================
        Se crea una funcion tipo flecha en la cual al darle click en el boton cancelar desaparecera el contenedor de recordar contraseña
        y aparecera el contenedor de inicio de sesion
    =====================================================*/
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
    /*===============DOCUMENTACION=======================
        Se crea una funcion tipo flecha en la cual al darle click en el boton cancelar desaparecera el contenedor de cambiar contraseña
        y aparecera el contenedor de inicio de sesion
    =====================================================*/
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
    /*===============DOCUMENTACION=======================
        Se crea una funcion tipo flecha en la cual al darle click en el boton con icono de (X) desaparecera el contenedor de inicio de sesion
        y aparecera el contenedor del icono de usuario
    =====================================================*/
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
    /*================DOCUMENTACION=======================
        se crea un evento en el cual al darle al icono del ojo bloqueado en la interfaz de inicio de sesion cambiara 
        el icono de ojobloqueado por un ojo abierto y adicional cambiara el input de ser tipo password a tipo texto 
        para permitir la visualizacion del contenido esto mismo se ejecuta de invera
    =====================================================*/ 
    const icon = this.querySelector("i");

    if(this.nextElementSibling.type === "password"){
        this.nextElementSibling.type = "text"; //campo de texto 
        icon.classList.remove("fa-eye-slash"); //ojo bloqueado
        icon.classList.add("fa-eye");          //ojo abierto
    }
    else if(this.nextElementSibling.type === "text"){
        this.nextElementSibling.type = "password"; //campo de password
        icon.classList.remove("fa-eye");       //ojo abierto
        icon.classList.add("fa-eye-slash");    //ojo bloqueado
    }
})
