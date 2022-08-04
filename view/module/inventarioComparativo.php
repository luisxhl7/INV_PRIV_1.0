<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
        <title>INV PRIV</title>
        <!--                   DIRECCION PARA ESTILOS EN SWEETALERT2                  -->
        <link rel="stylesheet" href="view/css/sweetalert2.min.css">
        <script src="view/js/sweetalert2.all.min.js"></script>
        <!--                    DIRECCION PARA LOGOS EN CLOUDFLARE                    -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <!--              DIRECCIONES CSS               -->
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/menuProducto.css">
        <link rel="stylesheet" href="view/css/inventario.css">
    </head>

    <body class="interfazGeneral">
        <div>
            <div>
                <div class="contMenu">
                    <a href="menuPrincipal" class="boton-menu">MENU PRINCIPAL</a>
                    <a href="inventarioComparativo" class="boton-menu">COMPARAR INVENTARIO</a>
                    <a href="inventario" class="boton-menu">CONSULTAR MOVIMIENTOS</a>
                </div>
            </div>
            <div>
                <!-- TABLA DE USUARIOS -->
                <table>
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>INVENTARIO TEORICO</th>
                            <th>INVENTARIO FISICO</th>
                            <th>DIFERENCIAS</th>
                        </tr>

                    </thead>
    
                    <tbody>
                        <?php
                        $objCtrProducto = new ControllerProductos();
                        $listaProducto = $objCtrProducto->ctrConsultarProducto();
                        foreach ($listaProducto as $dato) {
                            echo '
                                <tr>
                                    <td>' . $dato['Cod_Producto'] . '</td>
                                    <td>' . $dato['Nombre'] . '</td>
                                    <td><input type="text" name="" class="campoNum" oninput="calcular()" id="unidadesTeoricas" value="' . $dato['Existencia'] . '" readonly="true"></td>
                                    <td><input type="text" name="" class="campoNum" oninput="clonar()" id="unidadesFisicas" ></td>
                                    <td><input type="text" name="" class="campoNum" id="diferencia" readonly="true"></td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="view/js/inventario.js"></script>
    </body>
</html>
