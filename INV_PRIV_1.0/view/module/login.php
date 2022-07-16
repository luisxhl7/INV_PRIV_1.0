<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> INV PRIV</title>
    <link rel="icono-de-la-pagina" type="image/png" href="view/img/LOGO INV.PRIV-03.png">
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
            <option value="Administrador"> Administrador </option>
            <option value="Usuario"> Usuario </option>
            <option value="Invitado"> Invitado </option>
          </select>
        </div>

        <div >                            <!-- CAMPOS DE TEXTO ID Y PASSWORD-->
          <div class="Contenedor-txt">
            <span class= "icono-user"><i class="fa-solid fa-user-shield"></i></span>
            <input type="text" name="txtUser" id="txtIdUser" class="Txt-login" required placeholder="Ingrese ID "> 
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
    
    <!--------------------------------------------------RECUPERAR CONTRASEÑA------------------------------------------------->
    <div id="Contenedor-recuperar">
      <h1 class= "titulo">¿DESEAS RECUPERAR TU CONTRASEÑA?</h1>
      <div class = "container">                <!--   CUERPO   -->
        <form action="">   
          <div class= "contTexto">             <!-- Contenedor de texto -->
            <P>INGRESA EL ID DE USUARIO Y EL CORREO CON EL CUAL ESTA REGISTRADO PARA ENVIAR LA CONTRASEÑA ACTUAL AL CORREO.</P>
          </div>
          <div class = "contCampTxt">          <!-- Contenedor de campo de texto ID USUARIO -->
          <span class= "icono-RC"><i class="fa-solid fa-user-shield"></i></span>
            <input type="text" name="" id=""  class = "campTxt" placeholder = "Ingrese ID de usuario">
          </div>
          <div class = "contCampTxt">          <!-- Contenedor de campo de texto E-MAIL -->
          <span class= "icono-RC"><i class="fa-solid fa-envelope"></i></span>
            <input type="text" name="" id="" class = "campTxt" placeholder = "Ingrese E-MAIL">
          </div>
          <div class = "contBtn">              <!-- Contenedor de boton confirmar -->
            <input type="button" value="VALIDAR" class = "BtnValida">
          </div>
          <div class = "contBtn">              <!-- Contenedor de boton cancelar -->
              <input type="button" value="CANCELAR" class = "BtnCancel" id="Btn-Cancel1">
          </div>
        </form>
      </div>
    </div>

    <!---------------------------------------------------CAMBIAR CONTRASEÑA-------------------------------------------------->
    <div id="Contenedor-cambiar">
      <h1 class ="titulo2">¿DESEAS CAMBIAR TU CONTRASEÑA?</h1>
      <div class = "container2">
        <form action="">
          <div class = "contDts">                              <!-- CONTENEDOR DE DATOS DE USUARIO--> 
            <fieldset class = "al">
              <legend class ="titulos">DATOS DE USUARIO</legend>
              <div class = "conDato">
                <label for="" > 
                  <p class = "txtCamp">ID DE USUARIO:</p><br>
                  <span class= "icono-CC"><i class="fa-solid fa-user-shield"></i></span>
                  <input type="text" name="idUser" id="" class = "campTxt2">
                </label>    
              </div>
              <div class = "conDato">
                <label for="contrasenaAct">
                  <p class = "txtCamp">CONTRASEÑA ACTUAL:</p><br>
                  <span class="icono-CC"><i class="fa-solid fa-unlock"></i></span>
                  <input type="password" name="passOrg" id="contrasenaAct" class = "campTxt2">
                </label>
              </div> 
            </fieldset>
          </div>     

          <div class = "contPassword">                         <!-- CONTENEDOR DE NUEVA CONTRASEÑA -->
            <fieldset class = "al">
              <legend class ="titulos">NUEVA CONTRASEÑA</legend>
              <div class = "conDato">
                <label for="">
                  <p class = "txtCamp">NUEVA CONTRASEÑA:</p><br>
                  <span class="icono-CC"><i class="fa-solid fa-unlock"></i></span>
                  <input type="password" name="pass1" id="" class = "campTxt2">    
                </label>
              </div>
              <div class = "conDato">
                <label for="">
                  <p class = "txtCamp">NUEVA CONTRASEÑA:</p><br>
                  <span class="icono-CC"><i class="fa-solid fa-unlock"></i></span>
                  <input type="password" name="pass2" id="" class = "campTxt2">
                </label>
              </div> 
            </fieldset>
          </div>
          
          <div class = "conBtn1">                              <!-- CONTENEDOR DE BOTON CONFIRMAR -->
            <input type="submit" value="CONFIRMAR" class = "btnConfirmar">
          </div>
          <div class = "conBtn2">                              <!-- CONTENEDOR DE BOTON CANCELAR -->
            <input type="button" value="CANCELAR" class = "btnCancel" id="Btn-Cancel2">
          </div>
        </form>
      </div>

      <?php
      /*
        if(isset($_POST["idUser"]) and $_POST["idUser"] != NULL){
          $id = $_POST["idUser"]
          $passOrg = $_POST["passOrg"]
          $pass1 = $_POST["pass1"]
          $pass2 = $_POST["pass2"]
          if ($pass1 == $pass2) {
            $objCon = new UsuarioController();
            $objCon -> cambiarPass($idUser, $passOrg, $pass1); 
          }else{
            echo("las contraseñas nuevas no son iguales")
          }

        }
        */
      ?>
    </div>
    
    <!-----------------------------------------------------DIRECCIONES JS---------------------------------------------------->
      <script src="view/js/jquery-3.6.0.min.js"></script>
      <script src="view/js/TweenMax.min.js"></script>
      <script src="view/js/login.js"></script>
    
  </body>
</html>