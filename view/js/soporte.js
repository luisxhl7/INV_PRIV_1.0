/*===============================FUNCION DE NOTIFICACION DE CORREO ENVIADO ===============================*/
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
function enviarCorreo() {
  Swal.fire({
    title: 'EXTIO',
    text: "Tu correo a sido enviado con exito",
    icon: 'success',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'OK'
  }).then((result) => {
    if (result.isConfirmed) {
      formulario.submit();
    } else {
      formulario.submit();
    }
  })
}