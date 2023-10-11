
<?php
	include('../conexion.php');
	$conexion= conectaDB();

    if(isset($_POST['guardar'])){	

        $nombreProducto= $_POST['nombreProducto'];
        $precio=$_POST['precio']; 
        $exis= $_POST['existencia'];
        
        $SQLquery = "INSERT INTO tb_productos(Nombre, Precio, Ext) values('$nombreProducto',$precio,$exis)";

        $resultado = mysqli_query($conexion,$SQLquery);

        if($resultado){
             //echo "<script> alert('Producto registrado'); </script>"; me marca warning al momento de ponerlo en el host
            Header("Location: ../dashboard.php");
            exit;
        } else {
            echo "<script> alert('No se registro el producto, revise sus datos'); </script>";
        }

        //mysqli_free_result($resultado);
        mysqli_close($conexion);

    }

?>