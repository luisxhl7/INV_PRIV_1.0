<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
        <title>INV PRIV</title>
        <!--                    DIRECCION PARA LOGOS EN CLOUDFLARE                    -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <!--                   DIRECCION PARA ESTILOS EN SWEETALERT2                  -->
        <link rel="stylesheet" href="view/css/sweetalert2.min.css">
        <script src="view/js/sweetalert2.all.min.js"></script>

        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/movimiento.css">
    </head>

    <body class="interfazGeneral">
        <div>
            <div class="cont-menu">
                <span class = "btnMenu"><a href="menuPrincipal" class ="boton-menu-usuario" title="Menu de productos">MENU PRINCIPAL</a></span>
                <span class = "btnMenu" id ="boton-movimiento">MOVIMIENTOS</span>
                <span class = "btnMenu" id ="boton-validar">VALIDAR</span>
            </div>
            <form method="post" autocomplete="off" enctype="multipart/form-data">
                <div id="cont-movimiento" class="cont-movimiento"><!---------------------------------- CONTENEDOR DEL FORMULARIO  ---------------------------------->
                    <div class="contIzq">   
                        <div class="cont1">                 <!-- estilo no terminado-->
                            <label for="txtTipoMovimiento" class="label1">TIPO MOVIMIENTOS</label>
                            <select name="" id="txtTipoMovimiento" class="txt-tipo-movimiento" oninput="clonar()">
                                <option value="">seleccione tipo</option>
                                <?php
                                    $objCtrMovimiento = new MovimientoController();
                                    $listaMovimiento = $objCtrMovimiento -> ctrListarTipoMovimiento();  
                                    foreach($listaMovimiento as $dato){
                                        if ($_SESSION["rol"] == 2 && $dato["Cod_Mov"] != 3) {
                                            echo'<option value="'.$dato["Cod_Mov"].'" id="txtTipoMovimiento"> '.$dato["Descripcion"].' </option>';
                                        }
                                        if($_SESSION["rol"] == 1){
                                            echo'<option value="'.$dato["Cod_Mov"].'" id="txtTipoMovimiento"> '.$dato["Descripcion"].' </option>';
                                        }
                                    }
                                ?>
                            </select>

                            <label for="txtCodigo" class="cont0"><i class="fa-solid fa-barcode"></i></label>
                            <input type="number" name="Cod_Producto" id="Cod_Producto" class="txt-Camp" placeholder="ingrese codigo" oninput="buscar_datos();">
                        </div>
                        <div class="cont-Unidades">          <!-- estilo no terminado-->
                            <label for="" class="label2">
                                N unidades
                                <input type="number" name="txtUnidades" id="txtUnidades" class="txt-Camp" placeholder="Ingrese unidades">
                            </label>
                        </div>
                        <div class="conForm">               <!-- estilo no terminado-->
                            <div>
                                <label for="txtNombre" class="text-label">NOMBRE:</label>
                                <input type="text" name="txtNombre" id="txtNombre" class="camp-txt-auto" placeholder="automatico" readonly="true" accesskey=”H″>
                                <label for="txtCodigo" class="text-label">PRECIO:</label>
                                <input type="text" name="txtPrecio" id="txtPrecio" class="camp-txt-auto" placeholder="automatico" readonly="true">
                            </div>
                            <div>
                                <label for="txtPrecio" class="text-label">GRUPO:</label>
                                <input type="text" name="txtGrupo" id="txtGrupo" class="camp-txt-auto" placeholder="automatico" readonly="true">
                                <label for="txtTotal" class="text-label">CATEGORIA:</label>
                                <input type="text" name="txtCategoria" id="txtCategoria" class="camp-txt-auto" placeholder="automatico" readonly="true">
                            </div>
                            <div>
                                <label for="txtCategoria" class="text-label">DESCRIP.:</label>
                                <input type="text" name="txtCategoria" id="txtCategoria" class="camp-txt-auto" placeholder="automatico" readonly="true">
                                <label for="txtGrupo" class="text-label">DISPONIBLE:</label>
                                <input type="text" name="txtExistencia" id="txtExistencia" class="camp-txt-auto" placeholder="automatico" readonly="true">
                            </div>            
                        </div>
                        <div class="contBotones">
                            <div class ="contBtn">
                                <label for="push1">
                                    <i class="fa-solid fa-circle-plus"><p class="txt-btm">AÑADIR</p></i>
                                    <button type="button" class="boton1" name ="push1" id = "push1" onclick="agregarProducto();">AÑADIR</button>
                                </label>
                            </div>
                            <div class ="contBtn">
                                <label for="push2">
                                    <i class="fa-solid fa-circle-chevron-right"><P class="txt-btm">VALIDAR</P></i>
                                    <button type="button" class="boton2" name ="push2" id = "push2">VALIDAR</button>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="contDrc">
                        <div class="contFecha">
                            <h2 id="HoraActual" name="HoraActual"></h2>
                            <input type="time" name="" class="txt-time" style="display: none;">
                        </div>
                        <div class="cont-titulo-imagen">
                        <input type="text" name="txtNombre" id="txtTitulo" class="camp-titulo" readonly="true">
                        </div>
                        <div class="cont-imagen">
                            <div class="imagen">
                                <?php /*echo'
                                    <img src="data:image/png;base64,'.base64_encode($datos['Imagen']).'" alt="" id="img-imagen">
                                ' */?>
                                <img src="view/img/LOGO INV.PRIV-03.png" alt="" id="imagenprdt" class="Logo">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cont-validar"> <!---------------------------------- CONTENEDOR DE VALIDACION  ---------------------------------->
                    <?php
                        date_default_timezone_set('America/Bogota');    
                        $fecha = date('m-d-Y', time());
                        $hora = date('h:i:s a', time()); 
                    ?>
                    <div>
                        <div class="cont-info-mov">
                            <label for="">PROCEDIMIENTO:
                                <input type="text" class="txtinfo" name="" id="txtProcedimiento" readonly="true" value="">
                            </label>
                            <label for="">FECHA:
                                <input type="text" class="txtinfo" name="" id="" readonly="true" value="<?php echo $fecha; ?>">
                            </label>
                            <label for="">HORA:
                                <input type="text" class="txtinfo" name="" id="" readonly="true" value="<?php echo $hora; ?>">
                            </label>
                            <label for="">ID USUARIO:
                                <input type="text" class="txtinfo" name="" id="" readonly="true" value="">
                            </label>
                        </div>
                        <div>
                            <table border="1" class="tabla">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;"></th>
                                        <th style="width: 150px;">CODIGO</th>
                                        <th style="width: 150px;">NOMBRE</th>
                                        <th style="width: 150px;">GRUPO</th>
                                        <th style="width: 150px;">CATEGORIA</th>
                                        <th style="width: 150px;">DESCRIPCION</th>
                                        <th style="width: 150px;">UNIDADES</th>
                                        <th style="width: 150px;">VALOR</th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoProductos">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="contBtnEnviar">
                        <input type="button" value="GUARDAR" class="btnEnviar" onclick="guardarCambios()">
                        <input type="button" value="ELIMINAR" class="btnEnviar">
                    </div>
                </div>
            </form>
        </div>
            <!-----------------------------------------------------DIRECCIONES JS---------------------------------------------------->
        <script src="view/js/jquery-3.6.0.min.js"></script>
        <script src="view/js/TweenMax.min.js"></script>
        <script src="view/js/movimiento.js"></script>
    </body>
</html>



