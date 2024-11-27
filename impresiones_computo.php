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
		</div>
		<div class="linea_azul"></div>
		<br>
		<form id="centro_computo" action="salida_computo.php" method="post">
			<span>¿Usaste el servicio de impresión?:
				<div class="impresion_check">
					<div class="pack_input_label">
						<input type="radio" id="SiRadio" name="tipo" value="SI" required>
						<label for="SiRadio">SI</label>
					</div>
					<div class="pack_input_label">
						<input type="radio" id="NoRadio" name="tipo" value="NO" required>
						<label for="NoRadio">NO</label>
					</div>
				</div>
			</span>
			<div id="Opc_SiImpresion">
				<span>¿Cuántas impresiones hiciste?: 
				<input type="number" id="num_impresiones" class="input_guia_num" name="num_impresiones" min="0" autofocus required autocomplete="off" placeholder="Número"></span>
			</div>
			<input type="submit" id="env_dep" class="env_dep" value="ENVIAR" onclick="revisarFormularioComputo('centro_computo', 'env_dep')"/>
		</form>

		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		
	</body>
</html>