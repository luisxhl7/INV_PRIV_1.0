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
        <style>
            .unidades-faltan{
                background-color: red;
                border: none;
                height: 100%;
                text-align: center;
            }
            .unidades-sobran{
                background-color: rgb(255, 238, 0);
                border: none;
                height: 100%;
                text-align: center;
            }
            .unidades-perfectas{
                background-color: rgb(51, 255, 0);
                border: none;
                height: 100%;
                text-align: center;
            }
            .campoNum{
                background-color: transparent;
                border: none;
                height: 100%;
                text-align: center;
            }
        </style>
        
            <div>                       <!-- TABLA DE USUARIOS -->
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
                            $listaProducto = $objCtrProducto -> ctrConsultarProducto();  
                            foreach($listaProducto as $dato){
                                echo '
                                    <tr>
                                        <td>' . $dato['Cod_Producto'] . '</td>
                                        <td>' . $dato['Nombre'] . '</td>
                                        <td><input type="number" name="" class="campoNum" oninput="calcular()" id="unidadesTeoricas" value="'. $dato['Existencia'] .'" readonly="true"></td>
                                        <td><input type="number" name="" class="campoNum" oninput="calcular()" id="unidadesFisicas" ></td>
                                        <td><input type="number" name="" class="campoNum" id="diferencia" readonly="true"></td>
                                    </tr>
                                ';
                            }  
                        ?>
                    </tbody>
                </table>
            </div>
        <script>
            const calcular = () => {
                try {
                    const undTeoricas = parseFloat(document.querySelector("#unidadesTeoricas").value) || 0;
                    const undFisicas = parseFloat(document.querySelector("#unidadesFisicas").value) || 0;

                    document.getElementById("diferencia").value = undTeoricas - undFisicas;

                    if (document.getElementById("diferencia").value < 0) {
                        document.getElementById("diferencia").classList.remove('campoNum');
                        document.getElementById("diferencia").classList.remove('unidades-perfectas');
                        document.getElementById("diferencia").classList.remove('unidades-sobran');
                        document.getElementById("diferencia").classList.add('unidades-faltan');

                    }if(document.getElementById("diferencia").value == 0) {
                        document.getElementById("diferencia").classList.remove('campoNum');
                        document.getElementById("diferencia").classList.remove('unidades-sobran');
                        document.getElementById("diferencia").classList.remove('unidades-faltan');
                        document.getElementById("diferencia").classList.add('unidades-perfectas');

                    }if (document.getElementById("diferencia").value > 0) {
                        document.getElementById("diferencia").classList.remove('campoNum');
                        document.getElementById("diferencia").classList.remove('unidades-perfectas');
                        document.getElementById("diferencia").classList.remove('unidades-faltan');
                        document.getElementById("diferencia").classList.add('unidades-sobran');
                    }
                }catch(e){  
                }
            }
        </script>          
    </body>
</html>