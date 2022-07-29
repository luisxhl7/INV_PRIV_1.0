<?php
    class ModeloMovimiento{
        /*=================================================== ATRIBUTOS ===================================================*/
        private $nombre;
        private $cantidad;
        private $precio;
        private $categoria;
        private $grupo;
        private $descripcion;
        private $codigo;
        private $imagen;

        public function __construct($objProducto){
            /*===================DOCUMENTACION======================== 
                Se capturan los datos de los get del DTO en los ($this-> xx) para poder manipularlos en las diferentes funciones de la clase
                El ($this-> xx) se utiliza ya que los atributos son privados 
            ========================================================*/
            $this -> nombre = $objProducto -> getNombre();
            $this -> cantidad = $objProducto -> getCantidad();
            $this -> precio = $objProducto -> getPrecio();
            $this -> categoria = $objProducto -> getCategoria();
            $this -> grupo = $objProducto -> getGrupo();
            $this -> descripcion = $objProducto -> getDescripcion();
            $this -> imagen = $objProducto -> getImagen();
            $this -> codigo = $objProducto -> getCodigo();

        }//FIN DEL CONSTRUCTOR

        public function mdlMostrarDatosProducto(){         #Funcion utilizada para mostrar los datos de un Producto al momento de modificar
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se capturan los datos en cada una de sus respectiva posiciones
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpMostrarDatosProducto(?)";

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> codigo,PDO::PARAM_INT);
                $stmt -> execute();
                $resulset = $stmt;
            } catch (PDOException $e) {
                echo "Error en el modelo mdlMostrarDatosProducto" . $e -> getMessage();
            }
            return $resulset;

        }//FIN DE LA FUNCION mdlMostrarDatosProducto
        
        public function mdlListarMovimiento(){                #Funcion utilizada para listar los grupos de los Productos
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpListarTipoMovimiento()";

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;
            } catch (PDOException $e) {
                echo "Error en el modelo mdlListarMovimiento " . $e -> getMessage();
            }
            return $resulset;

        }//FIN DE LA FUNCION mdlListarMovimiento
    }
?>