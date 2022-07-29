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
                if (isset($_POST['selectPrdt'])) {
                    $objProducto = new ControllerProductos();
                    $listaDatos = $objProducto -> ctrMostrarProductoModificar($_POST['selectPrdt']);
                    foreach($listaDatos as $datos){
            ?>
            <div class ="formulario1">   <!-- SOLO FALTA QUE EL INPUT DE IMAGEN PERMITA VER LA IMAGEN QUE SE ENVIARA-->
                <form method ="post"  autocomplete="off" name="formulario" id="formulario" enctype="multipart/form-data">
                    <div class = "container1">
                        <div class = "campo">
                            <div class="form-groun" id="grupoNombre">
                                <div class="negacion">
                                    <label for="txtNombre">PRODUCTO:</label>
                                    <input type="text" name="txtNombre" id="txtNombre" class="campoTexto" placeholder="Ingrese nombre" value="<?php echo $datos['Nombre']; ?>" required>
                                    <i class="iconoDeError fas fa-times-circle"></i>
                                </div>
                                <p class="error">El Producto debe contener de 4 a 100 carapteres</p>
                            </div>
                            <div class="form-groun" id="grupoCodigo">
                                <div class="negacion">
                                    <label for="txtCodigo" class="codigo">CODIGO:</label> 
                                    <input type="text" name="txtCodigo" id="txtCodigo" class="campoCodigo" value="<?php echo $datos['Cod_Producto']; ?>" readonly="true" disabled ="true" required>
                                    <input type="text" name="txtCodigo" value="<?php echo $datos['Cod_Producto']; ?>" readonly="true" style="display: none;">
                                    <i class="iconoDeError fas fa-times-circle"></i>
                                </div>
                                <p class="error">error con el codigo</p>
                            </div>
                        </div>
                        
                        <div class = "campo">
                            <div class="form-groun" id="grupoCantidad">
                                <div class="negacion">
                                    <label for="txtCantidad">CANTIDAD:</label>
                                    <input type="text" name="txtCantidad" id="txtCantidad" class="campoTexto1" value="<?php echo $datos['Existencia']; ?>" readonly="true" disabled ="true" required>
                                    <input type="text" name="txtCantidad" value="<?php echo $datos['Existencia']; ?>" readonly="true" style="display: none;">
                                    <i class="iconoDeError fas fa-times-circle"></i>
                                </div>
                                <p class="error">debe contener de 1 a 6 digitos</p>
                            </div>
                            <div class="form-groun" id="grupoCantidad">
                                <div class="negacion">
                                    <label for="txtPrecio" class="precio">PRECIO:</label>
                                    <input type="number" name="txtPrecio" id="txtPrecio" class="campoTexto2" placeholder="Ingrese precio" value="<?php echo $datos['Precio']; ?>" required>
                                    <i class="iconoDeError fas fa-times-circle"></i>
                                </div>
                                <p class="error">debe contener de 3 a 9 digitos</p>
                            </div>
                        </div>

                        <div class = "campo">
                            <div>
                                <div>
                                    <label for="txtCategoria">CATEGORIA:</label>
                                    <select name="txtCategoria" id="txtCategoria" class="barraDesplegable1" >
                                        <option value="<?php echo $datos['Cod_Categoria']; ?>">Predeterminado</option>
                                        <?php
                                            $objCtrProducto = new ControllerProductos();
                                            $listaProducto = $objCtrProducto -> ctrMostrarCategorias();  
                                            foreach($listaProducto as $dato){
                                                echo'<option value="'.$dato["Cod_Categoria"].'"> '.$dato["Descripcion_Categoria"].' </option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="txtGrupo">GRUPO:</label> 
                                    <select name="txtGrupo" id="txtGrupo" class="barraDesplegable2">
                                        <option value="<?php echo $datos['Cod_Grupo']; ?>">Predeterminado</option>
                                        <?php
                                            $objCtrProducto = new ControllerProductos();
                                            $listaProducto = $objCtrProducto -> ctrMostrarGrupos();  
                                            foreach($listaProducto as $dato){
                                                echo'<option value="'.$dato["Cod_Grupo"].'"> '.$dato["Descripcion_Grupo"].' </option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class = "descrip">
                            <label for="txtDescripcion">DESCRIPCION:</label>
                        </div>

                        <div class = "campo">
                            <textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="2" class="campoTexto3" placeholder ="INGRESE INFORMACION SOBRE EL PRODUCTO" value="<?php echo $datos['Descripcion']; ?>"><?php echo $datos['Descripcion']; ?></textarea>
                        </div>
                    </div>

                    <div class = "container2">
                        <div class = "campImg" id="boton">
                            <img src="data:image/png;base64,<?php echo base64_encode($datos['Imagen']); ?>" alt="" id="img-imagen">
                            <input type="file" name="imagen" id ="imagen" class="file" onchange="vista_preliminar(event)" accept=".png"> <!--Elemento invisible-->
                        </div>
                        <div>
                            <button type="submit" class="boton1">CONFIRMAR</button>
                        </div>
                    </div>
                </form>
                <?php 
                                }}else{
                                    echo "<script>
                                        Swal.fire({
                                            title: 'Error',
                                            text: 'debe seleccionar un Producto para poder modificarlo',
                                            icon: 'error',
                                            showCancelButton: false,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'CONFIRMAR'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location='menuProducto';
                                            }else{
                                                window.location='menuProducto';
                                            }
                                        })
                                    </script>";
                                } 
                            ?><!--FINAL DE LA CONDIFION CON FOREACH-->
                <?php
                    if (isset($_POST["txtNombre"]) and $_POST["txtNombre"] != NULL) {
                        $objProducto = new ControllerProductos();
                        $objProducto -> ctrModificarProducto(
                            $_POST["txtNombre"],
                            $_POST["txtCodigo"],
                            $_POST["txtCantidad"],
                            $_POST["txtPrecio"],
                            $_POST["txtCategoria"],
                            $_POST["txtGrupo"],
                            $_POST["txtDescripcion"]
                        );
                    }
                ?>
            </div>
        </div>
        <script src="./view/js/validarFormEditarProducto.js"></script>
    </body>
</html>