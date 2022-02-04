<!DOCTYPE html>
<html>
	<head>
		<title>Servicios Registrados</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
	</head>
	
	<body>
		<!-- --------Encabezado------------------ -->
		<div class="header">
			<table>
				<tr>
					<th class="logo">
						<img src="images/uaem.png" width="100"  alt="UAEM" title="UAEM"/>
					</th>
					<th class="txt">
						Universidad Autónoma del Estado de Morelos <br/>
						Dirección de Desarrollo de Bibliotecas <br/>
						Biblioteca Central Universitaria <br/>
					</th>
					<th>
						<img src="images/bcu.png" width="100"  alt="BCU" title="BCU" />
					</th>
				</tr>
			</table>
		</div>
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
							date_default_timezone_set('America/Mexico_City');
							$hoy = date("Y-m-d H:i:s", time());//Format para y fecha y hora
							//$mysqli_query("INSERT INTO visitas (IDUsuario,SERVICIOS,IDPE,status,FechaEntrada) VALUES('$_SESSION[matricula]', '$servicio', '$_SESSION[proedu]', '$_SESSION[estatus]',' NOW()')",$mysqli);	        	
							$sql1 = "INSERT INTO reg_visitas (matricula, servicios, estatus, FechaEntrada) VALUES( '$_SESSION[matricula]', '$servicio', '0','$hoy')";
							mysqli_query( $mysqli, $sql1 );		       
							echo 'Se han registrado los siguientes servicios';
							echo '<p> <b>';
							echo $servicio;
							echo '</b></p>';
							$mysqli->close();//cerrar la sesión, es importante realizar este proceso después de cada sesion, por ello se guardan en las variables. azul 020718
						}
						session_destroy();
						echo '<a href="index.php">Regresar</a>';
					?>
				</div>
			</div>
		</div>
		<!-- ---------Pie de pagina----------------- -->
		<div class="footer">
			<table>
				<tr>
					<th class="logo">
						
					</th>
					<th class="txt">
						Universidad Autónoma del Estado de Morelos Av. Universidad 1001. Col. Chamilpa. Cuernavaca, Morelos. C. P. 62209.
					</th>
					<th class="logo">
						
					</th>
				</tr>
			</table>
		</div>
	</body>
</html>