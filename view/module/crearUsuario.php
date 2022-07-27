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
                <h1>REGISTRAR  USUARIO</h1>
            </div>
            <form method="post" autocomplete="off" name="formulario" id="formulario">
                <div class="ContUser">
                    <div class="form-groun" id="grupoUserName">
                        <div class="negacion">
                            <label for="txtUserName" class="txt">USERNAME:</label>
                            <input type="text" name="txtUserName" id="txtUserName" placeholder= "Ingrese Username" class ="campT ID" required>
                            <i class="iconoDeError fas fa-times-circle"></i>
                            
                        </div>
                        <p class="error">El Username debe contener de 4 a 20 carapteres</p>
                    </div>
                    <div class="form-groun" id="grupoRol">
                        <div class="posicion-rol">
                            <label for="txtRol" class ="txt">ROL:</label>
                            <select name="txtRol" id="txtRol" class="BarraRoles" required>
                                <option value=""> Seleccione Rol </option>
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
                                <label for="txtNombre" class ="txt">NOMBRE:</label>
                                <input type="text" name="txtNombre" id="txtNombre" placeholder= "Ingrese nombre" class ="campT nombre" required>
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">El nombre solo puede contener letras y espacios</p>
                        </div>

                        <div class="form-groun" id="grupoDocumento">
                            <div class="negacion">
                                <label for="txtDocumento" class ="txt">DOCUMENTO:</label>
                                <input type="text" name="txtDocumento" id="txtDocumento" placeholder= "Ingrese documento" class ="campT documento" required>
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">El documento debe contener de 4 a 50 carapteres</p>
                        </div>
                        <div class="form-groun" id="grupoTelefono">
                            <div class="negacion">
                                <label for="txtTelefono" class ="txt">TELEFONO:</label>
                                <input type="text" name="txtTelefono" id="txtTelefono" placeholder= "Ingrese telefono" class ="campT telefono" required>
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">solo puede contener numeros de 8 a 10 digitos</p>
                        </div>
                        <div class="form-groun" id="grupoPassword">
                            <div class="negacion">
                            <label for="txtPass" class ="txt">CONTRASEÑA:</label>
                            <input type="password" name="txtPass" id="txtPass" class="campT password" placeholder="Ingrese contraseña" required>
                            <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">Ambas contraseñas deben ser iguales</p>
                        </div>
                    </div>

                    <div>
                        <div class="form-groun" id="grupoApellido">
                            <div class="negacion">
                                <label for="txtApellido" class ="txt">APELLIDO:</label>
                                <input type="text" name="txtApellido" id="txtApellido" placeholder= "Ingrese apellido" class ="campT apellido" required>
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">El apellido solo puede contener letras y espacios</p>
                        </div>
                        <div class="form-groun" id="grupoNacimiento">
                            <div class="negacion">
                                <label for="txtNacimiento" class ="txt">NACIMIENTO:</label>
                                <input type="date" name="txtNacimiento" id="txtNacimiento" placeholder= "Ingrese fecha de nacimiento" class ="campT fechaNacimiento" required>
                                <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">datos malos</p>
                        </div>
                        <div class="form-groun" id="grupoCorreo">
                            <div class="negacion">
                            <label for="txtCorreo" class ="txt">CORREO:</label>
                            <input type="text" name="txtCorreo" id="txtCorreo" placeholder= "Ingrese correo" class ="campT correo" required>
                            <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">Correo invalido</p>
                        </div>
                        <div class="form-groun" id="grupoPassword2">
                            <div class="negacion">
                            <label for="txtPass2" class ="txt">CONTRASEÑA:</label>
                            <input type="password" name="txtPass2" id="txtPass2" class="campT password" placeholder="Repetir contraseña" required>
                            <i class="iconoDeError fas fa-times-circle"></i>
                            </div>
                            <p class="error">Ambas contraseñas deben ser iguales</p>
                        </div>
                    </div>
                </div>
                <div class="contBtn">
                    <input type="submit" value="GUARDAR" class="btnGuardar">
                    <a href="admUsuario" class ="btnSalir">SALIR</a>
                </div>
            </form>
        </div>
        <?php                              /* CAPTURA DE DATOS PARA VALIDAR */
            if (isset($_POST["txtNombre"]) and $_POST["txtNombre"] != NULL) {
                if ($_POST["txtPass"] == $_POST["txtPass2"]) {
                    $objCon = new UsuarioController();
                    $objCon -> ctrCrearUsuario(
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
        <script src="view/js/menuUsuarios.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    </body>
</html>