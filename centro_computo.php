<!DOCTYPE html>
<html>
	<head>
		<title>Centro de Computo BCU</title>
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
		<div class="header">
			<table>
				<tr>
					<th class="logo"><a href="centro_computo.php"><img src="images/uaem.png" alt="UAEM" title="UAEM" class="max"/></a></th>
					<th class="txt">Coordinación General de Planeación y Administración<br />
					   Dirección de Desarrollo de Institucional<br />
					   Dirección de Desarrollo de Bibliotecas<br />
					</th>
					<th class="logo"><img src="images/bcu.png" alt="BCU" title="BCU" class="max"/></th>
				</tr>
			</table>
		</div>
		
		<div class="welcome">
			Hola, bienvenido(a) al CENTRO de COMPUTO
			<br>
			<div class="info">
				Es necesario tu registro de <u class="resaltar_rojo">ENTRADA</u> y <u class="resaltar_rojo">SALIDA</u>
			</div>
		</div>
		<div class="linea_azul">
		</div>
		<br>
		<form id="centro_computo" action="proceso_computo.php" method="post">
			<div class="orden_check">
				<div class="pack_input_label">
					<input type="radio" id="internoComputo" name="tipo" value="interno" required checked>
					<label for="internoComputo">Interno</label>
				</div>
				<div class="pack_input_label">
					<input type="radio" id="externoComputo" name="tipo" value="externo" >
					<label for="externoComputo">Externo</label>
				</div>
			</div>
			<div id="computoInterno">
				<div class="espacio">Ingresa tu matricula</div>
				<input type="number" id="compu_matricula" class="input_comu" name="matr_computo" autofocus required placeholder="Matricula" >
			</div>
			<div id="computoExterno">
				<div class="espacio">Ingresa tu nombre completo</div>
				<input type="txt" id="compu_nombre" class="input_comu" name="nombre_computo" onKeyUp="ConvertirMayusculas(this)" autofocus required placeholder="Nombre completo de favor" >
			</div>
			<input type="submit" id="env_dep" class="env_dep" value="ENVIAR" onclick="revisarFormularioComputo('centro_computo', 'env_dep')"/>
		</form>

		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		
	</body>
</html>