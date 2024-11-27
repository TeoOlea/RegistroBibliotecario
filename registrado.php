<!DOCTYPE html>
<html>
	<head>
		<title>Servicios Registrados</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<script src="js/plantillas.js"></script>
	</head>
	<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=index.php">
	<body>
		<!-- --------Encabezado------------------ -->
		<!--Plantilla del encabezado guardado en plantillas.js-->
		<script>hacerEncabezado();</script>
		<!-- ---------Cuerpo----------------- -->
		<div class="clearfix">
			<div class="content column01">
				<h3><?php
					session_start();
					include('conexion.php');
					echo $_SESSION['nombre'];
					echo '<br/>';
				?></h3>
				<div class="menu" style="width:850px; text-align:justify;">
					<?php
						if( $_POST['checkbox'] != "" && is_array($_POST['checkbox']) ){
							// realizamos el ciclo
							$servicio='';
							//echo 'entra';
							//while( list($key,$value) = each($_POST['checkbox']) ){   la función each quedó OBSOLETA a partir de PHP 7.2.0
							foreach( $_POST['checkbox'] as $key=>$value ){
								$servicio = $value.".".$servicio;
							}
							$_POST['checkbox'] = "";
							//Segmento para el agregado a la tabla de visita
							$mysqli =new mysqli ($host,$user,$pw, $db);
							$mysqli->set_charset("utf8");
							//date_default_timezone_set('America/Mexico_City');
							//$hoy = new DateTime("Y-m-d H:i:s", time());//Format para y fecha y hora
							$hoy = new DateTime('now', new DateTimeZone('America/Mexico_City'));
							//$hoy->modify('-1 hours');//horario de verano
							$fecha_hoy = $hoy->format('Y-m-d H:i:s');
							//$hoy = new DateTime("Y-m-d H:i:s", time());//Format para y fecha y hora
							//$hoy->modify('-1 hour');
							//$mysqli_query("INSERT INTO visitas (IDUsuario,SERVICIOS,IDPE,status,FechaEntrada) VALUES('$_SESSION[matricula]', '$servicio', '$_SESSION[proedu]', '$_SESSION[estatus]',' NOW()')",$mysqli);	        	
							$sql1 = "INSERT INTO reg_visitas (matricula, servicios, estatus, encuesta, FechaEntrada) VALUES( '$_SESSION[matricula]', '$servicio', '0', '$_SESSION[encuesta]', '$fecha_hoy')";
							mysqli_query( $mysqli, $sql1 );		       
							echo 'Se han registrado los siguientes servicios';
							echo '<p> <b>';
							//echo $servicio;
							$stringSeparado = explode(".", $servicio);
							for( $i = 0; $i<count($stringSeparado); $i++ ){
								echo $stringSeparado[$i]."<br>";
							}
							echo '</b></p>';
							//-----------------------Codigo agregado por el problema que hay sobre el doble registro --------------------- Teo 23mar22
							$query = "SELECT count(matricula) as numero FROM reg_visitas WHERE matricula like '$_SESSION[matricula]' && estatus = 0";
							$sql3 = mysqli_query( $mysqli, $query );
							$contando = mysqli_fetch_array($sql3);
							$repetido=$contando['numero'];//numero es el apodo al resultado de count(matricula)
							if( $repetido == 2 ){
								$logFile = fopen("log.txt", 'a') or die("Error creando archivo");
								fwrite($logFile, "\n".date("d/m/Y H:i:s")." Se creó un registro repetido. Matricula: '$_SESSION[matricula]'") or die("Error escribiendo en el archivo");
								fclose($logFile);
								echo '</br> por error se repitió el ingreso, favor de contactar al administrador</br>';
								$query = "SELECT IDVisita FROM reg_visitas WHERE matricula like '$_SESSION[matricula]' && estatus = 0";
								$sql4 = mysqli_query( $mysqli, $query );
								$IDsRepetidos = mysqli_fetch_array($sql4);
								$IDEliminar = $IDsRepetidos[1];
								$query = "DELETE FROM reg_visitas WHERE IDVisita = '$IDsRepetidos[1]'";
								$sql5 = mysqli_query( $mysqli, $query );
								$query = "ALTER TABLE reg_visitas AUTO_INCREMENT= '$IDsRepetidos[1]'";
								$sql6 = mysqli_query( $mysqli, $query );
								echo '</br> Problema resuelto</br>';
							}
							//------------------------------------------------------------------------------------------------------------------------
							$mysqli->close();//cerrar la sesión, es importante realizar este proceso después de cada sesion, por ello se guardan en las variables. azul 020718
						}
						session_destroy();
						echo '<a href="index.php">Regresar</a>';
					?>
				</div>
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