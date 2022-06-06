<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="view/css/FondoInterfazes.css">
        <link rel="stylesheet" href="view/css/EstiloUsuario.css">
    </head>

    <body class="interfazGeneral">
        <div class ="ContForm">
            <div class="titulo">
                <h1>EDITAR  USUARIO</h1>
            </div>
            <form action="">
                <div class="ContUser">
                    <label for="" class= "txt">ID:</label>
                    <input type="text" name="" id="" placeholder= "ID USUARIO" class ="campT ID">
                    
                    <label for="" class= "txt">ROL:</label>
                    <select name="" id="" class="BarraRoles">
                        <option value="">Seleccione Rol</option>
                        <option value="">ADMINISTRADOR</option>
                        <option value="">USUARIO</option>
                        <option value="">VISITANTE</option>
                    </select>
                </div>
                <div class="ContData">
                    <div>
                        <label for="" class= "txt">NOMBRE:</label>
                        <input type="text" name="" id="" placeholder= "Ingrese nombre" class ="campT nombre">
                        
                        <label for="" class= "txt">APELLIDO:</label>
                        <input type="text" name="" id="" placeholder= "Ingrese apellido" class ="campT apellido">
                        
                    </div>
                    <div>
                        <label for="" class= "txt">DOCUMENTO:</label>
                        <input type="number" name="" id="" placeholder= "Ingrese documento" class ="campT documento">
                        
                        <label for="" class= "txt">NACIMIENTO:</label>
                        <input type="text" name="" id="" placeholder= "Ingrese fecha de nacimiento" class ="campT fechaNacimiento">
                    </div>
                    <div>
                        <label for="" class= "txt">TELEFONO:</label>
                        <input type="number" name="" id="" placeholder= "Ingrese telefono" class ="campT telefono">
                        
                        <label for="" class= "txt">CORREO:</label>
                        <input type="email" name="" id="" placeholder= "Ingrese correo" class ="campT correo">
                    </div>
                    <div>
                        <label for="" class= "txt">CONTRASEÑA:</label>
                        <input type="password" name="" id="" class="campT password" placeholder="Ingrese contraseña">
                        <label for="" class= "txt">CONTRASEÑA:</label>
                        <input type="password" name="" id="" class="campT password" placeholder="Ingrese nuevamente contraseña">
                    </div>
                </div>
                <div class="contBtn">
                    <input type="submit" value="GUARDAR" class="btnGuardar">
                </div>
            </form>
        </div>
    </body>
</html>