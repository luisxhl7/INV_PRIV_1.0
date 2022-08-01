/*-----------------------------------------------------------VALIDACION DE CAMPOS DE TEXTO DE EDITAR USUARIO-------------------------------------------------------------*/
const formulario = document.getElementById('formCambiarPass');
const inputs = document.querySelectorAll('#formCambiarPass input');

const expresiones = {
  password: /^[a-zA-Z0-9\_\-]{4,20}$/, // Letras, numeros, guion y guion_bajo
}
const campos = {
  Password: false
}

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "txtPass1":
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
const inputPassword1 = document.getElementById("txtPass1");
const inputPassword2 = document.getElementById("txtPass2");
const validarPassword2 = () =>{
  if (inputPassword1.value !== inputPassword2.value) {
    document.getElementById(`grupoPassword2`).classList.add('form-groun-incorrecto');
    document.getElementById(`grupoPassword2`).classList.remove('form-groun-correcto');
    document.querySelector(`#grupoPassword2 i`).classList.add('fa-times-circle');
    document.querySelector(`#grupoPassword2 i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupoPassword2 .error`).classList.add('error-activo');
    campos[Password] = false;
  }else{
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
    if (campos.Password && inputPassword1.value == inputPassword2.value) {
        formulario.submit();
    }else {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Datos incompletos',
        text:'Verifica las contraseñas nuevas',
        showConfirmButton: false,
        timer: 1500
      })
    }
})