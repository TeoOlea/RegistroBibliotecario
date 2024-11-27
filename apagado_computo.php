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
			$_SESSION['equipo'] = $_POST['equipo_asig'];
		?>
			<br>
		</div>
		<div class="linea_azul"></div>
		<br>
		<form id="centro_computo" action="registro_computo.php" method="post">
			<span>Favor de no apagar los equipos de computo</span>
			<input type="submit" id="env_apag" class="env_apag" value="ENTENDIDO"/>
		</form>

		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		
	</body>
</html>