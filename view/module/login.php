<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> INV PRIV</title>
    <link rel="shortcut icon" href="view/img/LOGO INV.PRIV-03.png" type="image/x-icon">
    <!--                         DIRECCIONES DE BOOTSTRAP                         -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--                    DIRECCION PARA LOGOS EN CLOUDFLARE                    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!--                   DIRECCION PARA ESTILOS EN SWEETALERT2                  -->
    <link rel="stylesheet" href="view/css/sweetalert2.min.css">
    <script src="view/js/sweetalert2.all.min.js"></script>
    <!--                                ESTILOS CSS                               -->
    <link rel="stylesheet" href="view/css/FondoInterfazes.css">
    <link rel="stylesheet" href="view/css/login.css">
    
  </head>
  
  <body class="Interfaz-login">
    <div id="Boton-inicio">
      <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png" class="Icon-user"></img>
    </div>

    <!-----------------------------------------------------INICIO SESION----------------------------------------------------->
    <div id="Contenedor-login"> 
      <span class="close-btn">
        <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
      </span>

      <div>                              <!-- LOGO DE INV_PRIV -->
        <img src="view/img/LOGO INV.PRIV-03.png" alt="" id="Logo" class="Logo">
      </div>

      <form method="post" autocomplete="off" id="formulario">    
        <div>                            <!-- BARRA DESPLEGABLE -->
          <select name="txtRol" id="txtRol" class="btn btn-outline3" required>
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

        <div >                            <!-- CAMPOS DE TEXTO ID Y PASSWORD-->
          <div class="Contenedor-txt">
            <span class= "icono-user"><i class="fa-solid fa-user-shield"></i></span>
            <input type="text" name="txtUser" id="txtIdUser" class="Txt-login" required placeholder="Ingrese Username "> 
          </div>
          <div class="Contenedor-txt">
            <span class="icono-unlock"><i class="fa-solid fa-unlock"></i></span>
            <span class="inoco-ojo"><i class="far fa-eye-slash"></i></span>
            <input type="password" name="txtPass" id="txtLogin" class="Txt-login" required placeholder="Ingrese contraseña"> 
          </div>
        </div>

        <div>                            <!-- CHECKBOX RECORDAR CONTRASEÑA-->
          <label for="RecordarPassword" class="Recordar">
            <input type="checkbox" id="RecordarPassword" class="checkbox">
            Recordar contraseña
          </label>
        </div>

        <div>                            <!-- LINKS PARA RECUPERAR Y CAMBIAR CONTRASEÑA -->
          <span id="olvid-pass">¿Olvidaste tu contraseña?</span>
          <span id="Cambiar-pass">Cambiar contraseña</span>
        </div>

        <div class="boton_inicio">       <!-- BOTON DE INICIO DE SESION -->
          <input type="submit" value="INICIO SESIÓN" class="btn btn-outline1">
        </div>

      </form>
      <?php                              /* CAPTURA DE DATOS PARA VALIDAR */
        if (isset($_POST["txtUser"]) and $_POST["txtUser"] != NULL) {
          $user = $_POST["txtUser"];
          $pass = $_POST["txtPass"];
          $rol = $_POST["txtRol"];
          $objCon = new ConexionController();
          $objCon -> ctrLogin($user, $pass, $rol); 
        } 
      ?>
    </div>
    
    <!--------------------------------------------------RECORDAR CONTRASEÑA------------------------------------------------->
    <div id="Contenedor-recuperar">
      <h1 class= "titulo">¿DESEAS RECUPERAR TU CONTRASEÑA?</h1>

      <div class = "container">                <!--   CUERPO   -->
        <div class= "contTexto">             <!-- Contenedor de texto -->
          <P>INGRESA EL DOCUMENTO Y EL CORREO CON EL CUAL ESTA REGISTRADO PARA ENVIAR LA CONTRASEÑA ACTUAL AL CORREO.</P>
        </div>
        <form method="post">   
          <div class="cont-form">
            <div class = "contCampTxt">          <!-- Contenedor de campo de texto ID USUARIO -->
            <div>
              <span class= "icono-RC1"><i class="fa-solid fa-user-shield"></i></span>
              <input type="number" name="txtDocumento" id=""  class = "campTxt-recuperarPass" placeholder = "Ingrese Documento" required>
            </div>
              <span class= "icono-RC2"><i class="fa-solid fa-envelope"></i></span>
              <input type="email" name="txtCorreo" id="" class = "campTxt-recuperarPass" placeholder = "Ingrese E-MAIL" required>
            </div>
            <div class = "contBtn">              <!-- Contenedor de boton confirmar -->
              <input type="submit" value="VALIDAR" class = "BtnValida">
              <input type="button" value="CANCELAR" class = "BtnCancel" id="Btn-Cancel1">
            </div>
          </div>
        </form>  
      </div>
      <?php                              /* CAPTURA DE DATOS PARA VALIDAR */
        if (isset($_POST["txtDocumento"]) and $_POST["txtDocumento"] != NULL) {
          $objUsuario = new UsuarioController();
          $objUsuario -> validarDatos(
            $_POST["txtDocumento"],
            $_POST["txtCorreo"]
          ); 
        } 
      ?>
    </div>

    <!---------------------------------------------------CAMBIAR CONTRASEÑA-------------------------------------------------->
    <div id="Contenedor-cambiar">
      <h1 class ="titulo2">¿DESEAS CAMBIAR TU CONTRASEÑA?</h1>
      <form method="post" id="formCambiarPass">
        <div class = "container2">
          <div class = "contDts">                              <!-- CONTENEDOR DE DATOS DE USUARIO--> 
              <fieldset class = "al">
                <legend class ="titulos">DATOS DE USUARIO</legend>
                <div class = "conDato">
                  <label for="txtUserName" > 
                    <p class = "txtCamp">USER NAME:</p><br>
                    <span class= "icono-CC"><i class="fa-solid fa-user-shield"></i></span>
                    <input type="text" name="txtUserName" id="txtUserName" class = "campTxt2" required >
                  </label>    
                </div>
                <div class = "conDato">
                  <label for="txtPassOrg">
                    <p class = "txtCamp">CONTRASEÑA ACTUAL:</p><br>
                    <span class="icono-CC"><i class="fa-solid fa-unlock"></i></span>
                    <input type="password" name="txtPassOrg" id="txtPassOrg" class = "campTxt2" required>
                  </label>
                </div> 
              </fieldset>
          </div>     

          <div class = "contPassword">                         <!-- CONTENEDOR DE NUEVA CONTRASEÑA -->
              <fieldset class = "al">
                <legend class ="titulos">NUEVA CONTRASEÑA</legend>
                <div class="form-groun" id="grupoPassword">
                  <div class="negacion">
                    <label for="txtPass1">
                      <p class = "txtCamp">NUEVA CONTRASEÑA:</p><br>
                      <input type="password" name="txtPass1" id="txtPass1" class = "campTxt2" required>    
                    </label>
                    <span class="icono-CCN"><i class="icono fa-solid fa-unlock"></i></span>
                  </div>
                  <p class="error">El Password debe contener entre 4 a 20 carapteres</p>
                </div>

                <div class="form-groun" id="grupoPassword2">
                  <div class="negacion">
                    <label for="txtPass2">
                      <p class = "txtCamp">NUEVA CONTRASEÑA:</p><br>
                      <input type="password" name="txtPass2" id="txtPass2" class = "campTxt2" required>    
                    </label>
                    <span class="icono-CCN"><i class="icono fa-solid fa-unlock"></i></span>
                  </div>
                  <p class="error">Ambas contraseñas deben ser iguales</p>
                </div>
              </fieldset>
          </div>
        </div>
        <div class="cont-btn-CC">
          <div class = "conBtn1">                              <!-- CONTENEDOR DE BOTON CONFIRMAR -->
            <input type="submit" value="CONFIRMAR" class = "btnConfirmar">
          </div>

          <div class = "conBtn2">                              <!-- CONTENEDOR DE BOTON CANCELAR -->
            <input type="button" value="CANCELAR" class = "btnCancel" id="Btn-Cancel2">
          </div>
        </div>
      </form>
      <?php
        /* Si existe el Campo de texto txtpassorg-contraseña original  y este campo tiene un valor diferente a l Null 
        se debe comparar la contraseña uno con la dos si se cumple con la condicion se instancia la clase usuarioController y se ejecuta la funcion validar usuario finalmente son enviados los parametros */
        if(isset($_POST["txtPassOrg"]) and $_POST["txtPassOrg"] !=NULL){
          if($_POST["txtPass1"]== $_POST["txtPass2"]){
            $objUsuario = new UsuarioController();
            $objUsuario -> ctrValidarUsuario(
              $_POST["txtUserName"],
              $_POST["txtPassOrg"],
              $_POST["txtPass1"]
            );
          }
        }
      ?>
    </div>
    
    <!-----------------------------------------------------DIRECCIONES JS---------------------------------------------------->
      <script src="view/js/jquery-3.6.0.min.js"></script>
      <script src="view/js/TweenMax.min.js"></script>
      <script src="view/js/login.js"></script>
      <script src="view/js/validarCambarPass.js"></script>
      <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  </body>
</html>