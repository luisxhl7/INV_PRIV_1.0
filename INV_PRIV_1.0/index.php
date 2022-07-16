<?php
    /*--------------------------------------------------CONTROLADORES--------------------------------------------------*/
    require_once "controller/conexion.controller.php";
    require_once "controller/plantilla.controller.php";
    require_once "controller/usuario.controller.php";
    require_once "controller/producto.controller.php";
    
    /*-----------------------------------------------------MODELOS-----------------------------------------------------*/
    require_once "model/conexion.php";
    /*-------------------------------------------------------DTO-------------------------------------------------------*/
    require_once "model/dto/usuario.dto.php";
    require_once "model/dto/producto.dto.php";
    /*-------------------------------------------------------DAO-------------------------------------------------------*/
    require_once "model/dao/conexion.dao.php";
    require_once "model/dao/usuario.dao.php";
    require_once "model/dao/producto.dao.php";

    /*------------------------------------------------OBJETO DE ARRNAQUE-----------------------------------------------*/
    $objPlantilla = new PlantillaController();
    $objPlantilla -> ctrPlantilla();
?>
