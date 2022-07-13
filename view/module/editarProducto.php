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
                <h1 class="titulo1">EDITAR PRODUCTO</h1>
            </header>

            <nav>                           <!-- MENU DE NAVEGACION -->
                <div class= "menu1">
                    <a href="menuProducto" class ="botonMenu" title="Menu de productos">MENU DE BUSQUEDA</a>
                    <a href="" class ="botonMenu" title="Editar etiqueta">EDITAR  ETIQUETA</a>
                    <a href="" class ="botonMenu" title="Editar codigo de barras">EDITAR CODIGO DE BARRAS</a>
                </div>
            </nav>
            <?php
                if (isset($_GET['codigo'])) {
                    $objProducto = new ControllerProductos();
                    $datosProducto = $objProducto -> ctrMostrarProductoModificar($_GET['codigo']);
                }
            ?>
            <div class ="formulario1">   <!-- SOLO FALTA QUE EL INPUT DE IMAGEN PERMITA VER LA IMAGEN QUE SE ENVIARA-->
                <form method ="post" enctype="multipart/form-data">
                    
                    <div class = "container1">
                        <div class = "campo">
                            <label for="txtNombre">PRODUCTO:</label>
                            <input type="text" name="txtNombre" id="txtNombre" class="campoTexto" placeholder="Ingrese nombre" value="<?php echo $datosProducto[1]; ?>" required>
                            <label for="txtCodigo">CODIGO:</label> 
                            <input type="text" name="txtCodigo" id="txtCodigo" class="campoCodigo" value="<?php echo $datosProducto[0]; ?>" readonly="true" disabled ="true" required>
                        </div>
                        
                        <div class = "campo">
                            <label for="txtCantidad">CANTIDAD:</label>
                            <input type="text" name="txtCantidad" id="txtCantidad" class="campoTexto1" value="<?php echo $datosProducto[2]; ?>" readonly="true" disabled ="true" required>
                            <label for="txtPrecio">PRECIO:</label>
                            <input type="number" name="txtPrecio" id="txtPrecio" class="campoTexto2" placeholder="Ingrese precio" value="<?php echo $datosProducto[3]; ?>" required>
                        </div>

                        <div class = "campo">
                            <label for="txtCategoria">CATEGORIA:</label>
                            <select name="txtCategoria" id="txtCategoria" class="barraDesplegable1" >
                                <option value="<?php echo $datosProducto[6]; ?>">Predeterminado</option>
                                <?php
                                    $objCtrProducto = new ControllerProductos();
                                    $listaProducto = $objCtrProducto -> ctrMostrarCategorias();  
                                    foreach($listaProducto as $dato){
                                        echo'<option value="'.$dato["Cod_Categoria"].'"> '.$dato["Descripcion_Categoria"].' </option>';
                                    }
                                ?>
                            </select>

                            <label for="txtGrupo">GRUPO:</label> 
                            <select name="txtGrupo" id="txtGrupo" class="barraDesplegable2">
                                <option value="<?php echo $datosProducto[7]; ?>">Predeterminado</option>
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
                            <textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="2" class="campoTexto3" placeholder ="INGRESE INFORMACION SOBRE EL PRODUCTO" value="<?php echo $datosProducto[4]; ?>"><?php echo $datosProducto[4]; ?></textarea>
                        </div>
                    </div>

                    <div class = "container2">
                        <div class = "campImg">
                            <label for="img">
                                <i class="fa-solid fa-image"></i>
                                <input type="file" name="imagen" id ="img" class="imgFile">
                            </label>
                        </div>
                        <div>
                            <button type="button" class="boton1" onclick="editarProducto(txtNombre,txtCodigo,txtCantidad,txtPrecio,txtCategoria,txtGrupo,txtDescripcion)">CONFIRMAR</button>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_GET["nombre"]) and $_GET["nombre"] != NULL) {
                        $objProducto = new ControllerProductos();
                        $objProducto -> ctrModificarProducto(
                            $_GET["nombre"],
                            $_GET["codigo"],
                            $_GET["cantidad"],
                            $_GET["precio"],
                            $_GET["categoria"],
                            $_GET["grupo"],
                            $_GET["descripcion"]
                        );
                    }
                ?>
            </div>
        </div>
        <script src="./view/js/menuProductos.js"></script>
    </body>
</html>