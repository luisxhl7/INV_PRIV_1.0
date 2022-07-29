<?php
    class Producto{
        /*=================================================== ATRIBUTOS ===================================================*/
        private $nombre;
        private $grupo;
        private $categoria;
        private $precio;
        private $descripcion;
        private $cantidad;
        private $imagen;
        private $codigo;

        /*===================== LAS FUNNCIONES TIPO GET PERMITEN VISUALIZAR LOS DATOS DE SER REQUERIDOS =====================*/
        
        public function getNombre(){
            return $this -> nombre;
        }
        public function getGrupo(){
            return $this -> grupo;
        }
        public function getCategoria(){
            return $this -> categoria;
        }
        public function getPrecio(){
            return $this -> precio;
        }
        public function getDescripcion(){
            return $this -> descripcion;
        }
        public function getCantidad(){
            return $this -> cantidad;
        }
        public function getImagen(){
            return $this -> imagen;
        }
        public function getCodigo(){
            return $this -> codigo;
        }

        /*=============================== LAS FUNNCIONES TIPO SET PERMITEN CAPTURAR LOS DATOS ===============================*/
        
        public function setNombre($nombre){
            $this -> nombre = $nombre;
        }
        public function setGrupo($grupo){
            $this -> grupo = $grupo;
        }
        public function setCategoria($categoria){
            $this -> categoria = $categoria;
        }
        public function setPrecio($precio){
            $this -> precio = $precio;
        }
        public function setDescripcion($descripcion){
            $this -> descripcion = $descripcion;
        }
        public function setCantidad($cantidad){
            $this -> cantidad = $cantidad;
        }
        public function setImagen($imagen){
            $this -> imagen = $imagen;
        }
        public function setCodigo($codigo){
            $this -> codigo = $codigo;
        }
    }
?>