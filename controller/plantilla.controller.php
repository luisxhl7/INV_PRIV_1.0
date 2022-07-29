<?php
    session_start();  //activar las sesiones
    class PlantillaController{
        
        public function ctrPlantilla(){
            /*============DOCUMENTACION=====================
                en caso de que el usuario fue validado, "se obtuvo un estado true" el usuario sera enviado a la interfas
                de menu principal de lo contrario continuara en la interfaz de inicio de sesion.
                tambien aplica si el usuario cierra la sesion cambiando su a false para volver a la interfaz de inicio de sesion
            =========================================*/
            if (isset($_SESSION["login"]) and $_SESSION["login"] == true) {
                include_once "view/module/direcciones.php";
            }else{
                include_once "view/module/login.php";
            }
        }
    }
?>