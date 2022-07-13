function eliminar(CodProducto) {
    if (CodProducto.value != 0 ) {
        Swal.fire({
            title: 'ELIMINAR PRODUCTO',
            text: "Si eliminas el producto se perderan su datos por completo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location="index.php?ruta=menuProducto&codigo="+CodProducto.value;
            }
        })
    }else{
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Seleccione un producto',
            showConfirmButton: false,
            timer: 1500
        })  
    }
}
function editar(CodProducto){
    if(CodProducto.value != 0){
        window.location="index.php?ruta=editarProducto&codigo="+CodProducto.value;
      }else{
        Swal.fire({
          position: 'top-end',
          icon: 'warning',
          title: 'Seleccione un producto',
          showConfirmButton: false,
          timer: 1500
        })    
      }
}
function editarProducto(nombre, codigo, cantidad, precio, categoria, grupo, descripcion){
    Swal.fire({
        title: 'MODIFICAR USUARIO',
        text: "SEGURO QUE DESEA MODIFICAR EL USUARIO ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location="index.php?ruta=editarProducto&codigo="+codigo.value+"&nombre="+nombre.value+"&cantidad="+cantidad.value+"&precio="+precio.value+"&categoria="+categoria.value+"&grupo="+grupo.value+"&descripcion="+descripcion.value;
        }
      })
}