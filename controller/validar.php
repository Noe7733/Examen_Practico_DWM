<?php

	include('../conexion.php');
	$conexion = conectaDB();

	if(isset($_GET['loginUsername']) && isset($_GET['loginPassword'])){
		$usuario = $_GET['loginUsername'];
		$contra = $_GET['loginPassword'];

		$sql="SELECT COUNT(*) from tb_usuarios WHERE NomUser= '$usuario' AND Passwd='$contra'";
		$resultado = mysqli_query($conexion,$sql);

		$res = 0;
		while($fila = mysqli_fetch_row($resultado)){
			$res = $fila[0];
		}

		if($res == 1 && $resultado == true){
			session_start();
			$_SESSION['login'] = "true";
			$_SESSION['nomusuario'] = $usuario;
			echo json_encode(array('success' => 1));
		}else{
			echo json_encode(array('success' => 0));
		}
		
		mysqli_free_result($resultado);
		mysqli_close($conexion);
	} 
?>
