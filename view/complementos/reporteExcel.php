<?php
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename= inventario.xls");
    date_default_timezone_set('America/Bogota');    
    $fecha = date('m-d-Y', time());
    $hora = date('h:i:s a', time()); 

?>
<table border="2">
    <thead>
        <tr>
            <th colspan="5" rowspan="2">INV PRIV</th>
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
                <center>
                    <tr>
                        <td>' . $dato['Cod_Producto'] . '</td>
                        <td>' . $dato['Nombre'] . '</td>
                        <td>' . $dato['Descripcion_Grupo'] . '</td>
                        <td>' . $dato['Descripcion_Categoria'] . '</td>
                        <td>' . number_format($dato['Existencia']) . '</td>
                        <td>$ ' . number_format($dato['Precio']) . '</td>
                        <td>$ ' . number_format($dato['Existencia']*$dato['Precio']) . '</td>
                    </tr>
                </center>
                ';
            }
        ?>
    </tbody>
</table>