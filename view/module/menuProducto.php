<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>menu productos</title>
        <!--              DIRECCIONES CSS               -->
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/menuProducto.css">
    </head>

    <body class="interfazGeneral">
        <div>

            <nav>                           <!-- BUSCADOR -->
                <div class= "container1">
                    <div class="shearch1">
                        <input type="search" name="" id="" class="buscador1" placeholder="Buscar producto" title="buscador">
                        <label for="radioCodigo" class="shearchRadio">
                            <input type="radio" name="shearchRadio1" id="radioCodigo" class="filtro1">
                            CODIGO
                        </label>
                        <label for="radioNombre" class="shearchRadio">
                            <input type="radio" name="shearchRadio1" id="radioNombre" class="filtro2">
                            NOMBRE
                        </label>
                    </div>
                    <div class="shearch2">
                        <input type="text" name="" id="" class="camp1prod" placeholder="NOMBRE PRODUCTO">
                        <input type="text" name="" id="" class="camp2prod" placeholder="CODIGO">
                        <input type="text" name="" id="" class="camp2prod" placeholder="TIPO">
                        <input type="text" name="" id="" class="camp3prod" placeholder="CATEGRIA">
                        <input type="text" name="" id="" class="camp3prod" placeholder="PRECIO">
                    </div>
                </div>
            </nav>
    
            <div>                       <!-- TABLA DE PRODUCTOS -->
                <div>
                    <table border="1" class="tablaProdt">
                        <tr style="width: 200px;">
                            <th style="width: 150px;">CODIGO</th>
                            <th style="width: 150px;">NOMBRE</th>
                            <th style="width: 150px;">GRUPO</th>
                            <th style="width: 150px;">CATEGORIA</th>
                            <th style="width: 150px;">DESCRIPCION</th>
                            <th style="width: 150px;">UNIDADES</th>
                            <th style="width: 150px;">PRECIO</th>
                            <th style="width: 150px;">C.BARRAS</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            
            </div> 
    
            <div class="conBtns">           <!-- MENU DE NAVEGACION -->
                <a href="index.php?ruta=crearProducto" class="btnprdt" title="Registrar producto"><b>REGISTRAR</b></a>
                <a href="                    " class="btnprdt" title="Inhabilitar producto"><b>INHABILITAR</b></a>
                <a href="                    " class="btnprdt" title="Eliminar producto"><b>ELIMINAR</b></a>
                <a href="index.php?ruta=editarProducto" class="btnprdt" title="Editar producto"><b> EDITAR</b></a>           
            </div>
        </div>
    </body>
</html>