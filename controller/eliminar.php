<?php

    include('../conexion.php');
    $conexion = conectaDB();

    if(isset($_GET['idPro']) && is_numeric($_GET['idPro'])){	
        $idPro = $_GET['idPro']; //declaro variable con el valor obtenido

        $SQLquery = "DELETE from tb_productos WHERE idPro=$idPro";

        $resultado = mysqli_query($conexion,$SQLquery);

        if($resultado){
            Header("Location: ../dashboard.php");
        } else {
            echo "<script> alert('Algo salio mal, intentalo de nuevo'); </script>";
        }

        mysqli_free_result($resultado);
        mysqli_close($conexion);

    }

?>