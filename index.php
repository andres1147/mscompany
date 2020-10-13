<?php
	require ('conexion.php');
	
	$query = "SELECT * FROM `ms_location` WHERE id_parent IS NULL ORDER BY nombre";
	$resultado=$mysqli->query($query);
?>

<html>
	<head>
		<title>ComboBox Ajax, PHP y MySQL</title>
		
		<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_departamento").change(function () {
					$("#cbx_departamento option:selected").each(function () {
						id_location = $(this).val();
						$.post("includes/getLocation.php", { id_location: id_location }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
		</script>
		
	</head>
	
	<body>
		<form id="combo" name="combo" action="guarda.php" method="POST">
			<div>Selecciona Departamento : <select name="cbx_departamento" id="cbx_departamento">
				<option value="0">Seleccionar Depto</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['id_location']; ?>"><?php echo $row['nombre']; ?></option>
				<?php } ?>
			</select></div>
			
			<br />
			
			<div>Selecciona Municipio : <select name="cbx_municipio" id="cbx_municipio"></select></div>
			<br />
			<input type="submit" id="enviar" name="enviar" value="Guardar" />
		</form>
	</body>
</html>
