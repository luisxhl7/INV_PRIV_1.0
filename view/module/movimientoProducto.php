<?php 
	include("./bd/abrir_conexion.php");

    $fecha = $_POST["fecha"];
    $productos = $_POST["productos"];
    $codigo = $producto["codigo"];
    $unidades = $producto["unidades"];
    echo "<script>alert('probando si entra al modulo');</script>"; 


    $resultado = array();
    foreach ($productos as $producto) {
        $sql = "UPDATE producto SET Existencia = ".$unidades." WHERE Cod_Producto = '".$codigo."'";
            
        try {
            $resultados = mysqli_query($conexion, $sql);
            $rowsAffected = mysqli_affected_rows($conexion);
            $producto["vendido"] = $rowsAffected > 0? "si": "no";
            array_push($resultado, $producto);

        } catch (PDOException $e) {
            echo "ERROR!!".$e -> getMessage();
        }

    }
    $resultado = json_encode($resultado);
	echo $resultado;
    

  include("./bd/cerrar_conexion.php");

?>