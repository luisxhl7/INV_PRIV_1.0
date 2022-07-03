<?php

    class ModelConexion{
        private $user;
        private $pass;
        private $rol;

        public function __construct($user, $pass, $rol){
            $this -> user = $user;
            $this -> pass = $pass;
            $this -> rol = $rol;
        } //END CONSTRUCT

        public function getLogin(){
            $resultSet = false;

            $sql = " SELECT CONTRASENA FROM USUARIO WHERE USERNAME = ? AND CONTRASENA = ? ";

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> user, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> pass, PDO::PARAM_STR);
                /*$stmt -> bindParam(3, $this -> rol, PDO::PARAM_STR);*/

                $stmt -> execute();
                $resultSet = $stmt;

            } catch (PDOException $e) {
                echo "Error al buscar password" . $e -> getMessage();
            }
            return $resultSet;
            
        }//End function insert data

    }//Fin clase
?>