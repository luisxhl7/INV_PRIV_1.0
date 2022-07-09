<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
        <title>INV PRIV</title>
                    <!-- DIRECCIONES CSS -->
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/crearProducto.css">
        <!--                   DIRECCION PARA ESTILOS EN SWEETALERT2                  -->
        <link rel="stylesheet" href="view/css/sweetalert2.min.css">
        <script src="view/js/sweetalert2.all.min.js"></script>
        <!--                    DIRECCION PARA LOGOS EN CLOUDFLARE                    -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    </head>

    <body class ="interfazGeneral">
        <div>

            <header>                               <!-- TITULO -->
                <h1 class="titulo1">REGISTRAR PRODUCTO</h1>
            </header>

            <nav>                           <!-- MENU DE NAVEGACION -->
                <div class= "menu1">
                    <a href="salirMenuProducto" class ="botonMenu" title="Menu de productos">MENU DE BUSQUEDA</a>
                    <a href="" class ="botonMenu" title="Crear etiqueta">AGREGAR  ETIQUETA</a>
                    <a href="" class ="botonMenu" title="Agregar codigo de barras">AGREGAR CODIGO DE BARRAS</a>
                    <a href="" class ="botonMenu" title="Agregar imagen">AGREGAR IMAGEN</a>
                </div>
            </nav>

            <div class ="formulario1">   <!-- SOLO FALTA QUE EL INPUT DE IMAGEN PERMITA VER LA IMAGEN QUE SE ENVIARA-->
                <form action="" method ="post" enctype="multipart/form-data">
                    
                    <div class = "container1">
                        <div class = "campo">
                            <label for="nomPrdt">PRODUCTO:</label>
                            <input type="text" REQUIRED name="nombreProducto" class="campoTexto" id="nomPrdt" placeholder="Ingrese nombre">
                            <label for="codigo">CODIGO:</label> 
                            <input type="text" name="codigo" class="campoCodigo"  id="codigo" placeholder="ASIGNACION AUTOMATICA">
                        </div>
                        
                        <div class = "campo">
                            <label for="cantProdt">CANTIDAD:</label>
                            <input type="number" REQUIRED name="txtCantidad" class="campoTexto1" id="cantProdt" placeholder="Ingrese cantidad">
                            <label for="precio">PRECIO:</label>
                            <input type="number" REQUIRED name="precio" id="precio" class="campoTexto2" placeholder="Ingrese precio">
                        </div>
                        <div class = "campo">
                            <label for="categoria">CATEGORIA:</label>
                            <select name="categoria" id="categoria" class="barraDesplegable1" >
                                <option value="0">Seleccione categoria</option>
                                <option value="alimento">alimento</option>
                                <option value="aseo">aseo</option>
                                <option value="juguete">juguetes</option>
                                <option value="otro">otro</option>
                            </select>

                            <label for="grupo">GRUPO:</label> 
                            <select name="grupo" id="grupo" class="barraDesplegable2">
                                <option value="0">Seleccione grupo</option>
                                <option value="perro">perro</option>
                                <option value="gato">gato</option>
                                <option value="pez">pez</option>
                                <option value="pollo">pollo</option>
                            </select>
                        </div>

                        <div class = "descrip">
                            <label>DESCRIPCION:</label>
                        </div>

                        <div class = "campo">
                            <textarea name="descripcion" id="comentario" cols="30" rows="2"class="campoTexto3" placeholder ="INGRESE INFORMACION SOBRE EL PRODUCTO"></textarea>
                        </div>
                    </div>

                    <div class = "container2">
                        <div class = "campImg">
                            <label for="img">
                                <i class="fa-solid fa-image"></i>
                                <input type="file" name="imagen" id ="img" class="imgFile">
                            </label>
                            <!--<img src="https://cdn-icons-png.flaticon.com/512/16/16410.png" alt="" class="imagen2">-->
                        </div>
                        <div>
                            <input type="submit" value="REGISTRAR" class="boton1" name="guardarPrdt">
                        </div>
                    </div>
                </form>
            </div>

            <?php 
                if (isset($_POST['nombreProducto'])){
                    $objCon = new ControllerProductos();
                    $objCon -> ctrCrearProducto(
                        $_POST['nombreProducto'],
                        $_POST['grupo'],
                        $_POST['categoria'],
                        $_POST['precio'],
                        $_POST['descripcion'],
                        $_POST['txtCantidad']           
                    );
                }
            ?>
        </div>
    </body>
</html>