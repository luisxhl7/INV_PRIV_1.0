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
            <form method="post" autocomplete="off">
                <div class="ContUser">
                    <label for="" class ="txt">USERNAME:</label>
                    <input type="text" name="userName" id="" placeholder= "Ingrese Username" class ="campT ID">
                    
                    <label for="" class ="txt">ROL:</label>
                    <select name="txtRol" id="" class="BarraRoles" required>
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
                <div class="ContData">
                    <div>
                        <label for="" class ="txt">NOMBRE:</label>
                        <input type="text" name="txtNombre" id="" placeholder= "Ingrese nombre" class ="campT nombre">
                        
                        <label for="" class ="txt">APELLIDO:</label>
                        <input type="text" name="txtApellido" id="" placeholder= "Ingrese apellido" class ="campT apellido">
                        
                    </div>
                    <div>
                        <label for="" class ="txt">DOCUMENTO:</label>
                        <input type="text" name="txtDocumento" id="" placeholder= "Ingrese documento" class ="campT documento">
                        
                        <label for="" class ="txt">NACIMIENTO:</label>
                        <input type="date" name="txtNacimiento" id="" placeholder= "Ingrese fecha de nacimiento" class ="campT fechaNacimiento">
                        <!--
                        <input type="text" name="txtNacimiento" id="" placeholder= "Ingrese fecha de nacimiento" class ="campT fechaNacimiento">
                        -->
                    </div>
                    <div>
                        <label for="" class ="txt">TELEFONO:</label>
                        <input type="text" name="txtTelefono" id="" placeholder= "Ingrese telefono" class ="campT telefono">
                        
                        <label for="" class ="txt">CORREO:</label>
                        <input type="text" name="txtCorreo" id="" placeholder= "Ingrese correo" class ="campT correo">
                    </div>
                    <div>
                        <label for="" class ="txt">CONTRASEÑA:</label>
                        <input type="password" name="txtPass" id="" class="campT password" placeholder="Ingrese contraseña">
                        <label for="" class ="txt">CONTRASEÑA:</label>
                        <input type="password" name="txtPass2" id="" class="campT password" placeholder="Ingrese nuevamente contraseña">
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
                        $_POST["userName"],
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
                echo"las contraseñas son diferentes";
                }

            }
        ?>
    </body>
</html>