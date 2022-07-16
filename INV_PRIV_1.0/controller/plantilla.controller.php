<?php
    session_start();  //activar las sesiones
    class PlantillaController{
        
        public function ctrPlantilla(){
            if (isset($_SESSION["login"]) and $_SESSION["login"] == true) {
                include_once "view/module/direcciones.php";
            }else{
                include_once "view/module/login.php";
            }
        
        }
    }
?>