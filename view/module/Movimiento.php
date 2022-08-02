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

                            <!-- ajax llenar campos automaticamente  -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    </head>

    <body class="interfazGeneral">
        <div>
            <div>
                <span class = "btnMenu" id ="boton-movimiento">MOVIMIENTOS</span>
                <span class = "btnMenu" id ="boton-validar">VALIDAR</span>
            </div>
            <form>
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
                            <input type="text" name="Cod_Producto" id="Cod_Producto" class="form-control" placeholder="ingrese codigo" onblur="buscar_datos();">
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
                                <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="automatico">
                                <label for="txtCodigo" class="text-label">PRECIO:</label>
                                <input type="text" name="txtPrecio" id="txtPrecio" class="form-control" placeholder="automatico">
                            </div>
                            <div>
                                <label for="txtPrecio" class="text-label">GRUPO:</label>
                                <input type="text" name="txtGrupo" id="txtGrupo" class="form-control" placeholder="automatico">
                                <label for="txtTotal" class="text-label">CATEGORIA:</label>
                                <input type="text" name="txtCategoria" id="txtCategoria" class="form-control" placeholder="automatico">
                            </div>
                            <div>
                                <label for="txtCategoria" class="text-label">DESCRIP.:</label>
                                <input type="text" name="txtCategoria" id="txtCategoria" class="form-control" placeholder="automatico">
                                <label for="txtGrupo" class="text-label">EXISTENCIA:</label>
                                <input type="text" name="txtExistencia" id="txtExistencia" class="form-control" placeholder="automatico">
                            </div>
                            
                        </div>
                        <div class="contBotones">
                            <div class ="contBtn">
                                <label for="push1">
                                    <i class="fa-solid fa-circle-plus"><p class="txt-btm">AÑADIR</p></i>
                                    <button class="boton1" name ="push1" id = "push1">AÑADIR</button>
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
                            <h2 class="titulo"></h2>
                        </div>
                        <div class="cont-imagen">
                            <div class="imagen">
                                <img src="https://www.purina-latam.com/sites/g/files/auxxlc391/files/styles/kraken_generic_max_width_600/public/Purina%C2%AE%20Dog%20Chow%C2%AE%20Adultos%20Minis%20y%20Peque%C3%B1os.png?itok=DzlBKoLl" alt="" srcset="" class="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cont-validar"> <!---------------------------------- CONTENEDOR DE VALIDACION  ---------------------------------->
                    <div>
                        <div class="cont-info-mov">
                            <label for="">PROCEDIMIENTO:
                                <input type="text" class="txtinfo" name="" id="" readonly="true" value="">
                            </label>
                            <label for="">FECHA:
                                <input type="text" class="txtinfo" name="" id="" readonly="true" value="">
                            </label>
                            <label for="">HORA:
                                <input type="text" class="txtinfo" name="" id="" readonly="true" value="">
                            </label>
                            <label for="">ID USUARIO:
                                <input type="text" class="txtinfo" name="" id="" readonly="true" value="">
                            </label>
                        </div>
                        <div>
                            <table border="1" class="tabla">
                                <thead>
                                    <tr>
                                        <th style="width: 150px;">CODIGO</th>
                                        <th style="width: 150px;">NOMBRE</th>
                                        <th style="width: 150px;">GRUPO</th>
                                        <th style="width: 150px;">CATEGORIA</th>
                                        <th style="width: 150px;">DESCRIPCION</th>
                                        <th style="width: 150px;">UNIDADES</th>
                                        <th style="width: 150px;">VALOR</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>VALOR TOTAL</td>
                                        <td>$15.500</td>
                                    </tr>
                                </tfoot>
                        </table>
                    </div>
                    <div class="contBtnEnviar">
                        <input type="button" value="GUARDAR" class="btnEnviar">
                        <input type="button" value="ELIMINAR" class="btnEnviar">
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
  $(document).ready(function(){
        $('.cargando').hide();
      });  

  function buscar_datos()
  {
    Cod_Producto = $("Cod_Producto").val();
    console.log(Cod_Producto)
    
    
    var parametros = 
    {
      "buscar": "1",
      "Cod_Producto" : Cod_Producto
    };
    
    $.ajax(
    {
      data:  parametros,
      dataType: 'json',
      url:   'codigos_php.php',
      type:  'post',
      beforeSend: function() 
      {
        $('.formulario').hide();
        $('.cargando').show();
        
      }, 
      error: function()
      {alert("Error");},
      complete: function() 
      {
        $('.formulario').show();
        $('.cargando').hide();
       
      },
      success:  function (valores) 
      {
        if(valores.existe=="1") //Aqui usamos la variable que NO use en el vídeo
        {
          $("#txtNombre").val(valores.Nombre);
          $("#txtPrecio").val(valores.Precio);
          $("#txtGrupo").val(valores.Grupo);
          $("#txtCategoria").val(valores.Categoria);
          $("#txtExistencia").val(valores.Existencia);
        }
        else
        {
          alert("El producto no existe, ¡Crealo!")
        }

      }
    }) 
  }

  function limpiar()
  {
    $("#txtNombre").val("");
    $("#txtPrecio").val("");
    $("#txtGrupo").val("");
    $("#txtCategoria").val("");
    $("#txtExistencia").val(valores.Existencia);
  }

  function guardar()
  {
    var parametros = 
    {
      "guardar": "1",
      "Cod_Producto" : $("#Cod_Producto").val(),
      "Nombre" : $("#txt.Nombre").val(),
      "Precio" : $("#txtPrecio").val(),
      "Grupo" : $("#txtGrupo").val(),
      "Categoria" : $("#txtCategoria").val(),
      "Existencia" : $("#txtExistencia").val()
    };
    $.ajax(
    {
      data:  parametros,
      url:   'codigos_php.php',
      type:  'post',
      beforeSend: function() 
      {
        $('.formulario').hide();
        $('.cargando').show();
        
      }, 
      error: function()
      {alert("Error");},
      complete: function() 
      {
        $('.formulario').show();
        $('.cargando').hide();
       
      },
      success:  function (mensaje) 
      {$('.resultados').html(mensaje);}
    }) 
    limpiar();
  }
</script>
       
            <!-----------------------------------------------------DIRECCIONES JS---------------------------------------------------->
        <script src="view/js/jquery-3.6.0.min.js"></script>
        <script src="view/js/TweenMax.min.js"></script>
        <script src="view/js/movimiento.js"></script>
    </body>
</html>