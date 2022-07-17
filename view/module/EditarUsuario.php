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
            <form method="post">
                <?php
                    if (isset($_GET['documento'])) {
                        $objCtrUsuario = new UsuarioController();
                        $datosP = $objCtrUsuario -> ctrMostrarDatosPModificar($_GET['documento']);
                    }
                ?>
                <div class="ContUser">
                    <label for="" class= "txt">USERNAME:</label>
                    <input type="text" name="txtUserName" id="txtUserName" placeholder= "USERNAME" class ="campT ID" value="<?php echo $datosP[7]; ?>">
                    
                    <label for="" class= "txt">ROL:</label>
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
                <div class="ContData">
                    <div>
                        <label for="" class= "txt">NOMBRE:</label>
                        <input type="text" name="txtNombre" id="txtNombre" placeholder= "Ingrese nombre" class ="campT nombre" value= "<?php echo $datosP[1]; ?>">
                        
                        <label for="" class= "txt">APELLIDO:</label>
                        <input type="text" name="txtApellido" id="txtApellido" placeholder= "Ingrese apellido" class ="campT apellido" value="<?php echo $datosP[2]; ?>">
                        
                    </div>
                    <div>
                        <label for="" class= "txt">DOCUMENTO:</label>
                        <input type="number" name="txtDocumento" id="txtDocumento" placeholder= "Ingrese documento" class ="campT documento" readonly="true" disabled ="true" value = "<?php echo $datosP[0]; ?>">
                        
                        <label for="" class= "txt">NACIMIENTO:</label>
                        <input type="date" name="txtNacimiento" id="txtNacimiento" placeholder= "Ingrese fecha de nacimiento" class ="campT fechaNacimiento" value ="<?php echo $datosP[3]; ?>">
                    </div>
                    <div>
                        <label for="" class= "txt">TELEFONO:</label>
                        <input type="number" name="txtTelefono" id="txtTelefono" placeholder= "Ingrese telefono" class ="campT telefono" value="<?php echo $datosP[4]; ?>">
                        
                        <label for="" class= "txt">CORREO:</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" placeholder= "Ingrese correo" class ="campT correo" value="<?php echo $datosP[5]; ?>">
                    </div>
                    <div>
                        <label for="" class= "txt">CONTRASEÑA:</label>
                        <input type="password" name="txtPass1" id="txtPass1" class="campT password" placeholder="Ingrese contraseña" value="<?php echo $datosP[8]; ?>">
                        <label for="" class= "txt">CONTRASEÑA:</label>
                        <input type="password" name="txtPass2" id="txtPass2" class="campT password" placeholder="Ingrese nuevamente contraseña" value="<?php echo $datosP[8]; ?>">
                    </div>
                </div>
                <div class="contBtn">
                    <button type="button" class="btnGuardar" onclick="editarUsuario(txtUserName,txtRol,txtNombre,txtApellido,txtDocumento,txtNacimiento,txtTelefono,txtCorreo,txtPass1,txtPass2)">ACEPTAR</button>
                    <a href="admUsuario" class ="btnSalir">SALIR</a>
                </div>
            </form>
        </div>
        <?php  /* PROCEDIMIENTO PARA MODIFICAR USUARIO */
            if (isset($_GET["userName"]) and $_GET["userName"] != NULL) {
                if ($_GET["pass1"] == $_GET["pass2"]) {
                    $objCon = new UsuarioController();
                    $objCon -> ctrModificarUsuario(
                        $_GET["userName"],
                        $_GET["rol"],
                        $_GET["nombre"],
                        $_GET["apellido"],
                        $_GET["documento"],
                        $_GET["nacimiento"],
                        $_GET["telefono"],
                        $_GET["correo"],
                        $_GET["pass1"]
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
            <script src="./view/js/menuUsuarios.js"></script>
        </footer>
    </body>
</html>