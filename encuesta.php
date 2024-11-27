<!DOCTYPE html>
<html>
	<head>
		<title>Encuesta</title>
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
			ENCUESTA DE SERVICIO
			<div class="info">
				¿Qué te pareció el servicio que utilizaste?
			</div>
		</div>
		<div class="linea_azul"></div>
		<form id="form_enc" name="form_enc" method="post" action="salida.php">
			<div class="encuesta">
				<label>
					<img src="images/cbuena.png" alt="Buena">
					<input type="radio" name="opinion" value="Buena">
				</label>
				<label>
					<img src="images/cregular.png" alt="Regular">
					<input type="radio" name="opinion" value="Regular">
				</label>
				<label>
					<img src="images/cmala.png" alt="Mala">
					<input type="radio" name="opinion" value="Mala">
				</label>
			</div>
			<div style="width:auto; text-align:center;">
				<input type="submit" class="env_enc" value="ENVIAR"/>
			</div>
		</form>
		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		<audio autoplay>
			<source src="music/timbrado.mp3">
			Tu navegador no es compatible con el audio en HTML5
		</audio>
	</body>
</html>