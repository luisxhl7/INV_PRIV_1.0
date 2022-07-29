<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
        <title>INV PRIV</title>
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/EstiloUsuario.css">
        <!--                   DIRECCION PARA ESTILOS EN SWEETALERT2                  -->
        <link rel="stylesheet" href="view/css/sweetalert2.min.css">
        <script src="view/js/sweetalert2.all.min.js"></script>
    </head>
    
    <body class="interfazGeneral">
        <div class ="ContForm">
            <div class="titulo">
                <h1>EDITAR  USUARIO</h1>
            </div>
            <form method="post" autocomplete="off" name="formulario" id="formulario">
                <?php
                    if (isset($_POST["selectUser"])) {
                        $objCtrUsuario = new UsuarioController();
                        $datosP = $objCtrUsuario -> ctrMostrarDatosPModificar($_POST["selectUser"]);
                    }else{
                        echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'debe seleccionar un Usuario para poder modificarlo',
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'CONFIRMAR'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location='admUsuario';
                                }else{
                                    window.location='admUsuario';
                                }
                            })
                        </script>";
                    }
                ?>
                <div class="ContUser">
                    <div class="form-groun" id="grupoUserName">
                        <div class="negacion">
                            <label for="txtUserName" class= "txt">USERNAME:</label>
                            <input type="text" name="txtUserName" id="txtUserName" placeholder= "USERNAME" class ="campT ID" value="<?php echo $datosP[7]; ?>">
                            <i class="iconoDeError fas fa-times-circle"></i>
                        </div>
                        <p class="error">El Username debe contener de 4 a 20 carapteres</p>
                    </div>
                    <div class="form-groun" id="grupoRol">
                        <div class="posicion-rol">
                            <label for="txtRol" class= "txt">ROL:</label>
                            <select name="txtRol" id="txtRol" class="BarraRoles" required>
                                <option value="<?php echo $datosP[9]; ?>"> Predeterminado </option>
                                <?php
                                    $objCtrUsuario = new UsuarioController();
                                    $listaUsuario = $objCtrUsuario -> ctrMostrarRol();  
                                    foreach($listaUsuario as $dato){
                                        echo'<option value="'.$dato["Cod_Rol"].'"> '.$dato["Descripcion"].' </option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="ContData">
                    <div>
                        <div class="form-groun" id="grupoNombre">
                            <div class="negacion">
                                <label for="txtNombre" class= "txt">NOMBRE:</label>
                                <input type="text" name="txtNombre" id="txtNombre" placeholder= "Ingrese nombre" class ="campT nombre" value= "<?php echo $datosP[1]; ?>">
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">El nombre solo puede contener letras y espacios</p>
                        </div>
                        <div class="form-groun" id="grupoDocumento">
                            <div class="negacion">
                                <label for="txtDocumento" class= "txt">DOCUMENTO:</label>
                                <input type="text" placeholder= "Ingrese documento" class ="campT documento" readonly="true"  disabled="true" value = "<?php echo $datosP[0]; ?>">
                                <input type="text" name="txtDocumento" id="txtDocumento"value = "<?php echo $datosP[0]; ?>" style="display: none;">
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">El documento debe contener de 4 a 50 carapteres</p>
                        </div>
                        <div class="form-groun" id="grupoTelefono">
                            <div class="negacion">
                                <label for="txtTelefono" class= "txt">TELEFONO:</label>
                                <input type="text" name="txtTelefono" id="txtTelefono" placeholder= "Ingrese telefono" class ="campT telefono" value="<?php echo $datosP[4]; ?>">
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">solo puede contener numeros de 8 a 10 digitos</p>
                        </div>
                        <div class="form-groun" id="grupoPassword">
                            <div class="negacion">
                                <label for="txtPass" class= "txt">CONTRASEÑA:</label>
                                <input type="password" name="txtPass" id="txtPass" class="campT password" placeholder="Ingrese contraseña" value="<?php echo $datosP[8]; ?>">
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">Ambas contraseñas deben ser iguales</p>
                        </div>
                    </div>
                    <div>
                        <div class="form-groun" id="grupoApellido">
                            <div class="negacion">
                                <label for="txtApellido" class= "txt">APELLIDO:</label>
                                <input type="text" name="txtApellido" id="txtApellido" placeholder= "Ingrese apellido" class ="campT apellido" value="<?php echo $datosP[2]; ?>">
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">El apellido solo puede contener letras y espacios</p>
                        </div>
                        <div class="form-groun" id="grupoNacimiento">
                            <div class="negacion">
                                <label for="txtNacimiento" class= "txt">NACIMIENTO:</label>
                                <input type="date" name="txtNacimiento" id="txtNacimiento" placeholder= "Ingrese fecha de nacimiento" class ="campT fechaNacimiento" value ="<?php echo $datosP[3]; ?>">
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">datos malos</p>
                        </div>
                        <div class="form-groun" id="grupoCorreo">
                            <div class="negacion">
                                <label for="txtCorreo" class= "txt">CORREO:</label>
                                <input type="email" name="txtCorreo" id="txtCorreo" placeholder= "Ingrese correo" class ="campT correo" value="<?php echo $datosP[5]; ?>">
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">Correo invalido</p>
                        </div>
                        <div class="form-groun" id="grupoPassword2">
                            <div class="negacion">
                                <label for="txtPass2" class= "txt">CONTRASEÑA:</label>
                                <input type="password" name="txtPass2" id="txtPass2" class="campT password" placeholder="Ingrese nuevamente contraseña" value="<?php echo $datosP[8]; ?>">
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">Ambas contraseñas deben ser iguales</p>
                        </div>
                    </div>
                </div>
                <div class="contBtn">
                    <input type="submit" class="btnGuardar" value="ACEPTAR">
                    <a href="admUsuario" class ="btnSalir">SALIR</a>
                </div>
            </form>
        </div>
        <?php  /* PROCEDIMIENTO PARA MODIFICAR USUARIO */
            if (isset($_POST["txtUserName"]) and $_POST["txtUserName"] != NULL) {
                if ($_POST["txtPass"] == $_POST["txtPass2"]) {
                    $objCon = new UsuarioController();
                    $objCon -> ctrModificarUsuario(
                        $_POST["txtUserName"],
                        $_POST["txtRol"],
                        $_POST["txtNombre"],
                        $_POST["txtApellido"],
                        $_POST["txtDocumento"],
                        $_POST["txtNacimiento"],
                        $_POST["txtTelefono"],
                        $_POST["txtCorreo"],
                        $_POST["txtPass"]
                    );
                }else{
                    /*Crer una alerta  */
                    echo"
                        <script>
                            Swal.fire({
                                position: 'top-end',
                                icon: 'warning',
                                title: 'las contraseñas no son iguales',
                                showConfirmButton: false,
                                timer: 1500
                            })    
                        </script>
                    ";                
                }
            }
        ?>

        <footer>
            <script src="./view/js/validarFormEditarUsuario.js"></script>
            <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
        </footer>
    </body>
</html>