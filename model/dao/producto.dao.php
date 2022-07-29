<?php
    class ModeloProducto{
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

        public function mdlCrearProducto(){                #Funcion utilizada para registrar Productos
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea una variable llamada "resultSet" con un estado de false
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                despues se empezara a capturar los datos en cada una de sus respectivas posiciones, una vez capturados se ejecutara 
                el procedimiento almacenado, si no se presentan errores la variable "resultSet" cambiara a estar true y se retornara
                esta variable al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpInsertarProducto(?,?,?,?,?,?,?)";
            $resultSet = false;

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> nombre,PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> cantidad,PDO::PARAM_INT);
                $stmt -> bindParam(3, $this -> precio,PDO::PARAM_INT);
                $stmt -> bindParam(4, $this -> descripcion,PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> imagen,PDO::PARAM_LOB);
                $stmt -> bindParam(6, $this -> categoria,PDO::PARAM_INT);
                $stmt -> bindParam(7, $this -> grupo,PDO::PARAM_INT);
                $stmt -> execute();
                $resultSet = true;
            
            }catch (PDOException $e) {
                echo "Error en el modelo mdlCrearProducto " . $e->getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlCrearProducto

        public function mdlConsultarProducto(){            #Funcion utilizada para listar Productos
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpMostrarProducto()";  //Procedimiento almacenado

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;
                
            } catch (PDOException $e) {
                echo "Error en el modelo SpMostrarProducto " . $e -> getMessage();
            }
            return $resulset;

        }//FIN DE LA FUNCION mdlConsultarProducto

        public function mdlEliminarProducto(){             #Funcion utilizada para eliminar Productos
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea una variable llamada "resultSet" con un estado de false
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                despues se empezara a capturar los datos en cada una de sus respectivas posiciones, una vez capturados se ejecutara 
                el procedimiento almacenado, si no se presentan errores la variable "resultSet" cambiara a estar true y se retornara
                esta variable al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpEliminarProducto (?)";
            $resultSet = false;

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> codigo,PDO::PARAM_INT);
                $stmt -> execute();
                $resultSet = true;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlEliminarProducto " . $e -> getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlEliminarProducto

        public function mdlModificarProducto(){            #Funcion utilizada para modificar Productos
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea una variable llamada "resultSet" con un estado de false
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                despues se empezara a capturar los datos en cada una de sus respectivas posiciones, una vez capturados se ejecutara 
                el procedimiento almacenado, si no se presentan errores la variable "resultSet" cambiara a estar true y se retornara
                esta variable al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpModificarProducto(?,?,?,?,?,?,?)";
            $resultSet = false;
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> codigo,PDO::PARAM_INT);
                $stmt -> bindParam(2, $this -> nombre,PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> cantidad,PDO::PARAM_INT);
                $stmt -> bindParam(4, $this -> precio,PDO::PARAM_INT);
                $stmt -> bindParam(5, $this -> descripcion,PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> categoria,PDO::PARAM_INT);
                $stmt -> bindParam(7, $this -> grupo,PDO::PARAM_INT);
                $stmt -> execute();
                $resultSet = true;

            } catch (PDOException $e) {
                echo "error en el modelo mdlModificarProducto". $e -> getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlModificarProducto
        
        public function mdlMostrarGrupos(){                #Funcion utilizada para listar los grupos de los Productos
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpMostrarGrupo()";

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;
            } catch (PDOException $e) {
                echo "Error en el modelo mdlMostrarGrupos " . $e -> getMessage();
            }
            return $resulset;

        }//FIN DE LA FUNCION mdlMostrarGrupos

        public function mdlMostrarCategorias(){            #Funcion utilizada para listar las categorias de los Productos
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpMostrarCategorias()";

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlMostrarCategorias " . $e -> getMessage();
            }
            return $resulset;

        }//FIN DE LA FUNCION mdlMostrarCategorias

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
    }
?>