const calcular = () => {
    //esta funcion permite comparar el valor del inventario fisico con el teorico y reflejar su estado
    try {
        const undTeoricas = parseFloat(document.querySelector("#unidadesTeoricas").value) || 0;
        const undFisicas = parseFloat(document.querySelector("#unidadesFisicas").value) || 0;

        document.getElementById("diferencia").value = undTeoricas - undFisicas;

        if (document.getElementById("diferencia").value < 0) {
            document.getElementById("diferencia").classList.remove('campoNum');
            document.getElementById("diferencia").classList.remove('unidades-perfectas');
            document.getElementById("diferencia").classList.remove('unidades-sobran');
            document.getElementById("diferencia").classList.add('unidades-faltan');

        }if(document.getElementById("diferencia").value == 0) {
            document.getElementById("diferencia").classList.remove('campoNum');
            document.getElementById("diferencia").classList.remove('unidades-sobran');
            document.getElementById("diferencia").classList.remove('unidades-faltan');
            document.getElementById("diferencia").classList.add('unidades-perfectas');

        }if (document.getElementById("diferencia").value > 0) {
            document.getElementById("diferencia").classList.remove('campoNum');
            document.getElementById("diferencia").classList.remove('unidades-perfectas');
            document.getElementById("diferencia").classList.remove('unidades-faltan');
            document.getElementById("diferencia").classList.add('unidades-sobran');
        }
    }catch(e){  
    }
}

const clonar = () => {
    //esta funcion permite agregar el valor seleccionado a un input diferente en la interfaz de validar
    const undFisicas = parseFloat(document.querySelector("#unidadesFisicas").value);
    document.getElementById("diferencia").value = undFisicas;
}