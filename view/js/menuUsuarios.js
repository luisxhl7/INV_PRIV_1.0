function eliminar(documento){
    if (documento.value != 0 ) {
        Swal.fire({
            title: 'ELIMINAR USUARIO',
            text: "Si eliminas el usuario se perderan su datos por completo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Eliminado',
                'A partir de ahora este usuario ya no podre utilizar el aplicativo.',
                'success'
              )
              window.location="index.php?ruta=admUsuario&documento="+documento.value;
            }
        })
    }
}