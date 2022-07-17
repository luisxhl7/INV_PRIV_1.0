<?php
    class ControllerProductos{
        
        public function ctrCrearProducto($nombre, $cantidad, $precio, $categoria, $grupo, $descripcion, $imagen){           #Controlador de crear productos

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
                            title: 'EXITO AL REGISTRAR',
                            text: 'SI SE PUDO HP :P.',
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
                            title: 'ERROR AL GUARDAR',
                            text: 'NO SE PUDO HP :P.',
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
                
        }
        public function ctrConsultarProducto(){               #Controlador de mostrar todos los productos
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlConsultarProducto() -> fetchAll();

            } catch (PDOException $e) {
                echo "Error en el controlador ctrConsultarProducto : ".$e->getMessage();
            }
            return $lista;
        }
        public function ctrEliminarProducto($codigo){         #Controlador de eliminar productos
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

        }
        public function ctrModificarProducto($nombre, $codigo, $cantidad, $precio, $categoria, $grupo, $descripcion){        #Controlador de modificar productos
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
        }
        public function ctrMostrarGrupos(){                   #Controlador de mostrar los grupos de los productos
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlMostrarGrupos() -> fetchAll();

            } catch (PDOException $e) {
                echo "Error en el controlador ctrMostrarGrupos : ".$e->getMessage();
            }
            return $lista;
        }
        public function ctrMostrarCategorias(){               #Controlador de mostrar las categorias de los productos
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlMostrarCategorias() -> fetchAll();

            } catch (PDOException $e) {
                echo "Error en el controlador ctrMostrarCategorias : ".$e->getMessage();
            }
            return $lista;
        }
        public function ctrMostrarProductoModificar($codigo){ #Controlador de la vista de los datos del producto a modificar
            try {
                $objDtoProducto = new Producto();
                $objDtoProducto -> setCodigo($codigo);
    
                $objDaoProducto = new ModeloProducto($objDtoProducto);
                $datos = $objDaoProducto -> mdlMostrarDatosProducto() -> fetchAll();
            
            } catch (PDOException $e) {
                echo "Error en el controlador ctrMostrarProductoModificar: ".$e->getMessage();
            }
            return $datos;
        }
    }
?>