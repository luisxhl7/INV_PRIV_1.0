<?php
    class ConexionController{
        public function ctrLogin($user, $pass, $rol){
            /*===========DOCUMENTACION=======================
                se crea un objeto en el cual se instancia el modelo de la conexion con los parametros requeridos y se ejecuta la funcion 
                de getLogin en caso de que el resultado que se retorna de la funcion getLogin sea diferente a un valor booleano enviara
                un estado a $_SESSION["login"] de true y direccionara al archivo index.php para permitir el acceso al usuario
            ===============================================*/
            try {
                $objModConextion = new  ModelConexion($user, $pass, $rol);
                $rest = $objModConextion -> getLogin() -> fetch();
                
                if (gettype($rest) != "boolean") {
                    $_SESSION["login"] = true;
                    header("location:index");
                }else{
                    echo "<script> 
                        Swal.fire({
                            icon: 'error',
                            iconColor: 'red',
                            title: 'Datos incorrectos',
                            text: 'Su ID de usuario o contraseña son incorrectos por favor intenta de nuevo.',
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
                echo "Error en el controlador ctrLogin: ".$e->getMessage();
            }
            
        }//FINAL DE LA FUNCION
        
    }// FINAL DE LA CLASE

?>