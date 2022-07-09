<?php
    //session_start();   //activar las sesiones
    class ConexionController{
        public function ctrLogin($user, $pass, $rol){

            $objModConextion = new  ModelConexion($user, $pass, $rol);
            $rest = $objModConextion -> getLogin() -> fetch();
            if (gettype($rest) != "boolean") {   // YES FIND
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
        }//FINAL DE LA FUNCION
        
    }// FINAL DE LA CLASE

?>