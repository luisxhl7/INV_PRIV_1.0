<?php
    class ModeloProducto{
        /*------ATRIBUTOS-------*/
        private $nombreProducto;
        private $grupo;
        private $categoria;
        private $precio;
        private $descripcion;
        private $cantidad;
        /*private $imagen;*/

        public function __construct($objProducto){
            $this -> nombreProducto = $objProducto -> getNombreProducto();
            $this -> grupo = $objProducto -> getGrupo();
            $this -> categoria = $objProducto -> getCategoria();
            $this -> precio = $objProducto -> getPrecio();
            $this -> descripcion = $objProducto -> getDescripcion();
            $this -> cantidad = $objProducto -> getCantidad();
            /*$this -> imagen = $objProducto -> getImagen();*/
        }

        public function mdlCrearProducto(){
            $sql = "INSERT INTO producto(nombre, grupo, categoria, precio, descripcion, cantidad) VALUES (?,?,?,?,?,?)";
            $this -> estado = false;

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> nombreProducto,PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> grupo,PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> categoria,PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> precio,PDO::PARAM_INT);
                $stmt -> bindParam(5, $this -> descripcion,PDO::PARAM_STR);
                $stmt -> bindParam(6, $this -> cantidad,PDO::PARAM_INT);
                /*$stmt -> bindParam(6, $this -> imagen,PDO::PARAM_LONG);*/
                $stmt -> execute();
                $this-> estado = true;
            
            }catch (PDOException $e) {
                echo "Error al ejecutar la insercion de datos " . $e->getMessage();
            }
            return $this -> estado;
        }
        public function mdlConsultarProducto(){
            $sql = "CALL spMostrarProducto()";  //Procedimiento almacenado

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
}       


?>