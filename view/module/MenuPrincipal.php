<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
        <title>INV PRIV</title>
        <!--               DIRECCIONES DE CSS               -->
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/MenuPrincipal.css">
        <!--                    DIRECCION PARA LOGOS EN CLOUDFLARE                    -->
        <script src="https://kit.fontawesome.com/57868abadd.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="interfazGeneral">

        <div class = "container">
            <div class="contMenu">
                <div class = "menu">        <!-- Contenedor del menu -->
                    <div>  <!-- Boton modulo producto -->
                        <a href="menuProducto">
                            <input type="button" value="PRODUCTO" class = "boton">
                        </a>
                    </div>
                    <div>  <!-- Boton modulo inventario -->
                        <a href="inventario">
                            <input type="button" value="INVENTARIO" class="boton">
                        </a>
                    </div>
                    <div>  <!-- Boton modulo movimientos -->
                        <a href="movimiento">
                            <input type="button" value="MOVIMIENTOS" class="boton">
                        </a>
                    </div>
                    <div>  <!-- Boton modulo ADM usuario -->
                        <a href="admUsuario">
                            <input type="button" value="ADM USUARIO" class="boton">
                        </a>
                    </div>
                    <div class="contInfo">
                        <label for="support">  <!-- Boton con icono de soporte -->
                            <a href="soporte"><i class="fa-solid fa-headset" id= "support"><p>SOPORTE</p></i></a>
                        </label>
                        <label for="help">     <!-- Boton con icono de ayuda -->
                            <a href="ayuda"><i class="fa-solid fa-circle-question" id= "help"><p>AYUDA</p></i></a>
                        </label>
                    </div>
                </div>
            </div>

            <div class ="divLogo">      <!-- Contenedor fuera del menu -->

                <div>                   <!-- Logo INV_PRIV -->
                    <img src="view/IMG/LOGO INV.PRIV-03.png" alt="" class = "logo">
                </div>
                <h1><em><b>             <!-- TEXTO -->
                    Sistema para la gestión y control de inventario
                </b></em></h1>

                <div class="contExit">
                    <label for="exit">
                        <a href="view/module/cerrarSesion.php" class="exit" name ="exit" id ="exit"><i class="fa-solid fa-right-from-bracket"><p>cerrar sesion</p></i>   </a>                                        
                    </label>
                </div>
            </div>
        </div>
        
    </body>
</html>