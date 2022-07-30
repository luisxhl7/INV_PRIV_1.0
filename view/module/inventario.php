<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
        <title>INV PRIV</title>
        <link rel="stylesheet" href="view/css/inventario.css">
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
    </head>
    <body class="interfazGeneral">
        <div class="contenedorP">
            <div class="contMenu">
                <a href="menuPrincipal" class="boton-menu">MENU PRINCIPAL</a>
                <a href="inventario" class="boton-menu">CONSULTAR INVENTARIO</a>
                <a href="" class="boton-menu">CONSULTAR MOVIMIENTOS</a>
                <a href="inventarioComparativo" class="boton-menu">COMPARAR INVENTARIO</a>
            </div>
            <div class="contOpciones">
                <button class="btn-formato"><a href="reporteExcel"><img src="view/img/excel.png" alt=""></a></button>
                <button class="btn-formato"><a href="reportePdf"><img src="view/img/pdf.png" alt=""></a></button>
            </div>
            <div class="contInventario">
                <table id="tabla" class="tabla" style="width:100%">
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>GRUPO</th>
                            <th>CATEGORIA</th>
                            <th>EXISTENCIAS</th>
                            <th>PRECIO UNIDAD</th>
                            <th>PRECIO TOTAL</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $objCtrProducto = new ControllerProductos();
                            $listaProducto = $objCtrProducto -> ctrConsultarProducto();  
                            foreach($listaProducto as $dato){
                                echo '
                                    <tr>
                                        <td>' . $dato['Cod_Producto'] . '</td>
                                        <td>' . $dato['Nombre'] . '</td>
                                        <td>' . $dato['Descripcion_Grupo'] . '</td>
                                        <td>' . $dato['Descripcion_Categoria'] . '</td>
                                        <td>' . number_format($dato['Existencia']) . '</td>
                                        <td>$ ' . number_format($dato['Precio']) . '</td>
                                        <td>$ ' . number_format($dato['Existencia']*$dato['Precio']) . '</td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>