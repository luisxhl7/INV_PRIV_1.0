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
                    <input type="text" name="txtUserName" id="" placeholder= "USERNAME" class ="campT ID" value="<?php echo $datosP[7]; ?>">
                    
                    <label for="" class= "txt">ROL:</label>
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
                        <label for="" class= "txt">NOMBRE:</label>
                        <input type="text" name="txtNombre" id="" placeholder= "Ingrese nombre" class ="campT nombre" value= "<?php echo $datosP[1]; ?>">
                        
                        <label for="" class= "txt">APELLIDO:</label>
                        <input type="text" name="txtApellido" id="" placeholder= "Ingrese apellido" class ="campT apellido" value="<?php echo $datosP[2]; ?>">
                        
                    </div>
                    <div>
                        <label for="" class= "txt">DOCUMENTO:</label>
                        <input type="number" name="txtDocumento" id="" placeholder= "Ingrese documento" class ="campT documento" value = "<?php echo $datosP[0]; ?>">
                        
                        <label for="" class= "txt">NACIMIENTO:</label>
                        <input type="date" name="txtNacimiento" id="" placeholder= "Ingrese fecha de nacimiento" class ="campT fechaNacimiento" value ="<?php echo $datosP[3]; ?>">
                    </div>
                    <div>
                        <label for="" class= "txt">TELEFONO:</label>
                        <input type="number" name="txtTelefono" id="" placeholder= "Ingrese telefono" class ="campT telefono" value="<?php echo $datosP[4]; ?>">
                        
                        <label for="" class= "txt">CORREO:</label>
                        <input type="email" name="txtCorreo" id="" placeholder= "Ingrese correo" class ="campT correo" value="<?php echo $datosP[5]; ?>">
                    </div>
                    <div>
                        <label for="" class= "txt">CONTRASEÑA:</label>
                        <input type="password" name="txtPass1" id="" class="campT password" placeholder="Ingrese contraseña" value="<?php echo $datosP[8]; ?>">
                        <label for="" class= "txt">CONTRASEÑA:</label>
                        <input type="password" name="txtPass2" id="" class="campT password" placeholder="Ingrese nuevamente contraseña" value="<?php echo $datosP[8]; ?>">
                    </div>
                </div>
                <div class="contBtn">
                    <input type="submit" value="GUARDAR" class="btnGuardar">
                </div>
            </form>
        </div>
        <?php
            if (isset($_POST["txtDocumento"]) and $_POST["txtDocumento"] != NULL) {
                if ($_POST["txtPass1"] == $_POST["txtPass2"]) {
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
                        $_POST["txtPass1"]
                    );
                }else{
                    echo"las contraseñas son diferentes";
                }

            }
        ?>

    </body>
</html>