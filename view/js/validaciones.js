function validar(e) {
    e.preventDefault();
    let rol = document.getElementById( "txtRol");
    let idUser = document.getElementById( "txtIdUser");
    let pass = document.getElementById( "txtLogin");
    
    let estado = true;

    if (rol.value == "") {
        rol.style.borderColor="red";
        estado = false;
    }else{
        rol.style.borderColor="greenyellow";
    }

    if (idUser.value == "") {
        idUser.style.borderColor="red";
        idUser.style.boxShadow="2px 2px 2px 2px red";
        estado = false;
    }else{
        idUser.style.borderColor="greenyellow";
        idUser.style.boxShadow="2px 2px 2px 2px greenyellow";
    }

    if (pass.value == "") {
        pass.style.borderColor="red";
        pass.style.boxShadow="2px 2px 2px 2px red";
        estado = false;
    }else{
        pass.style.borderColor="greenyellow";
        pass.style.boxShadow="2px 2px 2px 2px greenyellow";
    }
    if ( estado == true ) {
        formulario.submit();
    }
}

