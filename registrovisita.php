<!DOCTYPE html>
<html>
	<head>
		<title>Bienvenido</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<script src="js/plantillas.js"></script>
	</head>
	<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=index.php">
	<body>
	
		<!--Plantilla del encabezado guardado en plantillas.js-->
		<script>hacerEncabezado();</script>
		<div class="clearfix">
			<div class="content column01">
				<?php
					session_start();
					
					$nombre = $_POST['nombre_prof'];
					$tipo = $_POST['tipo'];
					$cantidad = $_POST['input_guia_num'];
					
					if( isset($_POST['nombre_prof']) && !empty($_POST['nombre_prof']) ){
						include('conexion.php');
						$mysqli =new mysqli ($host,$user,$pw, $db);
						$mysqli->set_charset("utf8");
						$hoy = new DateTime('now', new DateTimeZone('America/Mexico_City'));
						$hoy->modify('-1 hours');
						$fecha_hoy = $hoy->format('Y-m-d H:i:s');
						if( $tipo == "interno" ){
							$Uni_aca_lugar = $_POST['uni_aca_guia'];
							$sql1 = "INSERT INTO vis_guiadas (nombreprof, iduni_acavis, lugar_visita, cantidad_alumnos) VALUES( '$nombre', '$Uni_aca_lugar', '', $cantidad)";
						}else if( $tipo == "externo" ){
							$Uni_aca_lugar = $_POST['lugar'];
							$sql1 = "INSERT INTO vis_guiadas (nombreprof, iduni_acavis, lugar_visita, cantidad_alumnos) VALUES( '$nombre', '0', '$Uni_aca_lugar', $cantidad)";
						}
						mysqli_query( $mysqli, $sql1 );
						echo '<h1>Gracias por registrarse. Bienvenidos a la biblioteca</h1>';
						session_destroy();
						echo '<a href="index.php">Regresar</a>';
						
					}else{
						$_SESSION['mensaje']='Verifica los datos';
						header("Location: error.php"); 
						exit;//acuerdate de esta linea please
					}
				?>
			</div>
		</div>
		
		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		
		<audio autoplay>
			<source src="music/acierto.mp3">
			Tu navegador no es compatible con el audio en HTML5
		</audio>
	</body>
</html>