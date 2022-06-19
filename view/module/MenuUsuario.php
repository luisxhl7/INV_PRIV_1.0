<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu Usuarios</title>
        <!--              DIRECCIONES CSS               -->
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/EstiloUsuario.css">
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
                        <label for="radioCodigo" class="shearchRadio">
                            <input type="radio" name="filtro" id="radioCodigo" class="filtro1" value="1" checked="">
                            ID USUARIO
                        </label>
                        <label for="radioNombre" class="shearchRadio">
                            <input type="radio" name="filtro" id="radioNombre" class="filtro2" value="2">
                            NOMBRE
                        </label>
                    </div>
                </div>
            </div>
            <div>                       <!-- TABLA DE USUARIOS -->
                <div>
                    <table border="1" class="tablaProdt">
                        <tr style="width: 200px;">
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
                                    echo"
                                        <tr>
                                            <td>".$dato["CODIGO"]."</td>
                                            <td>".$dato["USUARIO"]."</td>
                                            <td>".$dato["APELLIDO"]."</td>
                                            <td>".$dato["DOCUMENTO"]."</td>
                                            <td>".$dato["NACIMIENTO"]."</td>
                                            <td>".$dato["TELEFONO"]."</td>
                                            <td>".$dato["CORREO"]."</td>
                                            <td>".$dato["ROL"]."</td>
                                        </tr>
                                    ";
                                }                   
                            }
                            else { //si no se a buscasdo nada en especifico enseñe a todos los usuarios
                                $objCtrUsuario = new UsuarioController();
                                $listaUsuario = $objCtrUsuario -> ctrConsultarUsuario();  
                                foreach($listaUsuario as $dato){
                                    echo"
                                        <label for='aquifue'>
                                            <tr>
                                                <td><input type='radio' name='selectUser' id='aquifue' value=".$dato["CODIGO"]."></td>
                                                <td>".$dato["CODIGO"]."</td>
                                                <td>".$dato["USUARIO"]."</td>
                                                <td>".$dato["APELLIDO"]."</td>
                                                <td>".$dato["DOCUMENTO"]."</td>
                                                <td>".$dato["NACIMIENTO"]."</td>
                                                <td>".$dato["TELEFONO"]."</td>
                                                <td>".$dato["CORREO"]."</td>
                                                <td>".$dato["ROL"]."</td>
                                            </tr>
                                        </label>
                                    ";
                                }  
                            }
                        ?>
                    </table>
                </div>
            </div>
    
            <div class="conBtns">           <!-- MENU DE NAVEGACION -->
                <a href="index.php?ruta=registrarUsuario" class="btnprdt" title="Registrar producto"><b>REGISTRAR</b></a>
                <a href="                      " class="btnprdt" title="Inhabilitar producto"><b>INHABILITAR</b></a>
                <a href="                      " class="btnprdt" title="Eliminar producto"><b>ELIMINAR</b></a>
                <a href="index.php?ruta=editarUsuario" class="btnprdt" title="Editar producto"><b> EDITAR</b></a>           
            </div>
        </form>
        
    </body>
</html>