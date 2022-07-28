/*FUNCION PARA PREVISUALIZAR IMAGENES */
const archivo = document.getElementById("imagen");
const boton = document.getElementById("boton");
boton.addEventListener("click", () =>{
    archivo.click();
});

let vista_preliminar = (event) => {
    let leer_img = new FileReader();
    let id_img = document.getElementById('img-imagen');
    leer_img.onload = () =>{
        if(leer_img.readyState == 2){
            id_img.src = leer_img.result;
        }
    }
    leer_img.readAsDataURL(event.target.files[0]);
}

/*-------------------------------------------------------VALIDACION DE CAMPOS DE TEXTO DE REGISTRAR USUARIO-------------------------------------------------------*/
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
  nombre: /^[a-zA-Z0-9\_\-]{4,20}$/, // Letras, numeros, guion y guion_bajo
  cantidad: /^\d{1,6}$/, // 7 a 11 numeros.
  precio: /^\d{2,9}$/, // 7 a 11 numeros.
}
const campos = {
  Nombre: true,
  Cantidad: true,
  Precio: true,
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
        Swal.fire({
            title: 'MODIFICAR PRODUCTO',
            text: "SEGURO QUE DESEA MODIFICAR EL PRODUCTO ?",
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