/*-----------------------------------------------------------VALIDACION DE CAMPOS DE TEXTO DE EDITAR USUARIO-------------------------------------------------------------*/
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
  userName: /^[a-zA-Z0-9\_\-]{4,20}$/, // Letras, numeros, guion y guion_bajo
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
  apellido: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
  documento: /^\d{8,11}$/, // 7 a 11 numeros.
  telefono: /^[0-9\-]{7,20}$/, // numeros, guion
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  password: /^[a-zA-Z0-9\_\-]{4,20}$/, // Letras, numeros, guion y guion_bajo
}
const campos = {
  UserName: true,
  Nombre: true,
  Apellido: true,
  Documento: true,
  Telefono: true,
  Correo: true,
  Password: true
}

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "txtUserName":
      validarCampo(expresiones.userName, e.target, 'UserName');
      break;
    case "txtNombre":
      validarCampo(expresiones.nombre, e.target, 'Nombre');
      break;
    case "txtApellido":
      validarCampo(expresiones.apellido, e.target, 'Apellido');
      break;
    case "txtDocumento":
      validarCampo(expresiones.documento, e.target, 'Documento');
      break;
    case "txtTelefono":
      validarCampo(expresiones.telefono, e.target, 'Telefono');
      break;
    case "txtCorreo":
      validarCampo(expresiones.correo, e.target, 'Correo');
      break;
    case "txtPass":
      validarCampo(expresiones.password, e.target, 'Password');
      validarPassword2();
      break;
    case "txtPass2":
      validarPassword2();
      break;
  }
}
const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`grupo${campo}`).classList.remove('form-groun-incorrecto');
    document.getElementById(`grupo${campo}`).classList.add('form-groun-correcto');
    document.querySelector(`#grupo${campo} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo${campo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo${campo} .error`).classList.remove('error-activo');
    campos[campo] = true;
  } else {
    document.getElementById(`grupo${campo}`).classList.add('form-groun-incorrecto');
    document.getElementById(`grupo${campo}`).classList.remove('form-groun-correcto');
    document.querySelector(`#grupo${campo} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo${campo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo${campo} .error`).classList.add('error-activo');
    campos[campo] = false;
  }
}
const validarPassword2 = () => {
  const inputPassword1 = document.getElementById("txtPass");
  const inputPassword2 = document.getElementById("txtPass2");
  if (inputPassword1.value !== inputPassword2.value) {
    document.getElementById(`grupoPassword2`).classList.add('form-groun-incorrecto');
    document.getElementById(`grupoPassword2`).classList.remove('form-groun-correcto');
    document.querySelector(`#grupoPassword2 i`).classList.add('fa-times-circle');
    document.querySelector(`#grupoPassword2 i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupoPassword2 .error`).classList.add('error-activo');
    campos[Password] = false;
  } else {
    document.getElementById(`grupoPassword2`).classList.remove('form-groun-incorrecto');
    document.getElementById(`grupoPassword2`).classList.add('form-groun-correcto');
    document.querySelector(`#grupoPassword2 i`).classList.add('fa-check-circle');
    document.querySelector(`#grupoPassword2 i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupoPassword2 .error`).classList.remove('error-activo');
    campos[Password] = true;
  }
}

inputs.forEach((input) => {
  input.addEventListener('keyup', validarFormulario);
  input.addEventListener('blur', validarFormulario);

})

formulario.addEventListener('submit', (e) => {
  e.preventDefault();
  if (campos.UserName && campos.Nombre && campos.Apellido && campos.Documento && campos.Telefono && campos.Correo && campos.Password) {
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
        formulario.submit();
      }
    })
  } else {
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Datos incompletos',
      text: 'Verifica los campos',
      showConfirmButton: false,
      timer: 1500
    })
  }
})