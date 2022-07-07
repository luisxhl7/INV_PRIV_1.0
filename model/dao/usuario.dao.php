<?php

    class ModeloUsuario{
        /*------ATRIBUTOS-------*/
        private $userName;
        private $rol;
        private $nombre;
        private $apellido;
        private $documento;
        private $nacimiento;
        private $telefono;
        private $correo;
        private $pass;
        private $idUsuario;


        public function __construct( $objUsuario ){
            $this-> username = $objUsuario -> getUserName();
            $this-> rol = $objUsuario -> getRol();
            $this-> nombre = $objUsuario -> getNombre();
            $this-> apellido = $objUsuario -> getApellido();
            $this-> documento = $objUsuario -> getDocumento();
            $this-> nacimiento = $objUsuario -> getNacimiento();
            $this-> telefono = $objUsuario -> getTelefono();
            $this-> correo = $objUsuario -> getCorreo();
            $this-> pass = $objUsuario -> getPass();

        }
        public function mdlCrearUsuario(){
            $sql1 = "CALL SpInsertarDatos_P  (?,?,?,?,?,?)"; //Procedimiento almacenado
            $sql2 = "CALL SpInsertarUsuario (?,?,?,?)"; //Procedimiento almacenado
            $this-> estado = false;

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql1);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this->nombre, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this->apellido, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this->nacimiento, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this->telefono, PDO::PARAM_STR);
                $stmt -> bindParam(6, $this->correo, PDO::PARAM_STR);
                
                $stmt -> execute();
                
                $stmt = $con -> conexion() -> prepare($sql2);
                $stmt -> bindParam(1, $this->username, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this->pass, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this->documento, PDO::PARAM_INT);
                $stmt -> bindParam(4, $this->rol, PDO::PARAM_INT);

                $stmt -> execute();

                $this-> estado = true;

            } catch (PDOException $e) {
                echo "Error al ejecutar la insercion de datos " . $e->getMessage();
            }
            return $this -> estado;
        }
        public function mdlConsultarUsuario(){
            $sql = "CALL SpMostrarUsuario()";  //Procedimiento almacenado

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;
                
            } catch (PDOException $e) {
                echo "Error en el metodo consultar usuario " . $e -> getMessage();
            }
            return $resulset;
        }
        public function mdlMostrarRol(){
            $sql = "CALL SpMostrarRol()";  //Procedimiento almacenado

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resulset = $stmt;
                
            } catch (PDOException $e) {
                echo "Error en el metodo consultar usuario " . $e -> getMessage();
            }
            return $resulset;
        }
        public function mdlEliminarUsuario(){
            $sql = "CALL SpEliminarUsuario (?);";  //ELIMINAR
            $this -> estado = false;
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);

                $stmt -> execute();
                $this-> estado = true;

            } catch (PDOException $e) {
                echo "Error al ejecutar mdlEliminarUsuario " . $e->getMessage();
            }
            return $this -> estado;
        }










        /*----------------------------------- MODIFICAR A PARTIR DE AQUI --------------------------------------*/
        public function mdlModificarUsuario(){
            $sql = "CALL spModificarUsuario (?,?,?,?,?,?,?,?)";  //MODIFICAR
            $this -> estado = false;
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->rol, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this->nombre, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this->apellido, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this->documento, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this->nacimiento, PDO::PARAM_STR);
                $stmt -> bindParam(6, $this->telefono, PDO::PARAM_STR);
                $stmt -> bindParam(7, $this->correo, PDO::PARAM_STR);
                $stmt -> bindParam(8, $this->pass, PDO::PARAM_STR);
                $stmt -> execute();
                $this-> estado = true;

            } catch (PDOException $e) {
                echo "Error al ejecutar la moificacion de datos " . $e->getMessage();
            }
            return $this -> estado;
        }

        public function mdlModificarPass(){
            $sql = "CALL SpValidarUsuario (?,?)";  //MODIFICAR
            $this -> estado = false;
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->userName, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this->pass, PDO::PARAM_STR);
                $stmt -> execute();
                $this-> estado = true;

            } catch (PDOException $e) {
                echo "Error al ejecutar la moificacion de datos " . $e->getMessage();
            }
            return $this -> estado;
        }

    }

?>
