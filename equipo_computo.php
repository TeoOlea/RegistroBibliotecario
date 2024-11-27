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
		<!--Plantilla del encabezado guardado en plantillas.js-->
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
			Bienvenido
			<br><?php
			session_start();
			include('conexion.php');
			if( $_SESSION['tipoComputo'] == "interno" ){
				echo $_SESSION['nombre'];
			}else if( $_SESSION['tipoComputo'] == "externo" ){
				echo $_SESSION['matricula'];
			}
		?>
			<br>
		</div>
		<div class="linea_azul"></div>
		<br>
		<form id="centro_computo" action="apagado_computo.php" method="post">
			<span>Equipo que se te asigna: 
			<input type="number" id="equipo_asig" class="input_guia_num" name="equipo_asig" min="0" autofocus required="required" autocomplete="off" placeholder="Número"></span>
			<input type="submit" id="env_dep" class="env_dep" value="ENVIAR" onclick="revisarFormularioComputo('centro_computo', 'env_dep')"/>
		</form>

		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		
	</body>
</html>