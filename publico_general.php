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
		<div class="publico_general">
			PUBLICO EN GENERAL
		</div>
		
		<form id="form_general_publico" action="DefEntradaSalida.php" method="post">
			<div class="orden_check">
				<div class="pack_input_label">
					<input type="radio" id="entradaRadio" name="tipo" value="entrada" required checked>
					<label for="entradaRadio">Entrada</label>
				</div>
				<div class="pack_input_label">
					<input type="radio" id="salidaRadio" name="tipo" value="salida" >
					<label for="salidaRadio">Salida</label>
				</div>
			</div>
			<div id="OpcEntrada" class="entrada_ext">
				<span>Nombre: 
				<input type="txt" id="nombre_ext" class="nombre_prof" name="nombre_ext" autofocus required="required" onKeyUp="ConvertirMayusculas(this)" autocomplete="off"></span>
				<span>¿De qué instituto y/o ciudad nos visitas?
				<input type="txt" id="input_dep" class="input_dep" name="lugar" autofocus required="required" onKeyUp="ConvertirMayusculas(this)" placeholder="Instituto y/o Ciudad" ></span>
			</div>
			<div id="OpcSalida" class="salida_ext" hidden>
				<span>Pon tu número de registro:
				<input type="number" id="registro_ext" class="input_guia_num" name="registro_ext" min="0" autofocus required="required" autocomplete="off" placeholder="Número"></span>
			</div>
			<input type="submit" value="ENVIAR" id="env_dep" class="env_dep" name="env_dep" onclick="revisarFormularioGeneral('form_general_publico', 'env_dep')"/>
		</form>
		
		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		
	</body>
</html>