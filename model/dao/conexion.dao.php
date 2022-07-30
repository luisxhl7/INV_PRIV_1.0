<?php

    class ModelConexion{
        /*====================================================== ATRIBUTOS ======================================================*/
        private $user;
        private $pass;
        private $rol;

        public function __construct($user, $pass, $rol){
            /*===================DOCUMENTACION======================== 
                Se capturan los datos en los ($this-> xx) para poder manipularlos en las funciones
            ========================================================*/
            $this -> user = $user;
            $this -> pass = $pass;
            $this -> rol = $rol;
        } //FIN DEL CONSTRUCTOR

        public function getLogin(){
            /*==================DOCUMENTACION================== 
                se crea una variable llamada resulset con un estado de false
                luego se crea una variable llamada sql que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado con en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                despues se empezara a capturar los datos en cada una de sus respectivas posiciones una vez capturados se ejecutara 
                el procedimiento almacenado, luego se capturara el contenido de el procedimiento almacenado en la variable resulset,
                estas sera retornada al controlador llamo la funcion
            =================================================*/
            $resultSet = false;

            $sql = "CALL SpIniciarSesion(?,?,?)";

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> user, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> pass, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> rol, PDO::PARAM_INT);

                $stmt -> execute();
                $resultSet = $stmt;

            } catch (PDOException $e) {
                echo "Error en el modelo getLogin" . $e -> getMessage();
            }
            return $resultSet;
            
        }//FIN DE LA FUNCION getLogin

    }//Fin clase
?>