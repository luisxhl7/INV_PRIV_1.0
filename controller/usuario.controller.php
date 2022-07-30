<?php
    class UsuarioController{
        public function ctrCrearUsuario($userName,$rol,$nombre,$apellido,$documento,$nacimiento,$telefono,$correo,$pass){ #Controlador de crear usuario
            /*==========DOCUMENTACION================
                una vez capturados todos los datos de la vista se crea un objeto DTO y a su vez se instancia la clase de Usuario para
                capturar todos los parametros en este objeto
                luego se crea un objeto DAO en el cual se instancia ModeloUsuario y se le envia un solo parametro el cual es el objeto DTO
                que contiene todos los parametros capturados previamente
                luego se ejecuta la funcion del modelo llamada mdlCrearUsuario, en caso de que este retornado un estado de true
                le enseñara al usuario una notificacion de exito en el procedimiento, de ser lo opuesto una notificacion de error
            =======================================*/
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
                            title: 'EXITO',
                            text: 'El usuario a sido registrado con exito',
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
                            title: 'ERROR',
                            text: 'El usuario no se registro con exito',
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
            } catch (PDOException $e) {
                echo "Error en controlador ctrCrearUsuario ".$e->getMessage();
            }

        }//fin de la funcion ctrCrearUsuario

        public function ctrConsultarUsuario(){ #Controlador de consultar usuario
            /*=================DOCUMENTACION================== 
                se crea una variable llamada lista con un estado false luego se crea un objeto DTO y se instancia la clase Usuario
                luego se crea un objeto DAO y se instancia la clase ModeloUsuario y se captura el DTO
                luego se utiliza la variable lista para capturar los datos que se retornaran en la funcion mdlConsultarUsuario
                en caso de que si existan datos los captura en un arreglo y los retorna, de lo contrario conservara el estado de false 
                y lo retornara
            ================================================*/
            $lista = false;
            try {
                $objDtoUsuario = new Usuario();
                $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );
                $lista = $objDaoUsuario -> mdlConsultarUsuario() -> fetchAll();

            } catch (PDOException $e) {
                echo "error en consultar usuario" . $e -> getMessage();
            }
            return $lista;

        }//fin de la funcion ctrConsultarUsuario

        public function ctrMostrarRol(){ #Controlador de mostrar usuario
            /*=================DOCUMENTACION================== 
                se crea una variable llamada lista con un estado false luego se crea un objeto DTO y se instancia la clase Usuario
                luego se crea un objeto DAO y se instancia la clase ModeloUsuario y se captura el DTO
                luego se utiliza la variable lista para capturar los datos que se retornaran en la funcion mdlMostrarRol
                en caso de que si existan datos los captura en un arreglo y los retorna, de lo contrario conservara el estado de false 
                y lo retornara
            ================================================*/
            $lista = false;
            try {
                $objDtoUsuario = new Usuario();
                $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );
                $lista = $objDaoUsuario -> mdlMostrarRol() -> fetchAll();

            } catch (PDOException $e) {
                echo "error en el controlador ctrMostrarRol" . $e -> getMessage();
            }
            return $lista;

        }//fin de la funcion ctrMostrarRol

        public function ctrEliminarUsuario($documento){  #Controlador de eliminar usuario
            /*==========DOCUMENTACION================
                una vez capturados el dato de la vista se crea un objeto DTO y a su vez se instancia la clase de Usuario para
                capturar el parametro en este clase
                luego se crea un objeto DAO en el cual se instancia ModeloUsuario y se le envia un solo parametro el cual es el objeto DTO
                que contiene el parametro capturado previamente
                luego se ejecuta la funcion del modelo llamada mdlEliminarUsuario, en caso de que este retornado un estado de true
                le enseñara al usuario una notificacion de exito en el procedimiento
            =======================================*/
            try {
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
            } catch (PDOException $e) {
                echo "error en el controlador ctrEliminarUsuario" . $e -> getMessage();
            }
            

        }//fin de la funcion ctrEliminarUsuario

        public function ctrMostrarDatosPModificar($documento){ #Controlador de mostrar datos de usuario en la vista de editar usuario
            /*==========DOCUMENTACION================
                una vez capturado el dato de la vista se crea un objeto DTO y a su vez se instancia la clase de Usuario para
                capturar el parametro en este objeto
                luego se crea un objeto DAO en el cual se instancia ModeloUsuario y se le envia un solo parametro el cual es el objeto DTO
                que contiene el parametro capturado previamente
                luego se crean dos variables las cuales capturan los datos de los modelos mdlMostrarDatosPModificar y mdlMostrarDatosUModificar
                ya que estos datos se alojan en dos tablas diferentes en la base de datos
                luego se crea una arreglo en el cual se acpturan los datos de ambas tablas por medio de un FOREACH para retornarlo a la vista
            =======================================*/
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario->setDocumento($documento);
    
                $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
                $lista1 = $objDaoUsuario -> mdlMostrarDatosPModificar() -> fetchAll();
                
                $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
                $lista2 = $objDaoUsuario -> mdlMostrarDatosUModificar() -> fetchAll();

            } catch (PDOException $e) {
                echo "error en el controlador ctrMostrarDatosPModificar" . $e -> getMessage();
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

        }//fin de la funcion ctrMostrarDatosPModificar

        public function ctrModificarUsuario($userName,$rol,$nombre,$apellido,$documento,$nacimiento,$telefono,$correo,$pass){ #Controlador de modificar usuario
            /*==========DOCUMENTACION================
                una vez capturados todos los datos de la vista se crea un objeto DTO y a su vez se instancia la clase de Usuario para
                capturar todos los parametros en este objeto
                luego se crea un objeto DAO en el cual se instancia ModeloUsuario y se le envia un solo parametro el cual es el objeto DTO
                que contiene todos los parametros capturados previamente
                luego se ejecuta la funcion del modelo llamada mdlModificarUsuario, en caso de que este retornado un estado de true
                le enseñara al usuario una notificacion de exito en el procedimiento
            =======================================*/
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
                echo "Error en el controlador ctrModificarUsuario ".$e->getMessage();
            }

        }//fin de la funcion ctrModificarUsuario
        
        public function ctrValidarUsuario($userName,$pass,$newpass){ #Controlador de validar y cambiar contraseña de usuario
            /*==========DOCUMENTACION================
                una vez capturados todos los datos de la vista se crea un objeto DTO y a su vez se instancia la clase de Usuario para
                capturar los datos de userName y pass en este objeto
                luego se crea un objeto DAO en el cual se instancia ModeloUsuario y se le envia un solo parametro el cual es el objeto DTO
                que contiene todos los parametros capturados previamente
                luego se ejecuta la funcion del modelo llamada mdlValidarUser, en caso de que este retornando un valor es un booleano
                le enseñara al usuario una alerta informandole que los datos enviados no coinciden y de ser lo opuesto.

                se vuelte a utilizar el objeto DTO e instancia la clase Usuario para campturar ahora los datos userName y newPass
                luego se crea un objeto DAO en el cual se instancia ModeloUsuario y se le envia un solo parametro el cual es el objeto DTO
                que contiene todos los parametros capturados previamente
                luego se ejecuta la funcion del modelo llamada mdlCambiarPass, en caso de que este retornando un estado de true le mostrara
                una notificacion de extio al usuario
            =======================================*/
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario->setUserName($userName);
                $objDtoUsuario->setPass($pass);

                $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
                $rest = $objDaoUsuario -> mdlValidarUser() -> fetch();
                
                if (gettype($rest) != "boolean") {
                    $objDtoUsuario = new Usuario();
                    $objDtoUsuario->setUserName($userName);
                    $objDtoUsuario->setPass($newpass);

                    $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
                    if ( $objDaoUsuario -> mdlCambiarPass() == true) {
                        echo"
                            <script>
                                Swal.fire({
                                    title: 'EXTIO',
                                    text: 'Contraseña cambiada con exito',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'CONFIRMAR'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                    }else{
                                    }
                                })
                            </script>
                        ";                    
                    }
                }else{
                    echo"
                        <script>
                            Swal.fire({
                                title: 'ERROR',
                                text: 'Los datos ingresados no son correctos',
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'CONFIRMAR'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                }else{
                                }
                            })
                        </script>
                    ";                
                }
            }catch (PDOException $e) {
                echo "error al ejecutar el ctrValidarUsuario" . $e -> getMessage();
            } 
            
        }//fin de la funcion ctrValidarUsuario

        public function validarDatos($Documento,$Correo){        #Controlador de validar datos del usuario para envio de correo
            /*==========DOCUMENTACION================
                una vez capturados todos los datos de la vista se crea un objeto DTO y a su vez se instancia la clase de Usuario para
                capturar todos los datos en esta
                luego se crea un objeto DAO en el cual se instancia ModeloUsuario y se le envia un solo parametro el cual es el objeto DTO
                que contiene todos los parametros capturados previamente
                luego se ejecuta la funcion del modelo llamada mdlValidarEmail, en caso de que este retornando un valor es un booleano
                le enseñara al usuario una alerta informandole que los datos enviados no coinciden y de ser lo opuesto.

                se crea un objeto llamado mailsend y se instancia la clase llamada clsMail en la cual se crea la estructura del de correo
                utilizando otros modelos para extraer los datos del usuario e incluirlos en el correo, una vez echa la escructura se ejecuta
                la funcion llamada metEnviar y en esta se incluyen los parametros de la estructura del correo
                una vez ejecutada la funcion, si es exitosa le mostrara al usuario una notificacion de exito de ser lo opuesto enseñara un error
            =======================================*/
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario->setDocumento($Documento);
                $objDtoUsuario->setCorreo($Correo);
               
                $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );
                $rest = $objDaoUsuario -> mdlValidarEmail() -> fetch();
    
                if (gettype($rest) != "boolean") {
                    
                    $mailSend = new clsMail();
                    $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
                    $lista1= $objDaoUsuario->mdlMostrarDatosUModificar()->fetchAll();
                    $lista2 = $objDaoUsuario->mdlMostrarDatosPModificar()->fetchAll();

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
                        <h1><em> INV_PRIV </em></h1>
                        <hr>
                        <h2> Hola, </h2>
                        <h2> <b> Sñr@, '.$datoP[1].' '.$datoP[2].' </b>, </h2>
                        <h2> Haz olvidado la contraseña,<i> ¡No te preocupes!</i>, </h2>
                        <h2> A continuación te la recordamos. </h2>
                        <br>
                        <h2> CONTRASEÑA: <b>( '.$datoP[0].' )</b> </h2>
                        <br>
                        <hr>
                        <mark>
                            <h2> Gracias, </h2>
                            <h2> El equipo de INV_PRIV </h2>
                        </mark>
                    ';
    
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
                echo "error en el controlador validarDatos" . $e -> getMessage();
            } 
            
        }//fin de la funcion validarDatos
    }
?>