<!DOCTYPE html>
<html>
	<head>
		<title>Registro Comunidad UAEM</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="js/functions.js"></script>
		<script src="js/plantillas.js"></script>
	</head>
	
	<body>
		<!--Plantilla del encabezado guardado en plantillas.js-->
		<script>hacerEncabezado();</script>
		
		<div class="welcome">
			BIENVENIDO (A)
			<div class="info">
				Es necesario tu registro de <u class="resaltar">ENTRADA</u> y <u class="resaltar">SALIDA</u>
			</div>
		</div>
		<div class="linea_azul">
		</div>
		<div class="publico_general">
			COMUNIDAD UAEM
		</div>
		<div>
			<form id="comunidad" action="proceso.php" method="post">
				<div class="espacio">Escanea tu código de barras o ingresa tu matrícula</div>
				<input type="txt" id="input_comu" class="input_comu" name="user" autofocus required="required" onKeyUp="ConvertirMayusculasSinEspacios(this)" placeholder="Escanea o digita tu matrícula" >
				<input type="submit" id="env_dep" class="env_dep" value="ENVIAR" onclick="revisarFormulario('comunidad', 'env_dep')"/>
			</form>
		</div>

		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		
	</body>
</html>