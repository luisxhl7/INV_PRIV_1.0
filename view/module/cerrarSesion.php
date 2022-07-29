<?php
    /*==============DOCUMENTACIO====================
        cuando el usuario le da click al boton de cerrar sesion, este contiene un link que direcciona a este archivo
        que basicamento lo unico que hace es cambiar el estado del usuario a falso para cerrar su sesion
    ===============================================*/
    session_start();
    $_SESSION["login"] = false;
    header("location:../../index");
?>