<?php
	
	require ('../conexion.php');
	
	$id_location = $_POST['id_location'];

	$queryM = "SELECT nombre, adress, opening_hours FROM ms_retail WHERE id_parent = $id_location ORDER BY nombre";
	$resultadoM = $mysqli->query($queryM);
	
	//$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_location']."'>".$rowM['nombre']."</option>";
	}
	echo $html;
?>		