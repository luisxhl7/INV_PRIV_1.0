<?php
    if (isset($_GET['ruta'])) {
        switch ($_GET['ruta']) {
            case 'menuPrincipal':
                require_once "view/module/menuPrincipal.php";
                break;
            case 'soporte':
                require_once "view/module/soporte.php";
                break;
            case 'ayuda':
                require_once "view/module/ayuda.php";
                break;
            case 'menuProducto':
                require_once "view/module/menuProducto.php";
                break;
            case 'crearProducto':
                require_once "view/module/crearProducto.php";
                break;
            case 'editarProducto':
                require_once "view/module/editarProducto.php";
                break;
            case 'inventario':
                require_once "view/module/inventario.php";
                break;
            case 'movimiento':
                require_once "view/module/movimiento.php";
                break;
            case 'admUsuario':
                require_once "view/module/menuUsuario.php";    
                break;
            case 'registrarUsuario':
                require_once "view/module/crearUsuario.php";    
                break;  
            case 'editarUsuario':
                require_once "view/module/editarUsuario.php";    
                break;                 
            default:
                require_once "view/module/menuPrincipal.php";
                break;
        }
    }else {
        require_once "view/module/menuPrincipal.php";
    }

?>