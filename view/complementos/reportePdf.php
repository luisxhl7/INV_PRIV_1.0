<?php
    ob_start();
?>
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
            <img src="http://<?php $_SERVER['HTTP_HOST'];?>/INV_PRIV_1.0/img/LOGO INV.PRIV-03.png" alt="">
            <div class="contInventario">
                <img src="view/img/LOGO INV.PRIV-03.png" alt="" id="Logo" class="Logo">

                <table style="border: 1px;">
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
<?php
    $html = ob_get_clean();
    //echo $html;
    use Dompdf\Dompdf;
    
    $dompdf = new Dompdf();
    $options = $dompdf -> getOptions();
    $options -> set(array('isRemoteEnabled' => true));
    $dompdf -> setOptions($options);
    $dompdf -> loadHtml($html);
    $dompdf -> setPaper('letter');
    //$dompdf -> setPaper('A4','landscape'); crea las hojas del pdf de forma horizontal
    $dompdf -> render();
    $dompdf -> stream("inventario.pdf", array("Attachment" => true));
?>