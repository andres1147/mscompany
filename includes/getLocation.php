<?php
	
	require ('../conexion.php');
	
	$id_location = $_POST['id_location'];

	$queryM = "SELECT id_location, nombre FROM ms_location WHERE id_parent = $id_location ORDER BY nombre";
	$resultadoM = $mysqli->query($queryM);
	
	//$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_location']."'>".$rowM['nombre']."</option>";
	}
	echo $html;
?>		