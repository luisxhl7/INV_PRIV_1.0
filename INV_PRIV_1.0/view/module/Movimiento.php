<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MENU USUARIO</title>
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
            <div id="cont-movimiento">
                <div class="contIzq">   
                    <div class="cont1">                 <!-- estilo no terminado-->
                        <label for="" class="label1">TIPO MOVIMIENTOS
                            <select name="" id="">
                                <option value="">seleccione tipo</option>
                                <option value="">salida</option>
                                <option value="">entrada</option>
                                <option value="">salida ajuste</option>
                                <option value="">entrada ajuste</option>
                            </select>
                        </label>
                        <label for="" class="cont0">
                            <i class="fa-solid fa-barcode"></i>
                            <input type="text" name="" id="" placeholder="ingrese codigo">
                        </label>
                    </div>
                    <div class="label2">                 <!-- estilo no terminado-->
                        <label for="" class="label2">
                            N unidades
                            <input type="text" name="" id="" placeholder="Ingrese unidades">
                        </label>
                    </div>
                    <div class="conForm">               <!-- estilo no terminado-->
                        <div>
                            <label for="" class="label1">
                                NOMBRE
                                <input type="text" name="" id="" placeholder="">
                            </label>
                            <label for="" class="label1">
                                CODIGO
                                <input type="text" name="" id="" placeholder="">
                            </label>
                        </div>
                        <div>
                            <label for="" class="label3">
                                CATEGORIA
                                <input type="text" name="" id="" placeholder="">
                            </label>
                            <label for="" class="label3">
                                GRUPO
                                <input type="text" name="" id="" placeholder="">
                            </label>
        
                        </div>
                        <div>
                            <label for="" class="label4">
                                VALOR UNIDAD
                                <input type="text" name="" id="" placeholder="">
                            </label>
                            <label for="" class="label4">
                                VALOR
                                <input type="text" name="" id="" placeholder="">
                            </label>
                        </div>
                    </div>
                    <div class="contBotones">
                        <div class ="contBtn">
                            <label for="push1">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <input type="submit" value="GUARDAR" class="boton1" name ="push1" id = "push1">
                            </label>
                        </div>
                        <div class ="contBtn">
                            <label for="push2">
                                <i class="fa-solid fa-circle-chevron-right"></i>
                                <input type="submit" value="VALIDAR" class="boton2" name ="push2" id = "push2">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="contDrc">
                    <div class="contFecha">
                        <label for="" class="fecha">fecha
                            <input type="time" name="" id="">
                        </label>
                    </div>
                    <h2 class="titulo">TITULO</h2>
                    <div class="imagen">
                        <img src="https://www.purina-latam.com/sites/g/files/auxxlc391/files/styles/kraken_generic_max_width_600/public/Purina%C2%AE%20Dog%20Chow%C2%AE%20Adultos%20Minis%20y%20Peque%C3%B1os.png?itok=DzlBKoLl" alt="" srcset="" class="img">
                    </div>
                </div>

            </div>
            <div id="cont-validar">
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
        </div>



            <!-----------------------------------------------------DIRECCIONES JS---------------------------------------------------->
        <script src="view/js/jquery-3.6.0.min.js"></script>
        <script src="view/js/TweenMax.min.js"></script>
        <script src="view/js/movimiento.js"></script>
    </body>
</html>