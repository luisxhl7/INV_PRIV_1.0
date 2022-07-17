<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
        <title>INV PRIV</title>
        <!--                         DIRECCIONES DE CSS                         -->
        <link rel="stylesheet" href="view/css/soporte.css">
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
    </head>
    
    <body class = "interfazSoporte">

        <div>                      <!--Contenedor de boton menu principal-->        
            <label for="exit">
                <a href="menuPrincipal"><img src="view/img/home2.png" class="icono3" id= "exit"></a>
                <p class="TxtMenu">MENU</p>
            </label>
        </div>

        <div class = "container">
            <form action="">
                <div class = "cajon">  <!-- Contenedor del formulario -->
                    <div>              <!-- Campo de texto nombre -->
                        <label for=""><p class = "TxtInput">Nombre</p>
                            <input type="text" name="" id="" class = "campoTex">
                        </label>
                    </div>
                    <div>              <!-- Campo de texto E-MAIL -->
                        <label for=""><p class = "TxtInput">E-mail</p>
                            <input type="email" name="" id="" class = "campoTex">
                        </label>
                    </div>
                    <div>              <!-- Campo de texto asunto -->
                        <label for=""><p class = "TxtInput">Asunto</p>
                            <input type="text" name="" id="" class = "campoTex">
                        </label>
                    </div>
                    <div>              <!-- Campo de texto mensaje  -->
                        <label for=""><p class = "TxtInput">Mensaje</p>
                            <input type="text" name="" id="" class = "campoTexM">
                        </label>
                    </div>
                    <div>              <!-- Texto -->
                        <p class = "TxtInput">Envie sus dudas y sugerencias usando este formulario.</p>
                    </div>

                    <div>              <!-- Contenedor inferior de informacion y boton de enviar -->
                        <div class = "container2">     <!-- Contenedor de informacion -->
                            <div class = "InfoPrv">     <!-- Informacion -->
                                <small>INV_PRIV_1.0</small>
                                <br>
                                <small>Medellin - Antioquia - Colombia </small>
                                <br><br>
                                <small>Soporteinvpriv@gmail.com </small>
                                <br>
                                <small>CEL:301 492 43 91 </small>
                            </div>
                        </div>
                        <div class = "container3">     <!-- Contenedor de boton de enviar -->
                            <label for="">             <!--Boton de enviar -->
                                <input type="button" value="ENVIAR" class = "BtnEnviar">
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>