function eliminar(CodProducto) {
  /*==================DOCUMENTACION==================
    Se crea una funcion en el cual al darle al boton de eleiminar se ejecuta un onclik el cual si tiene un valor
    le enseñara al usuario una alerta de confirmacion en la cual si el usuairo selecciona confirmar se agregara
    a la URL el codigo, de esta forma se ejecutara una condicion la cual si existe en la URL un codigo ejecutara el
    controlador por poder eliminar el producto
  ===================================================*/
  if (CodProducto.value != 0) {
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
        window.location = "index.php?ruta=menuProducto&codigo=" + CodProducto.value;
      }
    })
  } else {
    Swal.fire({
      position: 'top-end',
      icon: 'warning',
      title: 'Seleccione un producto',
      showConfirmButton: false,
      timer: 1500
    })
  }
}

/*------------------------------------------------------------ FUNCION PARA PREVISUALIZAR IMAGENES ------------------------------------------------------------*/
const archivo = document.getElementById("imagen");
const boton = document.getElementById("boton");
boton.addEventListener("click", () => {
  archivo.click();
});

let vista_preliminar = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById('img-imagen');
  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  }
  leer_img.readAsDataURL(event.target.files[0]);
}

/*-------------------------------------------------------VALIDACION DE CAMPOS DE TEXTO DE REGISTRAR USUARIO-------------------------------------------------------*/
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
  //por medio de las expresiones se decide que tipo de datos son validos en cada campo
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
  cantidad: /^\d{1,6}$/, // 7 a 11 numeros.
  precio: /^\d{2,9}$/, // 7 a 11 numeros.
}
const campos = {
  //se asignan estados iniciales en cada uno de los input, en caso de que cumplan con las expresiones seran cambiados
  Nombre: false,
  Cantidad: false,
  Precio: false,
}

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "txtNombre":
      validarCampo(expresiones.nombre, e.target, 'Nombre');
      break;
    case "txtCantidad":
      validarCampo(expresiones.cantidad, e.target, 'Cantidad');
      break;
    case "txtPrecio":
      validarCampo(expresiones.precio, e.target, 'Precio');
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

inputs.forEach((input) => {
  input.addEventListener('keyup', validarFormulario);
  input.addEventListener('blur', validarFormulario);

})
formulario.addEventListener('submit', (e) => {
  e.preventDefault();
  if (campos.Nombre && campos.Cantidad && campos.Precio) {
    formulario.submit();
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