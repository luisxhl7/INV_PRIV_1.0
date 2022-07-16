<?php
    class Usuario{
        /*-----------PROPIEDADES------*/
        private $rol;
        private $nombre;
        private $apellido;
        private $documento;
        private $nacimiento;
        private $telefono;
        private $correo;
        private $pass;
        /*-----------METODOS------*/
        /*    incio de los gets    */
        public function getRol(){
            return $this -> rol;
        }
        public function getNombre(){
            return $this -> nombre;
        }
        public function getApellido(){
            return $this -> apellido;
        }
        public function getDocumento(){
            return $this -> documento;
        }
        public function getNacimiento(){
            return $this -> nacimiento;
        }
        public function getTelefono(){
            return $this -> telefono;
        }
        public function getCorreo(){
            return $this -> correo;
        }
        public function getPass(){
            return $this -> pass;
        }
        /*    incio de los sets    */

        public function setRol($rol){
            $this -> rol = $rol;
        }
        public function setNombre($nombre){
            $this -> nombre = $nombre;
        }
        public function setApellido($apellido){
            $this -> apellido = $apellido;
        }
        public function setDocumento($documento){
            $this -> documento = $documento;
        }
        public function setNacimiento($nacimiento){
            $this -> nacimiento = $nacimiento;
        }
        public function setTelefono($telefono){
            $this -> telefono = $telefono;
        }
        public function setCorreo($correo){
            $this -> correo = $correo;
        }
        public function setPass($pass){
            $this -> pass = $pass;
        }

        public function toString(){
            echo "nombre: ".$this -> nombre ." con la contraseña:" . $this -> pass." y el rol:" . $this -> rol;
        }
        
    } //Fin Clase

    /* INSTANCIACION */
    //$objUsuario = new Usuario();
    //$objUsuario -> setNombre("luis");
    //$objUsuario -> setPass("123456");
    //$objUsuario -> setRol("Administrador");



?>