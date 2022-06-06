<?php
    class ControllerProductos{
        public function ctrCrearProducto($nombreProducto, $grupo, $categoria, $precio, $descripcion, $cantidad){

            try {
                //se instacia el Objeto DTO
                $objDtoProducto = new Producto();
                $objDtoProducto -> setNombreProducto($nombreProducto);
                $objDtoProducto -> setGrupo($grupo);
                $objDtoProducto -> setCategoria($categoria);
                $objDtoProducto -> setPrecio($precio);
                $objDtoProducto -> setDescripcion($descripcion);
                $objDtoProducto -> setCantidad($cantidad);
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

    }
?>