<?php
    class ModeloProducto{
        /*------ATRIBUTOS-------*/
        private $nombre;
        private $cantidad;
        private $precio;
        private $categoria;
        private $grupo;
        private $descripcion;
        private $codigo;
        private $imagen;

        public function __construct($objProducto){
            $this -> nombre = $objProducto -> getNombre();
            $this -> cantidad = $objProducto -> getCantidad();
            $this -> precio = $objProducto -> getPrecio();
            $this -> categoria = $objProducto -> getCategoria();
            $this -> grupo = $objProducto -> getGrupo();
            $this -> descripcion = $objProducto -> getDescripcion();
            $this -> imagen = $objProducto -> getImagen();
            $this -> codigo = $objProducto -> getCodigo();
        }
        public function mdlCrearProducto(){
            $sql = "INSERT INTO producto(Nombre, Existencia, Precio, Cod_Categoria, Cod_Grupo ,Descripcion,Imagen) VALUES (?,?,?,?,?,?,?)";
            $this -> estado = false;

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> nombre,PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> cantidad,PDO::PARAM_INT);
                $stmt -> bindParam(3, $this -> precio,PDO::PARAM_INT);
                $stmt -> bindParam(4, $this -> categoria,PDO::PARAM_INT);
                $stmt -> bindParam(5, $this -> grupo,PDO::PARAM_INT);
                $stmt -> bindParam(6, $this -> descripcion,PDO::PARAM_STR);
                $stmt -> bindParam(7, $this -> imagen,PDO::PARAM_LOB);
                $stmt -> execute();
                $this-> estado = true;
            
            }catch (PDOException $e) {
                echo "Error al ejecutar la insercion de datos " . $e->getMessage();
            }
            return $this -> estado;
        }
        public function mdlConsultarProducto(){
            $sql = "CALL SpMostrarProducto()";  //Procedimiento almacenado

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;
                
            } catch (PDOException $e) {
                echo "Error en el metodo consultar Producto " . $e -> getMessage();
            }
            return $resulset;
        }
        public function mdlEliminarProducto(){
            $sql = "CALL SpEliminarProducto (?)";
            $this -> estado = false;

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> codigo,PDO::PARAM_INT);
                $stmt -> execute();
                $this -> estado = true;

            } catch (PDOException $e) {
                echo "Error en el metodo eliminar Producto " . $e -> getMessage();
            }
            return $this -> estado;
        }
        public function mdlModificarProducto(){
            $sql = "CALL SpModificarProducto(?,?,?,?,?,?,?)";
            $this-> estado = false;
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
                $this-> estado = true;

            } catch (PDOException $e) {
                echo "error en el modelo de modificar producto". $e -> getMessage();
            }
            return $this -> estado;
        }
        public function mdlMostrarGrupos(){
            $sql = "CALL SpMostrarGrupo()";

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;
            } catch (PDOException $e) {
                echo "Error en el metodo mostrar los grupos del producto " . $e -> getMessage();
            }
            return $resulset;

        }
        public function mdlMostrarCategorias(){
            $sql = "CALL SpMostrarCategorias()";

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;
            } catch (PDOException $e) {
                echo "Error en el metodo mostrar los grupos del producto " . $e -> getMessage();
            }
            return $resulset;

        }
        public function mdlMostrarDatosProducto(){
            $sql = "CALL SpMostrarDatosProducto(?)";

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> codigo,PDO::PARAM_INT);
                $stmt -> execute();
                $resulset = $stmt;
            } catch (PDOException $e) {
                echo "Error en el metodo mostrar los datos del producto al modificar" . $e -> getMessage();
            }
            return $resulset;
        }
    }       


?>