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
                            <input type="radio" name="filtro" id="radioCodigo" class="filtro1">
                            ID USUARIO
                        </label>
                        <label for="radioNombre" class="shearchRadio">
                            <input type="radio" name="filtro" id="radioNombre" class="filtro2">
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
                        <tr>
                            <?php          /* CAPTURA DE DATOS PARA VALIDAR Y DEVOLVER UNA VISTA*/
                                if (isset($_POST["buscador1"]) and $_POST["buscador1"] != NULL) {
                                    $objCtrUsuario = new UsuarioController();
                                    $datos =  $objCtrUsuario -> ctrConsultarUsuario();
                                    ?>
                                    <td><?php echo $datos[0];?></td>
                                    <td><?php echo $datos[1];?></td>
                                    <td><?php echo $datos[2];?></td>
                                    <td><?php echo $datos[3];?></td>
                                    <td><?php echo $datos[4];?></td>
                                    <td><?php echo $datos[5];?></td>
                                    <td><?php echo $datos[6];?></td>
                                    <td><?php echo $datos[7];?></td>
                                    <?php
                                }else {
                                    echo "<script> 
                                        Swal.fire({
                                            icon: 'error',
                                            iconColor: 'red',
                                            title: 'ERROR AL BUSCAR USUARIO',
                                            text: 'EL USUARIO NO EXISTE',
                                            background: 'url(view/img/fondo_de_interfacez.png) no-repeat',
                                            confirmButtonText: 'ACEPTAR',
                                            confirmButtonColor: 'rgb(139, 248, 50)',
                                            timer: '7000',            //programar tiempo de visualizacion de la alerta
                                            timerProgressBar: 'true', //visualizar tiempo de la alerta
                                            showCloseButton: 'true',  //boton para cerrar alerta ubi (derecha superior)
                                            customClass: {
                                                popup: 'popup-class'
                                            }
                                        }) 
                                    </script>";
                                }
                            ?>
                        </tr>
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