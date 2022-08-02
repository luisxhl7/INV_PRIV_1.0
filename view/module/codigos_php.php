<?php
	if(isset($_POST['buscar'])){
    	$Cod_Producto = $_POST['Cod_Producto'];
		
		$conexion = new mysqli("localhost","root","","invpriv");
		$sql = "CALL SpMostrarDatosProducto(".$Cod_Producto.")";
		$resultados = mysqli_query($conexion, $sql);

    	$valores = array();
    	$valores['existe'] = "0";
		while($consulta = mysqli_fetch_array($resultados)){
		  	$valores['existe'] = "1";
		  	$valores['Nombre'] = $consulta['Nombre'];
		  	$valores['Precio'] = $consulta['Precio'];
		  	$valores['Grupo'] = $consulta['Cod_Grupo'];
            $valores['Categoria'] = $consulta['Cod_Categoria'];
		  	$valores['Existencia'] = $consulta['Existencia'];
		}

		sleep(0); // medidor de tiempo de espera para cargar los datos
		$valores = json_encode($valores);
		echo $valores;
    }
?>