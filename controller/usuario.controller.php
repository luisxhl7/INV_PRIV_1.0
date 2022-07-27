<?php
    class UsuarioController{
        public function ctrCrearUsuario($userName,$rol,$nombre,$apellido,$documento,$nacimiento,$telefono,$correo,$pass){ #Controlador de crear usuario
            try {
                //objeto DTO
                $objDtoUsuario = new Usuario();
                $objDtoUsuario->setUserName($userName);
                $objDtoUsuario->setRol($rol);
                $objDtoUsuario->setNombre($nombre);
                $objDtoUsuario->setApellido($apellido);
                $objDtoUsuario->setDocumento($documento);
                $objDtoUsuario->setNacimiento($nacimiento);  
                $objDtoUsuario->setTelefono($telefono);
                $objDtoUsuario->setCorreo($correo);
                $objDtoUsuario->setPass($pass);

                //objeto DAO 
                $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );  // <----------- error aqui
                if ($objDaoUsuario -> mdlCrearUsuario() == true) {
                    echo "<script> 
                        Swal.fire({
                            icon: 'success',
                            iconColor: 'green',
                            title: 'EXITO AL REGISTRAR',
                            text: 'SI SE PUDO HP :P.',
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
                }else {
                    echo "<script> 
                        Swal.fire({
                            icon: 'error',
                            iconColor: 'red',
                            title: 'ERROR AL GUARDAR',
                            text: 'NO SE PUDO HP :P.',
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
            } catch (Exception $e) {
                echo "Error en el controlador insertar: ".$e->getMessage();
            }
        }

        public function ctrConsultarUsuario(){ #Controlador de consultar usuario
            $lista = false;
            try {
                $objDtoUsuario = new Usuario();
                $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );
                $lista = $objDaoUsuario -> mdlConsultarUsuario() -> fetchAll();

            } catch (PDOException $e) {
                echo "error en consultar usuario" . $e -> getMessage();
            }
            return $lista;
        }

        public function ctrMostrarRol(){ #Controlador de mostrar usuario
            $lista = false;
            try {
                $objDtoUsuario = new Usuario();
                $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );
                $lista = $objDaoUsuario -> mdlMostrarRol() -> fetchAll();

            } catch (PDOException $e) {
                echo "error al mostrar los Roles de usuarios" . $e -> getMessage();
            }
            return $lista;
        }

        public function ctrEliminarUsuario($documento){  #Controlador de eliminar usuario
            $objDtoUsuario = new Usuario();
            $objDtoUsuario->setDocumento($documento);

            $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
            if ($objDaoUsuario -> mdlEliminarUsuario() == true) {
                echo"
                    <script>
                        Swal.fire({
                            title: 'Eliminado',
                            text: 'A partir de ahora este usuario ya no podre utilizar el aplicativo.',
                            icon: 'success',
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
                    </script>
                ";
            }

        }

        public function ctrMostrarDatosPModificar($documento){ #Controlador de mostrar datos de usuario en la vista de editar usuario
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario->setDocumento($documento);
    
                $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
                $lista1 = $objDaoUsuario -> mdlMostrarDatosPModificar() -> fetchAll();
                
                $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
                $lista2 = $objDaoUsuario -> mdlMostrarDatosUModificar() -> fetchAll();

            } catch (\Throwable $th) {
                echo"fallo la vizualisacion de los datos del usuario";
            }
            foreach($lista1 as $datos){
                $datosP[0] = ''.$datos['Documento'].'';
                $datosP[1] = ''.$datos['Nombre'].'';
                $datosP[2] = ''.$datos['Apellido'].'';
                $datosP[3] = ''.$datos['Fecha_N'].'';
                $datosP[4] = ''.$datos['Telefono'].'';
                $datosP[5] = ''.$datos['Correo'].'';
            }
            foreach($lista2 as $datos){
                $datosP[6] = ''.$datos['Id_Usuario'].'';
                $datosP[7] = ''.$datos['username'].'';
                $datosP[8] = ''.$datos['Contrasena'].'';
                $datosP[9] = ''.$datos['Fk_Cod_Rol'].'';

            }
            return $datosP;
        }

        public function ctrModificarUsuario($userName,$rol,$nombre,$apellido,$documento,$nacimiento,$telefono,$correo,$pass){ #Controlador de modificar usuario
            try {
                //objeto DTO
                $objDtoUsuario = new Usuario();
                $objDtoUsuario->setUserName($userName);
                $objDtoUsuario->setRol($rol);
                $objDtoUsuario->setNombre($nombre);
                $objDtoUsuario->setApellido($apellido);
                $objDtoUsuario->setDocumento($documento);
                $objDtoUsuario->setNacimiento($nacimiento);  
                $objDtoUsuario->setTelefono($telefono);
                $objDtoUsuario->setCorreo($correo);
                $objDtoUsuario->setPass($pass);

                //objeto DAO 
                $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );  // <----------- error aqui
                if ($objDaoUsuario -> mdlModificarUsuario() == true) {
                    echo"
                        <script>
                            Swal.fire({
                                title: 'EXTIO',
                                text: 'SU USUARIO A SIDO MODIFICADO CON EXITO',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'CONFIRMAR'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location='admUsuario';
                                }else{
                                    window.location='admUsuario';
                                }
                            })
                        </script>
                    ";
                }
            } catch (Exception $e) {
                echo "Error en el controlador insertar: ".$e->getMessage();
            }
        }
        
        public function ctrValidarUsuario($userName,$pass,$newpass){
            /* Se crea  la funcion Validar Usuario, Se le asignan las variables, se instancia la clase usuario y se hace el procedimiento
            Se hace la validacion de usuario y se llama al modeloUsuario  */   
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario->setUserName($userName);
                $objDtoUsuario->setPass($pass);
                $objValidarUser = new ModeloUsuario($objDtoUsuario);
                $rest = $objValidarUser -> mdlValidarUser() -> fetch();
                
                if (gettype($rest) != "boolean") {
                    $objDtoUsuario = new Usuario();
                    $objDtoUsuario->setUserName($userName);
                    $objDtoUsuario->setPass($newpass);
                    $objCambiarPass = new ModeloUsuario($objDtoUsuario);
                    if ( $objCambiarPass -> mdlCambiarPass() == true) {
                        echo "<script>alert('Existo en el cambio de contraseña')</script>";
                    }
                    
                }else{
                    echo "<script>alert('El usuario no existe')</script>";
                }
                
            } catch (\Throwable $th) {
                echo "<script>alert('no funciona el controlador')</script>";
            }
            
        }

        public function validarDatos($Documento,$Correo){
       
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario->setDocumento($Documento);
                $objDtoUsuario->setCorreo($Correo);
               
                $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );
                $rest = $objDaoUsuario -> mdlValidarEmail() -> fetch();
    
                if (gettype($rest) != "boolean") {
                    
                        $mailSend = new clsMail();
                        $objPass = new ModeloUsuario($objDtoUsuario);
                        $lista1= $objPass->mdlMostrarDatosUModificar()->fetchAll();
                        $lista2 = $objPass->mdlMostrarDatosPModificar()->fetchAll();

                        foreach($lista1 as $dato){
                            $datoP[0] = ''.$dato['Contrasena'].'';
                        }

                        foreach($lista2 as $dato){
                            $datoP[1] = ''.$dato['Nombre'].'';
                            $datoP[2] = ''.$dato['Apellido'].'';
                        }
                        
                        $titulo ="INV_PRIV";
                        $asunto ="Recordar Contraseña";  
                        
                        $bodyHTML = '
                            <h1>
                               <em> INV_PRIV </em>
                            </h1>
                            <hr>
                                <h2>
                                    Hola, 
                                 </h2>
                                 <h2>
                                    <b> Sñr@, '.$datoP[1].' '.$datoP[2].'</b>, 
                                 <h2> 
                                    Haz olvidado la contraseña,<i> ¡No te preocupes!</i>,
                                 </h2>
                                </h2>
                                 <h2> 
                                    A continuación te la recordamos.
                                </h2>
                            <br>
                            <h2>CONTRASEÑA: <b>( '.$datoP[0].' )</b></h2>
                            <br>
                            <hr>
                            <mark>
                                <h2>
                                    Gracias,
                                </h2>
                                <h2>
                                    El equipo de INV_PRIV
                                </h2>
                            </mark>';
    
                        $enviado = $mailSend->metEnviar($titulo,$Correo,$asunto,$bodyHTML);
    
                        if($enviado){
                            echo "<script>alert('Enviado');</script>";
                        }else{
                            echo "<script>alert('No se envió correo');</script>";
                        }       
                    
                }else{
                    echo "<script>alert('Correo y usuario no coinciden');</script>"; 
                }
    
            } catch (PDOException $e) {
                echo "error al validar datos" . $e -> getMessage();
            } 
            
        }
    }
    
?>