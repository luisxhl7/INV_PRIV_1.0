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

        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/movimiento.css">

    </head>

    <body class="interfazGeneral">
        <div>
            <div>
                <span class = "btnMenu" id ="boton-movimiento">MOVIMIENTOS</span>
                <span class = "btnMenu" id ="boton-validar">VALIDAR</span>
            </div>
            <form method="post">
                <div id="cont-movimiento" class="cont-movimiento"><!---------------------------------- CONTENEDOR DEL FORMULARIO  ---------------------------------->
                    <div class="contIzq">   
                        <div class="cont1">                 <!-- estilo no terminado-->
                            <label for="txtTipoMovimiento" class="label1">TIPO MOVIMIENTOS</label>
                            <select name="" id="txtTipoMovimiento" class="txt-tipo-movimiento">
                                <option value="">seleccione tipo</option>
                                <?php
                                    $objCtrMovimiento = new MovimientoController();
                                    $listaMovimiento = $objCtrMovimiento -> ctrListarTipoMovimiento();  
                                    foreach($listaMovimiento as $dato){
                                        echo'<option value="'.$dato["Cod_Mov"].'"> '.$dato["Descripcion"].' </option>';
                                    }
                                ?>
                            </select>

                            <label for="txtCodigo" class="cont0"><i class="fa-solid fa-barcode"></i></label>
                            <input type="text" name="" id="txtCodigo" class="txt-Camp" placeholder="ingrese codigo">
                        </div>
                        <div class="cont-Unidades">                 <!-- estilo no terminado-->
                            <label for="" class="label2">
                                N unidades
                                <input type="text" name="" id="" class="txt-Camp" placeholder="Ingrese unidades">
                            </label>
                        </div>
                        <div class="conForm">               <!-- estilo no terminado-->
                            <div>
                                <label for="txtNombre" class="text-label">NOMBRE:</label>
                                <input type="text" name="txtNombre" id="txtNombre" class="txt-Camp" placeholder="automatico">
                                <label for="txtCodigo" class="text-label">PRECIO:</label>
                                <input type="text" name="txtCodigo" id="txtCodigo" class="txt-Camp" placeholder="automatico">
                            </div>
                            <div>
                                <label for="txtPrecio" class="text-label">GRUPO:</label>
                                <input type="text" name="txtPrecio" id="txtPrecio" class="txt-Camp" placeholder="automatico">
                                <label for="txtTotal" class="text-label">CATEGORIA:</label>
                                <input type="text" name="txtTotal" id="txtTotal" class="txt-Camp" placeholder="automatico">
                            </div>
                            <div>
                                <label for="txtCategoria" class="text-label">DESCRIP.:</label>
                                <input type="text" name="txtCategoria" id="txtCategoria" class="txt-Camp" placeholder="automatico">
                                <label for="txtGrupo" class="text-label">EXISTENCIA:</label>
                                <input type="text" name="txtGrupo" id="txtGrupo" class="txt-Camp" placeholder="automatico">
                            </div>
                            
                        </div>
                        <div class="contBotones">
                            <div class ="contBtn">
                                <label for="push1">
                                    <i class="fa-solid fa-floppy-disk"><p class="txt-btm">GUARDAR</p></i>
                                    <button class="boton1" name ="push1" id = "push1">GUARDAR</button>
                                </label>
                            </div>
                            <div class ="contBtn">
                                <label for="push2">
                                    <i class="fa-solid fa-circle-chevron-right"><P class="txt-btm">VALIDAR</P></i>
                                    <button class="boton2" name ="push2" id = "push2">VALIDAR</button>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="contDrc">
                        <div class="contFecha">
                            <label for="" class="fecha">fecha
                                <input type="time" name="" id="" class="txt-time">
                            </label>
                        </div>
                        <div class="cont-titulo-imagen">
                            <h2 class="titulo">TITULO</h2>
                        </div>
                        <div class="cont-imagen">
                            <div class="imagen">
                                <img src="https://www.purina-latam.com/sites/g/files/auxxlc391/files/styles/kraken_generic_max_width_600/public/Purina%C2%AE%20Dog%20Chow%C2%AE%20Adultos%20Minis%20y%20Peque%C3%B1os.png?itok=DzlBKoLl" alt="" srcset="" class="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cont-validar"> <!---------------------------------- CONTENEDOR DE VALIDACION  ---------------------------------->
                    <div>                       <!-- TABLA DE VALIDACION DE MOVIMIENTO -->
                        <div>
                            <br><br>
                            <b>PROCEDIMIENTO : SALIDA</b>
                            <b>FECHA : 01/01/2022</b>
                            <b>HORA : 9:00 AM</b>
                            <b>ID USUARIO : LUISCHL7</b>
                            <br><br>
                        </div>
                        <div>
                            <table border="1" class="tabla">
                            <tr>
                                <th style="width: 150px;">CODIGO</th>
                                <th style="width: 150px;">NOMBRE</th>
                                <th style="width: 150px;">GRUPO</th>
                                <th style="width: 150px;">CATEGORIA</th>
                                <th style="width: 150px;">DESCRIPCION</th>
                                <th style="width: 150px;">UNIDADES</th>
                                <th style="width: 150px;">VALOR</th>
                            </tr>
                            <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>
                            <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>                        <tr>
                                <td>99991</td>
                                <td>dog show</td>
                                <td>comida</td>
                                <td>canino</td>
                                <td>alimento para cachorros</td>
                                <td>2</td>
                                <td>$15.500</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>VALOR TOTAL</td>
                                <td>$15.500</td>
                            </tr>
                        </table>
                    </div>
                    <div class="contBtnEnviar">
                        <i class="fa-solid fa-person-rifle"></i>
                        <input type="button" value="enviar" class="btnEnviar">
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