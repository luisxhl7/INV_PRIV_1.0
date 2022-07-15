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
                    <a href="menuProducto" class ="botonMenu" title="Menu de productos">MENU DE BUSQUEDA</a>
                    <a href="" class ="botonMenu" title="Crear etiqueta">AGREGAR  ETIQUETA</a>
                    <a href="" class ="botonMenu" title="Agregar codigo de barras">AGREGAR CODIGO DE BARRAS</a>
                </div>
            </nav>

            <div class ="formulario1">   <!-- SOLO FALTA QUE EL INPUT DE IMAGEN PERMITA VER LA IMAGEN QUE SE ENVIARA-->
                <form method ="post" enctype="multipart/form-data"> <!--Se requiere el contenido de el enctype para poder subir la imagen-->
                    
                    <div class = "container1">
                        <div class = "campo">
                            <label for="txtNombre">PRODUCTO:</label>
                            <input type="text" name="txtNombre" id="txtNombre" class="campoTexto" placeholder="Ingrese nombre" required>
                            <label for="txtCodigo">CODIGO:</label> 
                            <input type="text" name="txtCodigo" id="txtCodigo" class="campoCodigo" placeholder="ASIGNACION AUTOMATICA">
                        </div>
                        
                        <div class = "campo">
                            <label for="txtCantidad">CANTIDAD:</label>
                            <input type="number" name="txtCantidad" id="txtCantidad" class="campoTexto1" placeholder="Ingrese cantidad"  required>
                            <label for="txtPrecio">PRECIO:</label>
                            <input type="number" name="txtPrecio" id="txtPrecio" class="campoTexto2" placeholder="Ingrese precio"  required>
                        </div>
                        
                        <div class = "campo">
                            <label for="txtCategoria">CATEGORIA:</label>
                            <select name="txtCategoria" id="txtCategoria" class="barraDesplegable1" required>
                                <option value="0">Seleccione categoria</option>
                                <?php
                                    $objCtrProducto = new ControllerProductos();
                                    $listaProducto = $objCtrProducto -> ctrMostrarCategorias();  
                                    foreach($listaProducto as $dato){
                                        echo'<option value="'.$dato["Cod_Categoria"].'"> '.$dato["Descripcion_Categoria"].' </option>';
                                    }
                                ?>
                            </select>

                            <label for="txtGrupo">GRUPO:</label> 
                            <select name="txtGrupo" id="txtGrupo" class="barraDesplegable2" required>
                                <option value="0">Seleccione grupo</option>
                                <?php
                                    $objCtrProducto = new ControllerProductos();
                                    $listaProducto = $objCtrProducto -> ctrMostrarGrupos();  
                                    foreach($listaProducto as $dato){
                                        echo'<option value="'.$dato["Cod_Grupo"].'"> '.$dato["Descripcion_Grupo"].' </option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class = "descrip">
                            <label for="txtDescripcion">DESCRIPCION:</label>
                        </div>

                        <div class = "campo">
                            <textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="2" class="campoTexto3" placeholder ="INGRESE INFORMACION SOBRE EL PRODUCTO"></textarea>
                        </div>
                    </div>

                    <div class = "container2">
                        <div class = "campImg" id="boton">
                            <img src="./view/img/image-solid.svg" alt="" id="img-imagen">
                        </div>
                        <input type="file" name="imagen" id ="imagen" class="file" onchange="vista_preliminar(event)" accept=".png"> <!--Elemento invisible-->
                        <div>
                            <input type="submit" value="REGISTRAR" class="boton1" name="guardarPrdt">
                        </div>
                    </div>
                </form>
            </div>

            <?php 
                if (isset($_POST['txtNombre']) and $_POST['txtNombre'] != null){
                    $objCon = new ControllerProductos();                    
                    $objCon -> ctrCrearProducto(
                        $_POST['txtNombre'],
                        $_POST['txtCantidad'],
                        $_POST['txtPrecio'],
                        $_POST['txtCategoria'],
                        $_POST['txtGrupo'],
                        $_POST['txtDescripcion'],
                        addslashes(file_get_contents($_FILES['imagen']['tmp_name']))
                    );
                }
            ?>
        </div>
        <script src="./view/js/menuProductos.js"></script>
    </body>
</html>