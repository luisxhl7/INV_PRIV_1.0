<?php
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename= inventario.xls");
?>
<link rel="stylesheet" href="view/css/inventario.css">
<table>
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