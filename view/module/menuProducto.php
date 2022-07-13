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
    </head>

    <body class="interfazGeneral">
    <form method="post">
            <div>                       <!-- TABLA DE USUARIOS -->
                <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="selector"><input type="radio" name="selectPrdt" id="selectPrdt" class="filtro1" value="0" checked style="display: none;"></th>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>GRUPO</th>
                            <th>CATEGORIA</th>
                            <th>DESCRIPCION</th>
                            <th>EXISTENCIAS</th>
                            <th>PRECIO</th>
                            <th>C.BARRAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $objCtrProducto = new ControllerProductos();
                            $listaProducto = $objCtrProducto -> ctrConsultarProducto();  
                            foreach($listaProducto as $dato){
                                echo '
                                    <tr>
                                        <td class="selector"><input type="radio" name="selectPrdt" id="selectPrdt" class="filtro1" value="' . $dato['Cod_Producto'] . '"></td>
                                        <td>' . $dato['Cod_Producto'] . '</td>
                                        <td>' . $dato['Nombre'] . '</td>
                                        <td>' . $dato['Descripcion_Grupo'] . '</td>
                                        <td>' . $dato['Descripcion_Categoria'] . '</td>
                                        <td>' . $dato['Descripcion'] . '</td>
                                        <td>' . $dato['Existencia'] . '</td>
                                        <td>$ ' . $dato['Precio'] . '</td>
                                        <td> <i class="fa-solid fa-barcode"></i> </td>
                                    </tr>
                                ';
                            }  

                        ?>
                    </tbody>
                </table>
            </div>

            <div class="conBtns">           <!-- MENU DE NAVEGACION -->
                <a href="crearProducto" class="btnprdt" title="Registrar producto"><b>REGISTRAR</b></a>
                <button type="button" class="btnprdt2" title="Inhabilitar producto">INHABILITAR</button>
                <button type="button" onclick="eliminar(selectPrdt)" class="btnprdt2" title="Eliminar producto">ELIMINAR</button>
                <button type="button" onclick="editar(selectPrdt)" class="btnprdt2" title="Editar producto">EDITAR</button>
            </div>
        </form>
        <?php  /*PROCEDIMIENTOO PARA ELIMINAR PRODUCTO */
            if (isset($_GET['codigo'])) {
                $objProducto = new ControllerProductos();
                $objProducto -> ctrEliminarProducto(
                    $_GET['codigo']
                );                
            }
        ?>

        <!-----------DIRECCIONES DE JS--------- -->
            <script src="./view/js/menuProductos.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
            <script>
                $(document).ready(function () {
                $('#tabla').DataTable({
                    language: {
                        search:         "BUSCADOR:",
                        zeroRecords:    "NO EXISTEN RESULTADOS"
                    }
                });
                });
            </script>
    </body>
</html>