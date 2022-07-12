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
        <!--                             DIRECCIONES CSS                              -->
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/EstiloUsuario.css">
    </head>
    <body class="interfazGeneral">
        <form method="post">
            <div>                       <!-- TABLA DE USUARIOS -->
                <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="selector"></th>
                            <th>USER NAME</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>DOCUMENTO</th>
                            <th>NACIMIENTO</th>
                            <th>TELEFONO</th>
                            <th>CORREO</th>
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
                                        <td class="selector"><input type="radio" name="selectUser" id="selectDocument" class="filtro1" value="' . $dato['Documento'] . '"></td>
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

            <div class="conBtns">           <!-- MENU DE NAVEGACION -->
                <a href="registrarUsuario" class="btnprdt" title="Registrar producto"><b>REGISTRAR</b></a>
                <button type="button" class="btnprdt2" title="Inhabilitar producto">INHABILITAR</button>
                <button type="button" onclick="eliminar(selectDocument)" class="btnprdt2" title="Eliminar producto">ELIMINAR</button>
                <button type="button" onclick="editar(selectDocument)" class="btnprdt2" title="Editar producto">EDITAR</button>
            </div>
        </form>

        <?php  /*PROCEDIMIENTOO PARA ELIMINAR USUARIO */
            if (isset($_GET['documento'])) {
                $objCtrUsuario = new UsuarioController();
                $objCtrUsuario -> ctrEliminarUsuario($_GET['documento']);  
            }
        ?>

        <!-----------DIRECCIONES DE JS--------- -->
            <script src="./view/js/menuUsuarios.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
            <script src="cdn.datatables.net/plug-ins/1.12.1/i18n/in-CO.json"></script>
            <script>
                $(document).ready(function () {
                $('#tabla').DataTable();
                });
                $('#tabla').DataTable( {
                    language: {
                        search: "BUSCADOR:"
                    }
                } );
            </script>
    </body>
</html>