<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bcu.css"> 
		<link rel="icon" type="image/png" href="favicon.ico" />
		<title>Registro por Mes</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="./js/function.js"></script>
	</head>
	<body>
		<div class="header">
			<table>
					<tr>
						<th class="logo"><img src="images/uaem.png" width="160"  alt="UAEM" title="UAEM" /></th>
						<th class="txt">Universidad Autónoma del Estado de Morelos<br/>
							Dirección de Desarrollo de Bibliotecas<br />
							Biblioteca Central Universitaria<br />
						</th>
						<th class="logo"><img src="images/bcu.png" width="160"  alt="BCU" title="BCU" /></th>
					</tr>
			</table>
		</div>
		
		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "post" >
			<center>
				<p>
					Año: <input type="text" id="fecha_anyo" name="fecha_anyo" readonly>
					<input type="submit" value="Consultar" id = "boton_fecha" name="boton_fecha" >
				</p>
			</center>
		</form>
		
		<div class="clearfixadmin">
			<h2 align='center'>Consulta</h2>
			<?php
				if( isset($_POST['fecha_anyo']) && $_POST['fecha_anyo'] != "" ){ //Se define que la variable en el campo de texto sea "inicializada"
					session_start();
					include('conexion.php');
					$mysqli = new mysqli ($host,$user,$pw, $db);
					$mysqli->set_charset("utf8");
					if ( $mysqli->connect_errno ){
						die( $mysqli->mysqli_connect_error() );
					}
					$anyo_elegido = $_POST['fecha_anyo'];
					echo "
					<script>
						mantener_anyo('{$anyo_elegido}');
					</script>"; //Mantener la fecha en el campo de texto
				}
			?>
		</div>
		
		<br/>
		<a href="estadistica.php">Regresar</a>
		<br />
		
		<div class="footeradmin">
		 <table>
				  <tr>
						<th class="logoadmin">
						
						</th>
						
						<th class="txtadmin">
							Universidad Autónoma del Estado de Morelos Av. Universidad 1001. Col. Chamilpa. Cuernavaca, Morelos. C. P. 62209. 
						</th>
						
						<th class="logoadmin">
						</th>
					 </tr>
		   </table>
		</div>
	</body>
</html>