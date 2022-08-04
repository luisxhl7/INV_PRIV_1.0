<?php
    /*Por medio de este procedimiento se capturan el tiempo real*/
    date_default_timezone_set('America/Bogota');    
    $fecha = date('m-d-Y', time());
    $hora = date('h:i:s a', time());
    /*fin del procedimiento*/
    $nombreImagen = "view/img/LOGO INV.PRIV-03.png";
    $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
    ob_start(); //inicio de la captura del html
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
            <div class="contInventario">
                <table border="2" style="border-style: solid;">
                    <thead>
                        <tr>
                            <th rowspan="2"><img src="http://<?php $_SERVER['HTTP_HOST'];?>/INV_PRIV_1.0/view/img/fondo.jpg" alt=""></th>
                            <th colspan="4" rowspan="2">INV PRIV</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                        </tr>
                        <tr>
                            <th><?php echo $fecha;?></th>
                            <th><?php echo $hora;?></th>
                        </tr>
                        <tr>
                            <th bgcolor="greenyellow">CODIGO</th>
                            <th bgcolor="greenyellow">NOMBRE</th>
                            <th bgcolor="greenyellow">GRUPO</th>
                            <th bgcolor="greenyellow">CATEGORIA</th>
                            <th bgcolor="greenyellow">EXISTENCIAS</th>
                            <th bgcolor="greenyellow">PRECIO UNIDAD</th>
                            <th bgcolor="greenyellow">PRECIO TOTAL</th>
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
    $html = ob_get_clean(); //final de la captura del html
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