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

        public function __construct( $objUsuario ){  #Funcion para inicializar los atributos del modelo en variables
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

        /*                                                 FUNCIONES PRINCIPALES DEL CRUD                                                 */
        
        public function mdlCrearUsuario(){           #Funcion utilizada para registrar a un usuario
            $sql = "CALL SpInsertarUsuario  (?,?,?,?,?,?,?,?,?,?)"; //Procedimiento almacenado
            $this-> estado = false;

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

                $this-> estado = true;

            } catch (PDOException) {
                return $this -> estado;
            }
            return $this -> estado;

        }
        public function mdlEliminarUsuario(){        #Funcion utilizada para eliminar a un usuario puntual
            $sql = "CALL SpEliminarUsuario (?);";  //ELIMINAR
            $this -> estado = false;
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);
                $stmt -> execute();
                $this-> estado = true;

            } catch (PDOException $e) {
                echo "Error en el metodo Eliminar Usuario " . $e->getMessage();
            }
            return $this -> estado;
        }
        public function mdlModificarUsuario(){       #Funcion utilizada para Modificar los datos del usuario (nombre/apellido/nacimiento/telefono/correo/username/rol/contraseña)
            $sql = "CALL SpModificarUsuario (?,?,?,?,?,?,?,?,?,?)";  //MODIFICAR
            $this -> estado = false;
            
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
                
                $this-> estado = true;

            } catch (PDOException $e) {
                echo "Error al ejecutar la moificacion de datos " . $e->getMessage();
            }
            return $this -> estado;
        }
        public function mdlConsultarUsuario(){       #Funcion utilizada para visualizar a todos los usuarios y algunos de sus datos
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
        
        /*                                        DEMAS FUNCIONES CON POSIBILIDAD DE OPTIMIZACION                                         */

        public function mdlMostrarRol(){             #Funcion utilizada para visualizar a todos los tipos de roles registrados
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
        public function mdlMostrarDatosPModificar(){ #Funcion utilizada para visualizar los datos personales del usuario al momento de modificar
            $sql = "CALL SpMostrarDatos_P (?)";  //Pocedimiento almacenado
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);

                $stmt -> execute();
                $resulset = $stmt;

            } catch (PDOException $e) {
                echo "Error al ejecutar mdlEliminarUsuario " . $e->getMessage();
            }
            return $resulset;
        }
        public function mdlMostrarDatosUModificar(){ #Funcion utilizada para vizualizar los datos del usuario(ID/USERNAME/PASS/ROL)
            $sql = "CALL SpmostrarDatos_U (?)";  //Procedimiento almacenado
            
            try {
                $con = new conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->documento, PDO::PARAM_INT);

                $stmt -> execute();
                $resulset = $stmt;

            } catch (PDOException $e) {
                echo "Error al ejecutar mdlEliminarUsuario " . $e->getMessage();
            }
            return $resulset;
        }

        /*------------------------------------------------- MODIFICAR A PARTIR DE AQUI ----------------------------------------------------*/

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
