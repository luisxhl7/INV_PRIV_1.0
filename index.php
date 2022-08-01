<?php
    /*--------------------------------------------------CONTROLADORES--------------------------------------------------*/
    require_once "controller/conexion.controller.php";
    require_once "controller/plantilla.controller.php";
    require_once "controller/usuario.controller.php";
    require_once "controller/producto.controller.php";
    require_once "controller/movimiento.controller.php";
    require_once "controller/clsMail.php";

    /*-----------------------------------------------------MODELOS-----------------------------------------------------*/
    require_once "model/conexion.php";
    
    /*-------------------------------------------------------DTO-------------------------------------------------------*/
    require_once "model/dto/usuario.dto.php";
    require_once "model/dto/producto.dto.php";
    
    /*-------------------------------------------------------DAO-------------------------------------------------------*/
    require_once "model/dao/conexion.dao.php";
    require_once "model/dao/usuario.dao.php";
    require_once "model/dao/producto.dao.php";
    require_once "model/dao/movimiento.dao.php";
    
    /*-----------------------COMPLEMENTOS PARA PODER ENVIAR CORREO CON LA CONTRASEÑA DEL USUARIO-----------------------*/
    require 'view/PHPMailer/Exception.php';
    require 'view/PHPMailer/PHPMailer.php';
    require 'view/PHPMailer/SMTP.php';
    require "view/complementos/dompdf/autoload.inc.php";
  
    /*------------------------------------------------OBJETO DE ARRNAQUE-----------------------------------------------*/
    /*==============================================
    una vez que el usuario es validado se crea un objeto y se instancia la plantillaController y se ejecuta la funcion ctrPlantilla
    para direccionar al usuario a la interfaz principal "menuPrincipal"
    ==============================================*/
    $objPlantilla = new PlantillaController();
    $objPlantilla -> ctrPlantilla();
?>
