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
        window.location="index.php?ruta=admUsuario&documento="+documento.value;
      }
    })
  }else{
    Swal.fire({
      position: 'top-end',
      icon: 'warning',
      title: 'Seleccione un usuario',
      showConfirmButton: false,
      timer: 1500
    })  
  }
}
function editar(documento){
  if(documento.value != 0){
    window.location="index.php?ruta=editarUsuario&documento="+documento.value;
  }else{
    Swal.fire({
      position: 'top-end',
      icon: 'warning',
      title: 'Seleccione un usuario',
      showConfirmButton: false,
      timer: 1500
    })    
  }
}
function editarUsuario(userName,rol,nombre,apellido,documento,nacimiento,telefono,correo,pass1,pass2){
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
      window.location="index.php?ruta=editarUsuario&documento="+documento.value+"&userName="+userName.value+"&rol="+rol.value+"&nombre="+nombre.value+"&apellido="+apellido.value+"&nacimiento="+nacimiento.value+"&telefono="+telefono.value+"&correo="+correo.value+"&pass1="+pass1.value+"&pass2="+pass2.value;
    }
  })
}
