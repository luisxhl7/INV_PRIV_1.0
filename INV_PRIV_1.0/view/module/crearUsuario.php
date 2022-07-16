<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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
                    <label for="" class ="txt">ID:</label>
                    <input type="text" name="" id="" placeholder= "ID USUARIO" class ="campT ID">
                    
                    <label for="" class ="txt">ROL:</label>
                    <select name="txtRol" id="" class="BarraRoles">
                        <option value="">Seleccione Rol</option>
                        <option value="Administrador">ADMINISTRADOR</option>
                        <option value="Usuario">USUARIO</option>
                        <option value="Invitado">INVITADO</option>
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
                        <input type="text" name="txtNacimiento" id="" placeholder= "Ingrese fecha de nacimiento" class ="campT fechaNacimiento">
                    </div>
                    <div>
                        <label for="" class ="txt">TELEFONO:</label>
                        <input type="text" name="txtTelefono" id="" placeholder= "Ingrese telefono" class ="campT telefono">
                        
                        <label for="" class ="txt">CORREO:</label>
                        <input type="text" name="txtCorreo" id="" placeholder= "Ingrese correo" class ="campT correo">
                    </div>
                    <div>
                        <label for="" class ="txt">CONTRASEÑA:</label>
                        <input type="password" name="txtpass" id="" class="campT password" placeholder="Ingrese contraseña">
                        <label for="" class ="txt">CONTRASEÑA:</label>
                        <input type="password" name="txtpass2" id="" class="campT password" placeholder="Ingrese nuevamente contraseña">
                    </div>
                </div>
                <div class="contBtn">
                    <input type="submit" value="GUARDAR" class="btnGuardar">
                </div>
            </form>
        </div>
        <?php                              /* CAPTURA DE DATOS PARA VALIDAR */
            if (isset($_POST["txtNombre"]) and $_POST["txtNombre"] != NULL) {
                $objCon = new UsuarioController();
                $objCon -> ctrCrearUsuario(
                    $_POST["txtRol"],
                    $_POST["txtNombre"],
                    $_POST["txtApellido"],
                    $_POST["txtDocumento"],
                    $_POST["txtNacimiento"],
                    $_POST["txtTelefono"],
                    $_POST["txtCorreo"],
                    $_POST["txtpass"]
                );
            }
        ?>
    </body>
</html>