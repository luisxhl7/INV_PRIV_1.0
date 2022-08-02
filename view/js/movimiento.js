/*Funcion para ir a validar */
$('#cont-validar').hide(0);

$('#boton-validar').click(function(){
    $("#cont-movimiento").fadeOut(function(){
        $("#cont-validar").fadeIn(1000);
    });
});

$('#boton-movimiento').click(function(){
    $('#cont-validar').fadeOut(function(){
        $("#cont-movimiento").fadeIn(1000);
    });
});

/*==================================FUNCION DE AGREGAR LOS PRODUCTOS EN LA TABLA======================================*/
var productos = []
function agregarProducto() {
productoNombre = $("#txtNombre").val();
    productoPrecio = $("#txtPrecio").val();
    productoGrupo = $("#txtGrupo").val();
    productoCategoria = $("#txtCategoria").val();
    productoExistencia = $("#txtExistencia").val();
    productoUnidades = $("#txtUnidades").val();
    productoCodigo = $("#Cod_Producto").val();
    

productos.push({
    nombre: productoNombre,
    precio: productoPrecio,
    grupo: productoGrupo,
    categoria: productoCategoria,
    existencia: productoExistencia,
    unidades: productoUnidades,
    codigo: productoCodigo
    });
$("#contenidoProductos").append( 
        "<tr>" + 
        "    <td>" + productoCodigo + "</td>" + 
        "    <td>" + productoNombre + "</td>" + 
        "    <td>" + productoGrupo + "</td>" + 
        "    <td>" + productoCategoria + "</td>" + 
        "    <td>" + productoNombre + "</td>" + 
        "    <td>" + productoUnidades + "</td>" + 
        "    <td>" + productoUnidades * productoPrecio + "</td>" + 
        "</tr>"
    );
}

/*==================================FUNCION PARA GUARDAR LOS CAMBIOS EN LA BASE DE DATOS======================================*/
function guardarCambios(){
                
    var parametros = {
        "fecha": new Date(),
        "productos": productos
    };
    
    $.ajax(
    {
    data:  parametros,
    dataType: 'json',
    url:   'http://localhost/INV_PRIV_1.0/view/module/movimientoProducto.php',
    type:  'post',
    beforeSend: function() 
    {
        $('.formulario').hide();
        $('.cargando').show();
        
    }, 
    error: function(err)
    {alert("Error al guardar cambios");
    console.log(err);},
    complete: function() 
    {
        $('.formulario').show();
        $('.cargando').hide();
    
    },
    success:  function (valores) 
    {
        console.log(valores);
    }
    }) 
} //fin de la funcion

/************************************FUNCION PARA BUSCAR LOS DATOS DEL PRODUCTO*********************************************** */
$(document).ready(function(){
    $('.cargando').hide();
});  

function buscar_datos()
{
Cod_Producto = $("#Cod_Producto").val();
console.log(Cod_Producto)


var parametros = 
{
  "buscar": "1",
  "Cod_Producto" : Cod_Producto
};

$.ajax(
{
  data:  parametros,
  dataType: 'json',
  url:   'http://localhost/INV_PRIV_1.0/view/module/codigos_php.php',
  type:  'post',
  beforeSend: function() 
  {
    $('.formulario').hide();
    $('.cargando').show();
    
  }, 
  error: function()
  {alert("Error al buscar el producto");},
  complete: function() 
  {
    $('.formulario').show();
    $('.cargando').hide();
   
  },
  success:  function (valores) 
  {
    //console.log(texto);
    if(valores.existe=="1") //Aqui usamos la variable que NO use en el vídeo
    {
      $("#txtNombre").val(valores.Nombre);
      $("#txtPrecio").val(valores.Precio);
      $("#txtGrupo").val(valores.Grupo);
      $("#txtCategoria").val(valores.Categoria);
      $("#txtExistencia").val(valores.Existencia);
    }
    else
    {
      alert("El producto no existe, ¡Crealo!")
    }

  }
}) 
}

function limpiar()
{
$("#txtNombre").val("");
$("#txtPrecio").val("");
$("#txtGrupo").val("");
$("#txtCategoria").val("");
$("#txtExistencia").val(valores.Existencia);
}

function guardar()
{
var parametros = 
{
  "guardar": "1",
  "Cod_Producto" : $("#Cod_Producto").val(),
  "Nombre" : $("#txt.Nombre").val(),
  "Precio" : $("#txtPrecio").val(),
  "Grupo" : $("#txtGrupo").val(),
  "Categoria" : $("#txtCategoria").val(),
  "Existencia" : $("#txtExistencia").val()
};
$.ajax(
{
  data:  parametros,
  url:   'codigos_php.php',
  type:  'post',
  beforeSend: function() 
  {
    $('.formulario').hide();
    $('.cargando').show();
    
  }, 
  error: function()
  {alert("Error");},
  complete: function() 
  {
    $('.formulario').show();
    $('.cargando').hide();
   
  },
  success:  function (mensaje) 
  {$('.resultados').html(mensaje);}
}) 
limpiar();
}