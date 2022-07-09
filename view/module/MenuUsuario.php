<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
        <title>INV PRIV</title>
        <!--              DIRECCIONES CSS               -->
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/EstiloUsuario.css">
        <!--                   DIRECCION PARA ESTILOS EN SWEETALERT2                  -->
        <link rel="stylesheet" href="view/css/sweetalert2.min.css">
        <script src="view/js/sweetalert2.all.min.js"></script>
        <!--                   DIRECCION PARA ESTILOS EN SWEETALERT2                  -->
        <link rel="stylesheet" href="view/css/sweetalert2.min.css">
        <script src="view/js/sweetalert2.all.min.js"></script>
    </head>

    <body class="interfazGeneral">
        <form method="post">
            <div class= "container1">       <!-- BUSCADOR -->
                <div class="shearch1">
                    <label for="buscador1" class ="busqueda">BUSQUEDA</label>
                    <input type="text" name="buscador1" id="buscador1" class="buscador1" placeholder="Buscar usuario" title="buscador">
                    <div class ="Confiltros">
                        <label for="radioDocumento" class="shearchRadio">
                            <input type="radio" name="filtro" id="radioDocumento" class="filtro1" value="1" checked="">
                            DOCUMENTO
                        </label>
                        <label for="radioUserName" class="shearchRadio">
                            <input type="radio" name="filtro" id="radioUserName" class="filtro2" value="2">
                            USUARIO
                        </label>
                    </div>
                </div>
            </div>
            <div>                       <!-- TABLA DE USUARIOS -->
                <div>
                    <table border="1" class="tablaProdt">
                        <tr style="width: 200px;">
                            <th style="width: 20px;"><input type="radio" name="selectUser" id="selectDocument" class="filtro1" value="0" checked=""></th>
                            <th style="width: 150px;">ID USUARIO</th>
                            <th style="width: 150px;">NOMBRE</th>
                            <th style="width: 150px;">APELLIDOS</th>
                            <th style="width: 150px;">DOCUMENTO</th>
                            <th style="width: 130px;">FECHA NACIMIENTO</th>
                            <th style="width: 150px;">TELEFONO</th>
                            <th style="width: 170px;">CORREO</th>
                            <th style="width: 150px;">ROL</th>
                        </tr>
                        <?php
                            if (isset($_POST["buscador1"])) {   //SE REQUIERE ORGANIZAR LA CONDICION Y CREAR UNA NUEVA 
                                $objCtrUsuario = new UsuarioController();
                                $listaUsuario = $objCtrUsuario -> ctrConsultarUsuario();  
                                foreach($listaUsuario as $dato){
                                    echo'
                                        <tr>
                                            <td><input type="radio" name="selectUser" id="selectDocument" class="filtro1" value="'.$dato['Documento'].'"></td>
                                            <td>'.$dato['Id_Usuario'].'</td>
                                            <td>'.$dato['Nombre'].'</td>
                                            <td>'.$dato['Apellido'].'</td>
                                            <td>'.$dato['Documento'].'</td>
                                            <td>'.$dato['Fecha_N'].'</td>
                                            <td>'.$dato['Telefono'].'</td>
                                            <td>'.$dato['Correo'].'</td>
                                            <td>'.$dato['Descripcion'].'</td>
                                        </tr>
                                    ';
                                }                   
                            }
                            else { //si no se a buscasdo nada en especifico enseñe a todos los usuarios
                                $objCtrUsuario = new UsuarioController();
                                $listaUsuario = $objCtrUsuario -> ctrConsultarUsuario();
                                foreach($listaUsuario as $dato){
                                    echo'
                                        <tr>
                                            <td><input type="radio" name="selectUser" id="selectDocument" class="filtro1" value="'.$dato['Documento'].'"></td>
                                            <td>'.$dato['Id_Usuario'].'</td>
                                            <td>'.$dato['Nombre'].'</td>
                                            <td>'.$dato['Apellido'].'</td>
                                            <td>'.$dato['Documento'].'</td>
                                            <td>'.$dato['Fecha_N'].'</td>
                                            <td>'.$dato['Telefono'].'</td>
                                            <td>'.$dato['Correo'].'</td>
                                            <td>'.$dato['Descripcion'].'</td>
                                        </tr>
                                    ';
                                }  
                            }
                        ?>
                    </table>
                </div>
            </div>

            <div class="conBtns">           <!-- MENU DE NAVEGACION -->
                <a href="registrarUsuario" class="btnprdt" title="Registrar producto"><b>REGISTRAR</b></a>
                <a href="                      " class="btnprdt" title="Inhabilitar producto"><b>INHABILITAR</b></a>
                <button type="button" onclick="eliminar(selectDocument)" class="btnprdt" title="Eliminar producto">ELIMINAR</button>
                <button type="button" onclick="editar(selectDocument)" class="btnprdt" title="Editar producto">EDITAR</button>
            </div>
        </form>
        <?php
            if (isset($_GET['documento'])) {
                $objCtrUsuario = new UsuarioController();
                $objCtrUsuario -> ctrEliminarUsuario($_GET['documento']);  
            }
        ?>
        <script src="./view/js/menuUsuarios.js"></script>
    </body>
</html>