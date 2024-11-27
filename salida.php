<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bibli.css"> 
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<script src="js/plantillas.js"></script>
		<title>Salida</title>
	</head>
	<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">
	<body>
		<!--Plantilla del encabezado guardado en plantillas.js-->
		<script>hacerEncabezado();</script>

		<div class="clearfix">
			<?php
				include('conexion.php');
				session_start();
				$_SESSION['encuesta'] = '';
				if( isset($_POST['opinion']) && !empty($_POST['opinion']) ){
					$_SESSION['encuesta'] = $_POST["opinion"];
					$mysqli =new mysqli ($host,$user,$pw, $db);
					$mysqli->set_charset("utf8");
					$sql1 = "UPDATE reg_visitas SET encuesta = '$_SESSION[encuesta]' WHERE matricula like '$_SESSION[matricula]'";
					mysqli_query( $mysqli, $sql1 );
				}
			?>
			<p>
				<br/>
				<h2> 
					<?php
						echo $_SESSION['mensaje'];
						//echo $_SESSION['mensaje'];
					?>
				</h2>
			</p>
			<p>
				<?php
					session_destroy();
		  
					echo '<a href="index.php">Regresar</a>';
				?>
			</p>
		</div>
		<!--Plantilla para el pie de pagina guardado en plantillas.js-->
		<script>hacerPiePagina();</script>
		<audio autoplay>
			<source src="music/acierto.mp3">
			Tu navegador no es compatible con el audio en HTML5
		</audio>
	</body>
</html>