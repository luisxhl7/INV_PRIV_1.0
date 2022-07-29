<?php

    class ModeloUsuario{
<<<<<<< HEAD
        /*------ATRIBUTOS-------*/
=======
        /*=================================================== ATRIBUTOS ===================================================*/
>>>>>>> luis
        private $username;
        private $rol;
        private $nombre;
        private $apellido;
        private $documento;
        private $nacimiento;
        private $telefono;
        private $correo;
        private $pass;

        public function __construct( $objUsuario ){  #Funcion para inicializar los atributos del modelo en variables
            /*===================DOCUMENTACION======================== 
                Se capturan los datos de los get del DTO en los ($this-> xx) para poder manipularlos en las diferentes funciones de la clase
                El ($this-> xx) se utiliza ya que los atributos son privados 
            ========================================================*/
            $this-> username = $objUsuario -> getUserName();
            $this-> rol = $objUsuario -> getRol();
            $this-> nombre = $objUsuario -> getNombre();
            $this-> apellido = $objUsuario -> getApellido();
            $this-> documento = $objUsuario -> getDocumento();
            $this-> nacimiento = $objUsuario -> getNacimiento();
            $this-> telefono = $objUsuario -> getTelefono();
            $this-> correo = $objUsuario -> getCorreo();
            $this-> pass = $objUsuario -> getPass();

        }//FIN DEL CONSTRUCTOR
        
        public function mdlCrearUsuario(){           #Funcion utilizada para registrar a un usuario
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea una variable llamada "resultSet" con un estado de false
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                despues se empezara a capturar los datos en cada una de sus respectivas posiciones una vez capturadas se ejecutara 
                el procedimiento almacenado, si no se presentan errores la variable "resultSet" cambiara a estar true y se retornara
                esta variable al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpInsertarUsuario  (?,?,?,?,?,?,?,?,?,?)";
            $resultSet = false;

            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this->nombre, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this->apellido, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this->nacimiento, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this->telefono, PDO::PARAM_STR);
                $stmt -> bindParam(6, $this->correo, PDO::PARAM_STR);
                $stmt -> bindParam(7, $this->username, PDO::PARAM_STR);
                $stmt -> bindParam(8, $this->pass, PDO::PARAM_STR);
                $stmt -> bindParam(9, $this->documento, PDO::PARAM_INT);
                $stmt -> bindParam(10, $this->rol, PDO::PARAM_INT);

                $stmt -> execute();

                $resultSet = true;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlCrearUsuario " . $e->getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlCrearUsuario

        public function mdlEliminarUsuario(){        #Funcion utilizada para eliminar a un usuario puntual
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea una variable llamada "resultSet" con un estado de false
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                despues se empezara a capturar los datos en cada una de sus respectivas posiciones una vez capturadas se ejecutara 
                el procedimiento almacenado, si no se presentan errores la variable "resultSet" cambiara a estar true y se retornara
                esta variable al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpEliminarUsuario (?);";
            $resultSet = false;
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);
                $stmt -> execute();
                $resultSet = true;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlEliminarUsuario " . $e->getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlEliminarUsuario

        public function mdlModificarUsuario(){       #Funcion utilizada para Modificar los datos del usuario (nombre/apellido/nacimiento/telefono/correo/username/rol/contraseña)
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea una variable llamada "resultSet" con un estado de false
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                despues se empezara a capturar los datos en cada una de sus respectivas posiciones una vez capturadas se ejecutara 
                el procedimiento almacenado, si no se presentan errores la variable "resultSet" cambiara a estar true y se retornara
                esta variable al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpModificarUsuario (?,?,?,?,?,?,?,?,?,?)";
            $resultSet = false;
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->nombre, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this->apellido, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this->nacimiento, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this->telefono, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this->correo, PDO::PARAM_STR);
                $stmt -> bindParam(6, $this->documento, PDO::PARAM_INT);
                $stmt -> bindParam(7, $this->username, PDO::PARAM_STR);
                $stmt -> bindParam(8, $this->pass, PDO::PARAM_STR);
                $stmt -> bindParam(9, $this->rol, PDO::PARAM_INT);
                $stmt -> bindParam(10, $this->documento, PDO::PARAM_INT);
                $stmt -> execute();
                
                $resultSet = true;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlModificarUsuario " . $e->getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlModificarUsuario

        public function mdlConsultarUsuario(){       #Funcion utilizada para visualizar a todos los usuarios y algunos de sus datos
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpMostrarUsuario()";  //Procedimiento almacenado

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultSet = $stmt;
                
            } catch (PDOException $e) {
                echo "Error en el modelo mdlConsultarUsuario " . $e -> getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlConsultarUsuario
        
        public function mdlMostrarRol(){             #Funcion utilizada para visualizar a todos los tipos de roles registrados
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpMostrarRol()";

            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultSet = $stmt;
                
            } catch (PDOException $e) {
                echo "Error en el modelo mdlMostrarRol " . $e -> getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlMostrarRol

        public function mdlMostrarDatosPModificar(){ #Funcion utilizada para visualizar los datos personales del usuario al momento de modificar
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se capturan los datos en cada una de sus respectiva posiciones
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpMostrarDatos_P (?)";  //Pocedimiento almacenado
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);
                $stmt -> execute();
                $resultSet = $stmt;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlMostrarDatosPModificar " . $e->getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlMostrarDatosPModificar

        public function mdlMostrarDatosUModificar(){ #Funcion utilizada para vizualizar los datos del usuario(ID/USERNAME/PASS/ROL)
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se capturan los datos en cada una de sus respectiva posiciones
                luego se ejecutara el procedimiento almacenado, si no se presentan errores se crea la variable "resultSet" 
                para capturar los datos que trae el procedimiento almacenado para ser retornada al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpmostrarDatos_U (?)";  //Procedimiento almacenado
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);
                $stmt -> execute();
                $resultSet = $stmt;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlMostrarDatosUModificar " . $e->getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlMostrarDatosUModificar
        
        public function mdlValidarUser(){            #Funcion utilizada para validar la que los datos del usuario coinciden
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "resultSet" con un estado de false
                luego se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se capturan los datos en cada una de sus respectiva posiciones
                luego se ejecutara el procedimiento almacenado, si no se presentan errores la variable "resultSet" pasara a capturar
                los datos solicitados de lo contrario conservara el estado de false 
                en ambos casos se retornara al controlador que llamo la funcion
            =================================================*/
                $resultSet = false;
                $sql = " CALL SpValidarUsuario(?,?);";
    
                try {
                    $con = new Conexion();
                    $stmt = $con -> conexion() -> prepare($sql);
                    $stmt -> bindParam(1, $this -> username, PDO::PARAM_STR);
                    $stmt -> bindParam(2, $this -> pass, PDO::PARAM_STR);
                    $stmt -> execute();
                    $resultSet = $stmt;
    
                } catch (PDOException $e) {
                    echo "Error en el modelo mdlValidarUser" . $e -> getMessage();
                }
                return $resultSet;

        }//FIN DE LA FUNCION mdlValidarUser

        public function mdlCambiarPass(){            #Funcion utilizada para cambiar la contraseña del usuario
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea una variable llamada "resultSet" con un estado de false
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                despues se empezara a capturar los datos en cada una de sus respectivas posiciones una vez capturadas se ejecutara 
                el procedimiento almacenado, si no se presentan errores la variable "resultSet" cambiara a estar true y se retornara
                esta variable al controlador que llamo la funcion
            =================================================*/
            $sql = "CALL SpModificarPass (?,?)";  //MODIFICAR
            $resultSet = false;
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->username, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this->pass, PDO::PARAM_STR);
                $stmt -> execute();
                $resultSet = true;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlCambiarPass " . $e->getMessage();
            }
<<<<<<< HEAD
            return $this -> estado;
        }
        /*------------------------------------------------- Validar E-mail ----------------------------------------------------*/
=======
            return $resultSet;

        }//FIN DE LA FUNCION mdlCambiarPass
>>>>>>> luis

        public function mdlValidarEmail(){           #Funcion utilizada para validar que el correo si pertenece al usuario registrado
            /*==================DOCUMENTACION================== 
                se crea una variable llamada "resultSet" con un estado de false
                luego se crea una variable llamada "sql" que contiene el procedimiento almacenado que se utilizara en la funcion
                luego se crea un objeto llamado "con" en el cual se instancia la clase de conexion
                luego se crea una variable la cual ejecutara la funcion de conexion y preparara el procedimiento almacenado
                luego se capturan los datos en cada una de sus respectiva posiciones
                luego se ejecutara el procedimiento almacenado, si no se presentan errores la variable "resultSet" pasara a capturar
                los datos solicitados de lo contrario conservara el estado de false 
                en ambos casos se retornara al controlador que llamo la funcion
            =================================================*/
            $resultSet = false;
            $sql = "CALL SpValidarCorreo (?,?)";  //MODIFICAR
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this->correo, PDO::PARAM_STR);
                $stmt -> execute();
                $resultSet = $stmt;

            } catch (PDOException $e) {
                echo "Error en el modelo mdlValidarEmail " . $e->getMessage();
            }
            return $resultSet;

        }//FIN DE LA FUNCION mdlValidarEmail
    }
?>
