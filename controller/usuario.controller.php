<?php
    class UsuarioController{
        public function ctrCrearUsuario($userName,$rol,$nombre,$apellido,$documento,$nacimiento,$telefono,$correo,$pass){
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

        public function ctrConsultarUsuario(){
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

        public function ctrMostrarRol(){
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
    }
    
?>