function eliminar(documento){
/*==================DOCUMENTACION==================
    Se crea una funcion en el cual al darle al boton de eleiminar se ejecuta un onclik el cual si tiene un valor
    le enseñara al usuario una alerta de confirmacion en la cual si el usuairo selecciona confirmar se agregara
    a la URL el documento, de esta forma se ejecutara una condicion la cual si existe en la URL un codigo ejecutara el
    controlador por poder eliminar el producto
  ===================================================*/
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

/*-------------------------------------------------------VALIDACION DE CAMPOS DE TEXTO DE REGISTRAR USUARIO-------------------------------------------------------*/
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
  //por medio de las expresiones se decide que tipo de datos son validos en cada campo
  userName: /^[a-zA-Z0-9\_\-]{4,20}$/, // Letras, numeros, guion y guion_bajo
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
  apellido: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
  documento: /^\d{8,11}$/, // 7 a 11 numeros.
  telefono: /^[0-9\-]{7,20}$/, // numeros, guion
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  password: /^[a-zA-Z0-9\_\-]{4,20}$/, // Letras, numeros, guion y guion_bajo
}
const campos = {
  //se asignan estados iniciales en cada uno de los input, en caso de que cumplan con las expresiones seran cambiados
  UserName: false,
  Nombre: false,
  Apellido: false,
  Documento: false,
  Telefono: false,
  Correo: false,
  Password: false
}

const validarFormulario = (e) => {
  //dependiendo de el input en el que se encuentre se activara un case y ejecutara la funcion con su propios parametros
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
    /*en caso de que su contenido sea valido a agregaran elementos ocultos que se encuentran en el div y a su vez unos seran removidos
    y la posision del arreglo tendra un estado de true */
    document.getElementById(`grupo${campo}`).classList.remove('form-groun-incorrecto');
    document.getElementById(`grupo${campo}`).classList.add('form-groun-correcto');
    document.querySelector(`#grupo${campo} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo${campo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo${campo} .error`).classList.remove('error-activo');
    campos[campo] = true;
  } else {
    /*en caso de que su contenido sea erroneo a agregaran elementos ocultos que se encuentran en el div y la posision del areglo tendra
    un estado de false */
    document.getElementById(`grupo${campo}`).classList.add('form-groun-incorrecto');
    document.getElementById(`grupo${campo}`).classList.remove('form-groun-correcto');
    document.querySelector(`#grupo${campo} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo${campo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo${campo} .error`).classList.add('error-activo');
    campos[campo] = false;
  }
}
const validarPassword2 = () =>{
  const inputPassword1 = document.getElementById("txtPass");
  const inputPassword2 = document.getElementById("txtPass2");
  if (inputPassword1.value !== inputPassword2.value) {
    /*en caso de que su contenido sea erroneo a agregaran elementos ocultos que se encuentran en el div y la posision del areglo tendra
    un estado de false */
    document.getElementById(`grupoPassword2`).classList.add('form-groun-incorrecto');
    document.getElementById(`grupoPassword2`).classList.remove('form-groun-correcto');
    document.querySelector(`#grupoPassword2 i`).classList.add('fa-times-circle');
    document.querySelector(`#grupoPassword2 i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupoPassword2 .error`).classList.add('error-activo');
    campos[Password] = false;
  }else{
    /*en caso de que su contenido sea valido a agregaran elementos ocultos que se encuentran en el div y a su vez unos seran removidos
    y la posision del arreglo tendra un estado de true */
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
  /*se creara un evento en el cual se bloqueara el boton submit y se creara una condicion en la cual si todos los elementos del arreglo 
  tienen un estado de true se ejecutara el boton submit */
  e.preventDefault();
  if (campos.UserName && campos.Nombre && campos.Apellido && campos.Documento && campos.Telefono && campos.Correo && campos.Password) {
    formulario.submit();
  }else {
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Datos incompletos',
      text:'Verifica los campos',
      showConfirmButton: false,
      timer: 1500
    })
  }
})
/*-------------------------------------------------- FINAL DE VALIDACION DE CAMPOS DE TEXTO DE REGISTRAR USUARIO--------------------------------------------------*/



