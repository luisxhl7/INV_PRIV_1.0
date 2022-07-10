<?php
    if (isset($_GET['ruta'])) {
        switch ($_GET['ruta']) {
            case 'prueba':
                require_once "view/module/prueba.php";
                break;
            case 'menuPrincipal':
                require_once "view/module/MenuPrincipal.php";
                break;
            case 'soporte':
                require_once "view/module/Soporte.php";
                break;
            case 'ayuda':
                require_once "view/module/ayuda.php";
                break;
            case 'producto':
                require_once "view/module/menuProducto.php";
                break;
            case 'crearProducto':
                require_once "view/module/crearProducto.php";
                break;
            case 'editarProducto':
                require_once "view/module/editarProducto.php";
                break;
            case 'salirMenuProducto':
                require_once "view/module/menuProducto.php";
                break;
            case 'inventario':
                require_once "view/module/inventario.php";
                break;
            case 'movimiento':
                require_once "view/module/movimiento.php";
                break;
            case 'admUsuario':
                require_once "view/module/MenuUsuario.php";    
                break;
            case 'registrarUsuario':
                require_once "view/module/crearUsuario.php";    
                break;  
            case 'editarUsuario':
                require_once "view/module/EditarUsuario.php";    
                break;                 
            default:
                require_once "view/module/MenuPrincipal.php";
                break;
        }
    }else {
        require_once "view/module/MenuPrincipal.php";
    }

?>