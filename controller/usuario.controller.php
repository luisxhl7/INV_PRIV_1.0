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
            $lista = false;
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
                $datosP[9] = ''.$datos['Cod_Rol'].'';

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

        /*                                                                           PENDIENTES                                                                           */
        public function ctrModificarPass($userName, $pass){
            $objDtoUsuario = new Usuario();
            $objDtoUsuario->setUserName($userName);
            $objDtoUsuario->setPass($pass);

            $objDaoUsuario = new ModeloUsuario( $objDtoUsuario );
            if ($objDaoUsuario -> mdlModificarPass() == true) {
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
            }

        }
    }
    
?>