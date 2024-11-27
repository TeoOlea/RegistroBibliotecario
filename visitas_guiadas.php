<!DOCTYPE html>
<html>
	<head>
		<title>Registro Publico en General</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
		
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="js/functions.js"></script>
		<script src="js/plantillas.js"></script>
	</head>
	
	<body>
		<!--Plantilla del encabezado guardado en plantillas.js-->
		<script>hacerEncabezado();</script>
		
		<?php 
			session_start();
			include('conexion.php');
			$mysqli =new mysqli ($host,$user,$pw, $db);
			$mysqli->set_charset("utf8");
		?>

		<div class="welcome">
			BIENVENIDO (A)
		</div>
		<div class="linea_azul">
		</div>
		<div class="visita_guiada">
			VISITA GUIADA
		</div>
		
		<form id="form_guiada" action="registrovisita.php" method="post">
			<span>Nombre del Profesor: 
			<input type="txt" id="nombre_prof" class="nombre_prof" name="nombre_prof" autofocus required="required" onKeyUp="ConvertirMayusculas(this)" placeholder="Nombre Completo" autocomplete="off"></span>
			<!-- -->
			<span><label for="opcion">¿Eres Comunidad UAEM?</label>
			<input type="radio" id="internoRadio" name="tipo" value="interno" required>
			<label for="internoRadio">SI</label>

			<input type="radio" id="externoRadio" name="tipo" value="externo" >
			<label for="externoRadio">NO</label></span>
			<!-- -->
			<div id="OpcInterna" class="diseñoInterna">
				<span><label>Unidad Académica: </label>
				<select name="uni_aca_guia" id="uni_aca_guia" class="uni_aca_guia" placeholder="Elige una unidad academica" >
					<option value="" selected>Seleccione:</option>
					<option value=0>NO APLICA</option>
					<?php
						$sqlquery1 = "SELECT * FROM uniacademica ORDER BY nom_uniaca ASC";
						$query = $mysqli->query($sqlquery1);
						
						while( $tabla_uniacad = mysqli_fetch_array($query) ){
							if( $tabla_uniacad['IDuniaca'] != 0 )
								echo "<option value='".$tabla_uniacad['IDuniaca']."'>".$tabla_uniacad['nom_uniaca']."</option>";
						}
					?>
				</select></span>
			</div>
			<div id="OpcExterna" class="diseñoExterna">
				<span>¿De qué instituto y/o ciudad nos visitas?
				<input type="txt" id="input_dep" class="input_dep" name="lugar" onKeyUp="ConvertirMayusculas(this)" placeholder="Instituto y/o Ciudad" ></span>
			</div>
			<span>¿Cuántos alumnos asisten? 
			<input type="number" id="input_guia_num" class="input_guia_num" name="input_guia_num" min="0" required placeholder="Cantidad" autocomplete="off" pattern="\d*" onkeypress="return validarNumero(event)"></span>
			
			<input type="submit" value="ENVIAR" id="env_dep" class="env_dep" name="env_dep" onclick="revisarFormulario('form_guiada', 'env_dep')"/>
		</form>
		
		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		
	</body>
</html>
