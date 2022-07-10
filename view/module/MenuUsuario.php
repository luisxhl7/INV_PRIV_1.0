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
        <!--                   DIRECCION PARA ESTILOS DE DATA TABLE                  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <!-- --------------dataTable css------------- -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

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
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>USER NAME</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>DOCUMENTO</th>
                                <th>NACIMIENTO</th>
                                <th>CORREO</th>
                                <th>TELEFONO</th>
                                <th>ROL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $objCtrUsuario = new UsuarioController();
                                $listaUsuario = $objCtrUsuario->ctrConsultarUsuario();
                                foreach ($listaUsuario as $dato) {
                                    echo '
                                        <tr>
                                            <td><input type="radio" name="selectUser" id="selectDocument" class="filtro1" value="' . $dato['Documento'] . '"></td>
                                            <td>' . $dato['username'] . '</td>
                                            <td>' . $dato['Nombre'] . '</td>
                                            <td>' . $dato['Apellido'] . '</td>
                                            <td>' . $dato['Documento'] . '</td>
                                            <td>' . $dato['Fecha_N'] . '</td>
                                            <td>' . $dato['Telefono'] . '</td>
                                            <td>' . $dato['Correo'] . '</td>
                                            <td>' . $dato['Descripcion'] . '</td>

                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="conBtns">           <!-- MENU DE NAVEGACION -->
                <a href="registrarUsuario" class="btnprdt" title="Registrar producto"><b>REGISTRAR</b></a>
                <a href="                      " class="btnprdt" title="Inhabilitar producto"><b>INHABILITAR</b></a>
                <button type="button" onclick="eliminar(selectDocument)" class="btnprdt" title="Eliminar producto">ELIMINAR</button>
                <button type="button" onclick="editar(selectDocument)" class="btnprdt" title="Editar producto">EDITAR</button>
                <a href="prueba">pise aqui</a>
            </div>
        </form>
        <?php
            if (isset($_GET['documento'])) {
                $objCtrUsuario = new UsuarioController();
                $objCtrUsuario -> ctrEliminarUsuario($_GET['documento']);  
            }
        ?>
        <!-----------dataTable css--------- -->
        <script src="./view/js/menuUsuarios.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="cdn.datatables.net/plug-ins/1.12.1/i18n/es-CO.json"></script>
        <script>
            $(document).ready(function () {
            $('#example').DataTable();
            });
        </script>
    </body>
</html>