<?php
    class MovimientoController{

        public function ctrMostrarProducto($codigo){ #Controlador de la vista de los datos del producto a modificar
            /*==========DOCUMENTACION================
                una vez capturado el dato de la vista se crea un objeto DTO y a su vez se instancia la clase de producto para
                captura el parametro en esta clase
                luego se crea un objeto DAO en el cual se instancia ModeloProducto y se le envia un solo parametro el cual es el objeto DTO
                que contiene el parametro capturado previamente
                luegos se ejecuta la funcion del modelo llamada mdlMostrarDatosProducto,la cual retorna los datos buscados por medio del
                parametro adquirido y returnandolos a la vista para poder ser modificados
            =======================================*/
            try {
                $objDtoMovimiento = new Producto();
                $objDtoMovimiento -> setCodigo($codigo);
    
                $objDaoMovimiento = new ModeloMovimiento($objDtoMovimiento);
                $datos = $objDaoMovimiento -> mdlMostrarDatosProducto() -> fetchAll();
            
            } catch (PDOException $e) {
                echo "Error en el controlador ctrMostrarProductoModificar: ".$e->getMessage();
            }
            return $datos;

        }//fin de la funcion ctrMostrarProductoModificar

        public function ctrListarTipoMovimiento(){
            /*=================DOCUMENTACION================== 
                se crea una variable llamada lista con un estado false luego se crea un objeto DTO y se instancia la clase producto
                luego se crea un objeto DAO y se instancia la clase ModeloProducto se captura el DTO
                luego se utiliza la variable lista para capturar los tados que se retornaran en la funcion mdlMostrarGrupos
                en caso de que si existan datos los captura en un arreglo y los retorna, de lo contrario conservara el estado de false 
                y lo retornara
            ================================================*/
            $lista = false;
            try {
                $objDtoMovimiento = new Producto();
                $objDaoMovimiento = new ModeloMovimiento( $objDtoMovimiento );
                $lista = $objDaoMovimiento -> mdlListarMovimiento() -> fetchAll();

            } catch (PDOException $e) {
                echo "Error en el controlador ctrListarTipoMovimiento : ".$e->getMessage();
            }
            return $lista;
        }
    }

?>