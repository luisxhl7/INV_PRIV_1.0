<?php
    class UsuarioController{
        public function ctrCrearUsuario($rol,$nombre,$apellido,$documento,$nacimiento,$telefono,$correo,$pass){
            try {
                //objeto DTO
                $objDtoUsuario = new Usuario();
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
            $respuesta = null;
            $name = $_POST["buscador1"];
            try {
                $objDtoUsuario = new Usuario();
                $objDtoUsuario -> setNombre($name);

                $objDaoUsuario = new ModeloUsuario($objDtoUsuario);
                $respuesta = $objDaoUsuario -> mdlConsultarUsuario() -> fetch();
                $datos[0] = $respuesta ["codigo"];
                $datos[1] = $respuesta ["USUARIO"];
                $datos[2] = $respuesta ["APELLIDO"];
                $datos[3] = $respuesta ["DOCUMENTO"];
                $datos[4] = $respuesta ["NACIMIENTO"];
                $datos[5] = $respuesta ["TELEFONO"];
                $datos[6] = $respuesta ["CORREO"];
                $datos[7] = $respuesta ["ROL"];

            } catch (exception $e) {
                echo "Error en el controlador consultar: ".$e->getMessage();
            }
            return $datos;

        }

    }        
?>