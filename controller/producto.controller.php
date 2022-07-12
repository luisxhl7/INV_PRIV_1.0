<?php
    class ControllerProductos{
        public function ctrCrearProducto($nombre, $cantidad, $precio, $categoria, $grupo, $descripcion){

            try {
                //se instacia el Objeto DTO
                $objDtoProducto = new Producto();
                $objDtoProducto -> setNombre($nombre);
                $objDtoProducto -> setCantidad($cantidad);
                $objDtoProducto -> setPrecio($precio);
                $objDtoProducto -> setCategoria($categoria);
                $objDtoProducto -> setGrupo($grupo);
                $objDtoProducto -> setDescripcion($descripcion);
                /*$objDtoProducto -> setImagen($imagen);*/
                
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
                echo "Error en el controlador insertar: ".$e->getMessage();
            }
                
        }
        public function ctrConsultarProducto(){
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlConsultarProducto() -> fetchAll();

            } catch (PDOException $e) {
                echo "error al consultar producto" . $e -> getMessage();
            }
            return $lista;
        }
        public function ctrEliminarProducto($codigo){  #Controlador de eliminar producto
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

        }
        public function ctrMostrarGrupos(){
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlMostrarGrupos() -> fetchAll();

            } catch (PDOException $e) {
                echo "error al consultar producto" . $e -> getMessage();
            }
            return $lista;
        }
        public function ctrMostrarCategorias(){
            $lista = false;
            try {
                $objDtoProducto = new Producto();
                $objDaoProducto = new ModeloProducto( $objDtoProducto );
                $lista = $objDaoProducto -> mdlMostrarCategorias() -> fetchAll();

            } catch (PDOException $e) {
                echo "error al consultar producto" . $e -> getMessage();
            }
            return $lista;
        }
    }
?>