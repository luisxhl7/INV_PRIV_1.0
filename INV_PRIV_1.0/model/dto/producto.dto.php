<?php
    class Producto{
        /*------ATRIBUTOS-------*/
        private $nombreProducto;
        private $grupo;
        private $categoria;
        private $precio;
        private $descripcion;
        private $cantidad;
        /*private $imagen;*/

        public function getNombreProducto(){
            return $this -> nombreProducto;
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
        /*
        public function getImagen(){
            return $this -> imagen;
        }
        */

        public function setNombreProducto($nombreProducto){
            $this -> nombreProducto = $nombreProducto ;
        }
        public function setGrupo($grupo){
            $this -> grupo = $grupo ;
        }
        public function setCategoria($categoria){
            $this -> categoria = $categoria ;
        }
        public function setPrecio($precio){
            $this -> precio = $precio ;
        }
        public function setDescripcion($descripcion){
            $this -> descripcion = $descripcion ;
        }
        public function setCantidad($cantidad){
            $this -> cantidad = $cantidad ;
        }
        /*
        public function setImagen($imagen){
            $this -> imagen = $imagen ;
        }
        */
    }

?>