<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu Principal</title>
        <!--               DIRECCIONES DE CSS               -->
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/MenuPrincipal.css">
    </head>
    
    <body class="interfazGeneral">

        <div class = "container">
            <div class = "menu">        <!-- Contenedor del menu -->
                <div>  <!-- Boton modulo producto -->
                    <a href="index.php?ruta=producto">
                        <input type="button" value="PRODUCTO" class = "boton">
                    </a>
                </div>
                <div>  <!-- Boton modulo inventario -->
                    <a href="index.php?ruta=inventario">
                        <input type="button" value="INVENTARIO" class="boton">
                    </a>
                </div>
                <div>  <!-- Boton modulo movimientos -->
                    <a href="index.php?ruta=movimiento">
                        <input type="button" value="MOVIMIENTOS" class="boton">
                    </a>
                </div>
                <div>  <!-- Boton modulo ADM usuario -->
                    <a href="index.php?ruta=admUsuario">
                        <input type="button" value="ADM USUARIO" class="boton">
                    </a>
                </div>
                <div>
                    <label for="support">  <!-- Boton con icono de soporte -->
                        <a href="index.php?ruta=soporte"><img src="view/IMG/support.png" class="icono1" id= "support"></a>
                        <br>
                        <p>SOPORTE</p>
                    </label>
                    <label for="help">     <!-- Boton con icono de ayuda -->
                        <a href="index.php?ruta=ayuda"><img src="view/img/help.png" class="icono2" id= "help"></a>
                        <br>
                        <p>AYUDA</p>
                    </label>
                </div>
            </div>

            <div class ="divLogo">      <!-- Contenedor fuera del menu -->

                <div>                   <!-- Logo INV_PRIV -->
                    <img src="view/IMG/LOGO INV.PRIV-03.png" alt="" class = "logo">
                </div>
                <h1><em><b>             <!-- TEXTO -->
                    Sistema para la gestión y control de inventario
                </b></em></h1>

                <div>
                    <label for="exit">
                        <a href="view/module/cerrarSesion.php" class="exit" name ="exit" id ="exit">
                        <img src="view/IMG/exit.png" class="icono3">cerrar sesion</a>
                    </label>
                </div>
            </div>
        </div>
        
    </body>
</html>