<!DOCTYPE html>
<html>
	<head>
		<title>Registrado Centro de Computo BCU</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<script src="js/plantillas.js"></script>
	</head>
	<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=centro_computo.php">
	<body>
		<!-- --------Encabezado------------------ -->
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
		<!-- ---------Cuerpo----------------- -->
		<div class="clearfix">
			<div class="content column01">
				<?php
					session_start();
					include('conexion.php');
					$_SESSION['mensaje']='';
					$_SESSION['impresiones'] = $_POST['tipo'];
					$_SESSION['cantidad'] = $_POST['num_impresiones'];
				?>
				<div class="welcome">
				<?php
					if( $_SESSION['tipoComputo'] == "interno" ){
						echo $_SESSION['nombre'];
					}else if( $_SESSION['tipoComputo'] == "externo" ){
						echo $_SESSION['matricula'];
					}
				?></div>
				<br>
				<?php
					$mysqli =new mysqli ($host,$user,$pw, $db);
					$mysqli->set_charset("utf8");
						
					if( isset($_SESSION['matricula']) && !empty($_SESSION['matricula']) ){
						
						$mensaje_generico = "Lo sentimos.</br></br>Parece que hubo un error, favor de registrarse de nuevo, gracias.";
						
						//Agregar la condición pára verificar que el usuario no está registrado
						$query = "SELECT count(Nombre) as numero FROM centro_computo WHERE Nombre like '$_SESSION[matricula]' && estatus = 0";
						$sql3 = mysqli_query( $mysqli, $query );
						$contando = mysqli_fetch_array($sql3);
						$_SESSION['validar']=$contando['numero'];//numero es el apodo al resultado de count(matricula) que ponemos en la consulta
						$hoy = new DateTime('now', new DateTimeZone('America/Mexico_City'));
						//$hoy->modify('-1 hours');//horario de verano
						$fecha_hoy = $hoy->format('Y-m-d H:i:s');
						if($_SESSION['validar'] == 1){
							$query = "UPDATE centro_computo SET estatus = 1, FechaSalida = '$fecha_hoy', Copias = '$_SESSION[impresiones]', Cantidad = '$_SESSION[cantidad]' WHERE Nombre like '$_SESSION[matricula]' && estatus = 0;";
							mysqli_query( $mysqli, $query );
							?>
							<h3><?php echo 'Gracias por tu visita';?></h3>
							<?php		
						}else if($_SESSION['validar'] > 1){
							$_SESSION['mensaje']="Hubo un pequeño problema.</br></br>Registros multiples.</br></br>Favor de proporcionar tu MATRICULA o CODIGO DE BARRAS a la persona en recepción. Gracias<br/><br/>";
							header("Location: error.php");
							exit;//acuerdate de esta linea please			
						}
					}else{
						$_SESSION['mensaje']='Verifica los datos';
						header("Location: error.php"); 
						exit;//acuerdate de esta linea please
					}
					session_destroy();
					echo '<a href="centro_computo.php">Regresar</a>';
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