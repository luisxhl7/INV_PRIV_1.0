<?php
    class ControllerProductos{
        
        public function ctrCrearProducto($nombre, $cantidad, $precio, $categoria, $grupo, $descripcion, $imagen){           #Controlador de crear productos
            /*==========DOCUMENTACION================
                una vez capturados todos los datos de la vista se crea un objeto DTO y a su vez se instancia la clase de producto para
                capturar todos los parametros en esta clase
                luego se crea un objeto DAO en el cual se instancia ModeloProducto y se le envia un solo parametro el cual es el objeto DTO
                que contiene todos los parametros capturados previamente
                luegos se ejecuta la funcion del modelo llamada mdlCrearProducto, en caso de que este retornado un estado de true
                le enseñara al usuario una notificacion de exito en el procedimiento, de ser lo opuesto una notificacion de error
            =======================================*/
            try {
                //se instacia el Objeto DTO
                $objDtoProducto = new Producto();
                $objDtoProducto -> setNombre($nombre);
                $objDtoProducto -> setCantidad($cantidad);
                $objDtoProducto -> setPrecio($precio);
                $objDtoProducto -> setCategoria($categoria);
                $objDtoProducto -> setGrupo($grupo);
                $objDtoProducto -> setDescripcion($descripcion);
                $objDtoProducto -> setImagen($imagen);
                
                $objDaoProducto = new ModeloProducto($objDtoProducto);
                if ($objDaoProducto -> mdlCrearProducto() == true) {
                    echo "<script> 
                        Swal.fire({
                            icon: 'success',
                            iconColor: 'green',
                            title: 'EXITO',
                            text: 'Se registro con exito el producto',
                            background: 'url(view/img/fondo_de_interfacez.png) no-repeat',
                            confirmButtonText: 'ACEPTAR',
                            confirmButtonColor: 'rgb(139, 248, 50)',
                            timer: '7000',            //programar tiempo de visualizacion de la alerta
                            timerProgressBar: 'true', //visualizar tiempo de la alerta
                            showCloseButton: 'true',  //boton para cerrar alerta ubi (derecha superior)
                            customClass: {
                                popup: 'popup-class'
                            }
                        }) 
                    </script>";            
                }else {
                    echo "<script> 
                        Swal.fire({
                            icon: 'error',
                            iconColor: 'red',
                            title: 'ERROR',
                            text: 'Error al registrar el producto',
                            background: 'url(view/img/fondo_de_interfacez.png) no-repeat',
                            confirmButtonText: 'ACEPTAR',
                            confirmButtonColor: 'rgb(139, 248, 50)',
                            timer: '7000',            //programar tiempo de visualizacion de la alerta
                            timerProgressBar: 'true', //visualizar tiempo de la alerta
                            showCloseButton: 'true',  //boton para cerrar alerta ubi (derecha superior)
                            customClass: {
                                popup: 'popup-class'
                            }
                        }) 
                    </script>";
                }
            } catch (Exception $e) {
                echo "Error en el controlador ctrCrearProducto : ".$e->getMessage();
            }
                
        }//fin de la funcion ctrCrearProducto

        public function ctrConsultarProducto(){               #Controlador de mostrar todos los productos
            /*=================DOCUMENTACION================== 
                se crea una variable llamada lista con un estado false luego se crea un objeto DTO y se instancia la clase producto
                luego se crea un objeto DAO y se instancia la clase ModeloProducto se captura el DTO
                luego se utiliza la variable lista para capturar los tados que se retornaran en la funcion mdlConsultarProducto
                en caso de que si existan dtos los captura en un arreglo y los retorna, de lo contrario conservara el esta de false 
                y lo retornara
            ================================================*/
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlConsultarProducto() -> fetchAll();

            } catch (PDOException $e) {
                echo "Error en el controlador ctrConsultarProducto : ".$e->getMessage();
            }
            return $lista;
        }//fin de la funcion ctrConsultarProducto

        public function ctrEliminarProducto($codigo){         #Controlador de eliminar productos
            /*==========DOCUMENTACION================
                una vez capturado el dato de la vista se crea un objeto DTO y a su vez se instancia la clase de producto para
                captura el parametro en esta clase
                luego se crea un objeto DAO en el cual se instancia ModeloProducto y se le envia un solo parametro el cual es el objeto DTO
                que contiene el parametro capturado previamente
                luegos se ejecuta la funcion del modelo llamada mdlEliminarProducto, en caso de que este retornado un estado de true
                le enseñara al usuario una notificacion de exito en el procedimiento
            =======================================*/
            try {
                $objDtoProducto = new Producto();
                $objDtoProducto->setCodigo($codigo);
    
                $objDaoProducto = new ModeloProducto($objDtoProducto);
                if ($objDaoProducto -> mdlEliminarProducto() == true) {
                    echo"
                        <script>
                            Swal.fire({
                                title: 'Eliminado',
                                text: 'A partir de ahora este producto ya no se encuentra disponible en el aplicativo.',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'CONFIRMAR'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location='menuProducto';
                                }else{
                                    window.location='menuProducto';
                                }
                            })
                        </script>
                    ";
                }
            } catch (Exception $e) {
                echo "Error en el controlador ctrEliminarProducto : ".$e->getMessage();
            }

        }//fin de la funcion ctrEliminarProducto

        public function ctrModificarProducto($nombre, $codigo, $cantidad, $precio, $categoria, $grupo, $descripcion){        #Controlador de modificar productos
            /*==========DOCUMENTACION================
                una vez capturados todos los datos de la vista se crea un objeto DTO y a su vez se instancia la clase de producto para
                capturar todos los parametros en esta clase
                luego se crea un objeto DAO en el cual se instancia ModeloProducto y se le envia un solo parametro el cual es el objeto DTO
                que contiene todos los parametros capturados previamente
                luegos se ejecuta la funcion del modelo llamada mdlModificarProducto, en caso de que este retornado un estado de true
                le enseñara al usuario una notificacion de exito en el procedimiento
            =======================================*/
            try {
                //objeto DTO
                $objDtoProducto = new Producto();
                $objDtoProducto->setNombre($nombre);
                $objDtoProducto->setCodigo($codigo);
                $objDtoProducto->setCantidad($cantidad);
                $objDtoProducto->setPrecio($precio);
                $objDtoProducto->setCategoria($categoria);
                $objDtoProducto->setGrupo($grupo);  
                $objDtoProducto->setDescripcion($descripcion);

                //objeto DAO 
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                if ($objDaoProducto -> mdlModificarProducto() == true) {
                    echo"
                        <script>
                            Swal.fire({
                                title: 'EXTIO',
                                text: 'PRODUCTO MODIFICADO CON EXITO',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'CONFIRMAR'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location='menuProducto';
                                }else{
                                    window.location='menuProducto';
                                }
                            })
                        </script>
                    ";
                }
            } catch (Exception $e) {
                echo "Error en el controlador ctrModificarProducto : ".$e->getMessage();
            }        
        }//fin de la funcion ctrModificarProducto

        public function ctrMostrarGrupos(){                   #Controlador de mostrar los grupos de los productos
            /*=================DOCUMENTACION================== 
                se crea una variable llamada lista con un estado false luego se crea un objeto DTO y se instancia la clase producto
                luego se crea un objeto DAO y se instancia la clase ModeloProducto se captura el DTO
                luego se utiliza la variable lista para capturar los tados que se retornaran en la funcion mdlMostrarGrupos
                en caso de que si existan datos los captura en un arreglo y los retorna, de lo contrario conservara el estado de false 
                y lo retornara
            ================================================*/
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlMostrarGrupos() -> fetchAll();

            } catch (PDOException $e) {
                echo "Error en el controlador ctrMostrarGrupos : ".$e->getMessage();
            }
            return $lista;
        }//fin de la funcion ctrMostrarGrupos

        public function ctrMostrarCategorias(){               #Controlador de mostrar las categorias de los productos
            /*=================DOCUMENTACION================== 
                se crea una variable llamada lista con un estado false luego se crea un objeto DTO y se instancia la clase producto
                luego se crea un objeto DAO y se instancia la clase ModeloProducto se captura el DTO
                luego se utiliza la variable lista para capturar los tados que se retornaran en la funcion mdlMostrarCategorias
                en caso de que si existan datos los captura en un arreglo y los retorna, de lo contrario conservara el estado de false 
                y lo retornara
            ================================================*/
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlMostrarCategorias() -> fetchAll();

            } catch (PDOException $e) {
                echo "Error en el controlador ctrMostrarCategorias : ".$e->getMessage();
            }
            return $lista;
        }//fin de la funcion ctrMostrarCategorias
        
        public function ctrMostrarProductoModificar($codigo){ #Controlador de la vista de los datos del producto a modificar
            /*==========DOCUMENTACION================
                una vez capturado el dato de la vista se crea un objeto DTO y a su vez se instancia la clase de producto para
                captura el parametro en esta clase
                luego se crea un objeto DAO en el cual se instancia ModeloProducto y se le envia un solo parametro el cual es el objeto DTO
                que contiene el parametro capturado previamente
                luegos se ejecuta la funcion del modelo llamada mdlMostrarDatosProducto,la cual retorna los datos buscados por medio del
                parametro adquirido y returnandolos a la vista para poder ser modificados
            =======================================*/
            try {
                $objDtoProducto = new Producto();
                $objDtoProducto -> setCodigo($codigo);
    
                $objDaoProducto = new ModeloProducto($objDtoProducto);
                $datos = $objDaoProducto -> mdlMostrarDatosProducto() -> fetchAll();
            
            } catch (PDOException $e) {
                echo "Error en el controlador ctrMostrarProductoModificar: ".$e->getMessage();
            }
            return $datos;
            
        }//fin de la funcion ctrMostrarProductoModificar
    }
?>