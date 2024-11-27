<!DOCTYPE html>
<html>
	<head>
		<title>Bienvenido</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<script src="js/plantillas.js"></script>
	</head>
	<META HTTP-EQUIV="REFRESH" CONTENT="7;URL=index.php">
	<body>
	
		<!--Plantilla del encabezado guardado en plantillas.js-->
		<script>hacerEncabezado();</script>
		<div class="clearfix">
			<div class="content column01">
				<?php
					session_start();
					
					if( isset($_SESSION['lugar']) && !empty($_SESSION['lugar']) ){
						
						include('conexion.php');
						$mysqli = new mysqli ($host,$user,$pw, $db);
						$mysqli->set_charset("utf8");
						$hoy = new DateTime('now', new DateTimeZone('America/Mexico_City'));
						//$hoy->modify('-1 hours');//horario de verano
						$fecha_hoy = $hoy->format('Y-m-d H:i:s');
						if( $_POST['checkbox'] != "" && is_array($_POST['checkbox']) ){
							// realizamos el ciclo
							$servicio='';
							//echo 'entra';
							//while( list($key,$value) = each($_POST['checkbox']) ){   la función each quedó OBSOLETA a partir de PHP 7.2.0
							foreach( $_POST['checkbox'] as $key=>$value ){
								$servicio = $value.".".$servicio;
							}
							$_POST['checkbox'] = "";
							$sql1 = "INSERT INTO reg_lugares ( nombrelugar, lugar, servicios, estatus, FechaEntrada) VALUES( '$_SESSION[nombre_ext]', '$_SESSION[lugar]', '$servicio', 0, '$fecha_hoy')";
							mysqli_query( $mysqli, $sql1 );
							$sqlresultado = "SELECT MAX(`IDLugar`) FROM `reg_lugares`;";
							$ultimoID =mysqli_insert_id( $mysqli );
							echo '<h1>Se ha registrado tu entrada, ¡Bienvenido!</h1>';
							echo "<div class='welcome'>Tu número de registro es el<br><div class='tamaño_letra'>$ultimoID</div> favor de guardarlo</div>";
							session_destroy();
							echo '<br><a href="index.php">Regresar</a>';
						}
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