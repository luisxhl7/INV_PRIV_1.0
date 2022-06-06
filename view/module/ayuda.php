<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AYUDA</title>
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/ayuda.css">
    </head>
    
    <body class="interfazGeneral">
        <div class="container">

            <div class = "ContIcono">
                <label for="home" class="home">MENU</label>
            <a href="index.php?ruta=salida"><img src="view/img/home2.png" class="icono1" id= "home"></a>
            </div>

            <div class="menu">
                <a href="view/module/ayudas/version.php" class="Btn" target="Info">VERSION</a>
                <a href="view/module/ayudas/inventario.php" class="Btn" target="Info">INVENTARIO</a>
                <a href="view/module/ayudas/movimientos.php" class="Btn" target="Info">MOVIMIENTOS</a>
                <a href="view/module/ayudas/admUsuario.php" class="Btn" target="Info">ADM USUARIO</a>
                <a href="view/module/ayudas/registro.php" class="Btn" target="Info">REGISTRO</a>
            </div>

            <div class ="ContTitle">
                <h1 class="titulo">INV_PRIV_1.0</h1>
                <p class= "txt">Sistema para la gestión y control de inventario</p>
            </div>
            
            <div class ="ContInfo">
                <iframe src="view/module/ayudas/version.php" name="Info" frameborder="0" class="info"></iframe>
            </div>
        </div>
    </body>
</html>