<?php

    class ModeloUsuario{
        /*------ATRIBUTOS-------*/
        private $rol;
        private $nombre;
        private $apellido;
        private $documento;
        private $nacimiento;
        private $telefono;
        private $correo;
        private $pass;

        public function __construct( $objUsuario ){
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
            $sql = "CALL spCrearUsuario (?,?,?,?,?,?,?,?)"; //Procedimiento almacenado
            $this-> estado = false;

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

            } catch (PDOEception $e) {
                echo "Error al ejecutar la insercion de datos " . $e->getMessage();
            }
            return $this -> estado;
        }
        public function mdlConsultarUsuario(){
            $resultSet = NULL;
            
            $sql = "SELECT * FROM usuario WHERE USUARIO = ? limit 1";

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> nombre, PDO::PARAM_STR);
                $stmt -> execute();

                $resultSet = $stmt;                
                
            } catch (PDOException $e) {
                echo "Error en el metodo consultar usuario " . $e->getMessage();
            }
            return $resultSet;
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

            } catch (PDOEception $e) {
                echo "Error al ejecutar la moificacion de datos " . $e->getMessage();
            }
            return $this -> estado;
        }
        public function mdlEliminarUsuario(){
            $sql = "DELETE FROM VEHICULO WHERE PLACA = ?";
            $this -> estado = false;
            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> placa, PDO::PARAM_STR);
                $stmt -> execute();
                $this -> estado = true;
            } catch (PDOException $e) {
                echo "Error en el metodo ELIMINAR vehiculo " . $e->getMessage();
            }
            return $this -> estado;
        }
    }

?>
