<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bcu.css"> 
		<link rel="icon" type="image/png" href="favicon.ico" />
		<title>Registro por Día</title>
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
		<br/>
		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "post" >
			<center>
				<p>
					Fecha: <input type="text" id="fecha_elegida" name="fecha_elegida" readonly>
					<!--<input type="submit" value="Consultar" id = "boton_fecha" name="boton_fecha" onclick="mantener_fecha(fecha_elegida.value)" > Opción para evento de actualización pero no sirvio -->
					<input type="submit" value="Consultar" id = "boton_fecha" name="boton_fecha" >
				</p>
			</center>
		</form>
		
		<div class="clearfixadmin">
			<h2 align='center'>Consulta</h2>
			<?php
			if( isset($_POST['fecha_elegida']) && $_POST['fecha_elegida'] != "" ){ //Se define que la variable en el campo de texto sea "inicializada"
				session_start();
				include('conexion.php');
				$mysqli = new mysqli ($host,$user,$pw, $db);
				$mysqli->set_charset("utf8");
				if ( $mysqli->connect_errno ){
					die( $mysqli->mysqli_connect_error() );
				}
				$fecha_elegida = $_POST['fecha_elegida'];
				echo "
				<script>
					mantener_fecha('{$fecha_elegida}');
				</script>"; //Mantener la fecha en el campo de texto
				//setlocale(LC_TIME, "spanish"); //Como los meses están en español cambio la localización a español y así obtener el numero del mes posteriormente
				$stringSeparado = explode('/', $fecha_elegida);
				$anyo = $stringSeparado[2];
				$mes = $stringSeparado[1];
				$dia = $stringSeparado[0];
				//$numMes = strtotime($mes); Intentando obtener el numero del mes a partir del nombre del  mes en español, sin éxito :'(   25082021
				switch( $mes ){ //Sin obtener  el numero nos decidimos hacer un switch para obtenerlo
					case 'Enero':
						$numMes = "01";
						break;
					case 'Febrero':
						$numMes = "02";
						break;
					case 'Marzo':
						$numMes = "03";
						break;
					case 'Abril':
						$numMes = "04";
						break;
					case 'Mayo':
						$numMes = "05";
						break;
					case 'Junio':
						$numMes = "06";
						break;
					case 'Julio':
						$numMes = "07";
						break;
					case 'Agosto':
						$numMes = "08";
						break;
					case 'Septiembre':
						$numMes = "09";
						break;
					case 'Octubre':
						$numMes = "10";
						break;
					case 'Noviembre':
						$numMes = "11";
						break;
					case 'Diciembre':
						$numMes = "12";
						break;					
				}
				//Query a MySQL para solicitar la lista de entradas con el día, mes y año solicitado.
				$sql_query = "SELECT * FROM visitas WHERE YEAR(FechaEntrada) = '$anyo' && MONTH(FechaEntrada) = '$numMes' && DAY(FechaEntrada) = '$dia' ORDER BY time(FechaEntrada) ASC";
				if( $_listado_total = mysqli_query( $mysqli, $sql_query ) ){  //Aquí obtengo el listado de todos los IDs que fueron ese día a la biblioteca
					$_Total_Rows = mysqli_num_rows( $_listado_total );// Se cuentan cuandos IDs fueron
					if( $_Total_Rows != 0 ){
						if( $_Total_Rows == 1 ){// COndicional para manejar si era uno o más
							echo "<br/><center>Se encontró {$_Total_Rows} alumno el día {$dia} de {$mes} de {$anyo}</center><br />";
							echo "
							<div align='center' white-space: 'pre-wrap'>
								<table border='5' width='auto' style='font-family: Verdana; font-size: 10pt' id='table1' cellspacing='1' cellpadding='5'>
									<thead style='font-size: 13pt' align ='center'>
										<tr>
											<td><b>IDVisita</b></td>     
											<td><b>IDUsuario</b></td>   
											<td><b>Alumno</b></td> 
											<td><b>SERVICIOS</b></td>
											<td><b>IDPE</b></td>
											<td><b>status</b></td>
											<td><b>FechaEntrada</b></td>
											<td><b>FechaSalida</b></td>
										</tr>
									</thead>
								<tbody align ='center'>
								";
								while( $_registro_listado = mysqli_fetch_array( $_listado_total ) ){
									//campos de la tabla visitas
									$_IDVisita = $_registro_listado['IDVisita'];
									$_IDUsuario = $_registro_listado['IDUsuario'];
									$_Servicios = $_registro_listado['SERVICIOS'];
									$_IDPE = $_registro_listado['IDPE'];
									$_status = $_registro_listado['status'];
									$_FechaEntrada = $_registro_listado['FechaEntrada'];
									$_FechaSalida = $_registro_listado['FechaSalida'];
									//Ya tenemos los datos  de la table visitas pero no tenemos el nombre del alumno, solo el id
									//Por lo tanto haremos el query o consulta en la tabla usuarios empatando el ID de visitas con la matricula en usuariosbcu
									$_query_nombre_alumno = "SELECT * FROM usuariosbcu WHERE matricula = '$_IDUsuario'";
									$_resultado_query_nombre_alumno = mysqli_query( $mysqli, $_query_nombre_alumno );
									$_datos_alumno = mysqli_fetch_array( $_resultado_query_nombre_alumno );
									$_nombre_alumno = $_datos_alumno['nombre'];
									$_apellidos_alumno = $_datos_alumno['apellidos'];
									echo "<tr>"
										."<td>"."{$_IDVisita}"."</td>"
										."<td>"."{$_IDUsuario}"."</td>"
										."<td>"."{$_nombre_alumno} "."{$_apellidos_alumno}"."</td>"
										."<td>"."{$_Servicios}"."</td>"
										."<td>"."{$_IDPE}"."</td>"
										."<td>"."{$_status}"."</td>"
										."<td>"."{$_FechaEntrada}"."</td>"
										."<td>"."{$_FechaSalida}"."</td>
										</tr>";
								}
							echo "</tbody>
								</table>
							</div>";
						}else{
							echo "<br/><center>Se encontraron {$_Total_Rows} alumnos el día {$dia} de {$mes} de {$anyo}</center><br />";
							echo "
							<div align='center'>
								<table border='5' width='auto' style='font-family: Verdana; font-size: 10pt' id='table1' cellspacing='1' cellpadding='5'>
									<thead style='font-size: 13pt' align ='center'>
										<tr>
											<td><b>IDVisita</b></td>     
											<td><b>IDUsuario</b></td>   
											<td><b>Alumno</b></td> 
											<td><b>SERVICIOS</b></td>
											<td><b>IDPE</b></td>
											<td><b>status</b></td>
											<td><b>FechaEntrada</b></td>
											<td><b>FechaSalida</b></td>
										</tr>
									</thead>
								<tbody align ='center'>
							";
								while( $_registro_listado = mysqli_fetch_array( $_listado_total ) ){
									//campos de la tabla visitas
									$_IDVisita = $_registro_listado['IDVisita'];
									$_IDUsuario = $_registro_listado['IDUsuario'];
									$_Servicios = $_registro_listado['SERVICIOS'];
									$_IDPE = $_registro_listado['IDPE'];
									$_status = $_registro_listado['status'];
									$_FechaEntrada = $_registro_listado['FechaEntrada'];
									$_FechaSalida = $_registro_listado['FechaSalida'];
									$_query_nombre_alumno = "SELECT * FROM usuariosbcu WHERE matricula = '$_IDUsuario'";
									$_resultado_query_nombre_alumno = mysqli_query( $mysqli, $_query_nombre_alumno );
									$_datos_alumno = mysqli_fetch_array( $_resultado_query_nombre_alumno );
									$_nombre_alumno = $_datos_alumno['nombre'];
									$_apellidos_alumno = $_datos_alumno['apellidos'];
									echo "<tr>"
										."<td>"."{$_IDVisita}"."</td>"
										."<td>"."{$_IDUsuario}"."</td>"
										."<td>"."{$_nombre_alumno} "."{$_apellidos_alumno}"."</td>"
										."<td>"."{$_Servicios}"."</td>"
										."<td>"."{$_IDPE}"."</td>"
										."<td>"."{$_status}"."</td>"
										."<td>"."{$_FechaEntrada}"."</td>"
										."<td>"."{$_FechaSalida}"."</td>
										</tr>";
									// $pagi_sql = "SELECT count(DAY(FechaEntrada)) as cuenta FROM visitas WHERE YEAR(FechaEntrada) = $anyo && MONTH(FechaEntrada) = $numMes && DAY(FechaEntrada) = $dia GROUP BY DAY(FechaEntrada) ORDER BY DAY(FechaEntrada) ASC;";
									// $_res_contados = mysqli_query( $mysqli, $pagi_sql );  //Aquí cuantos IDs fueron ese día a la biblioteca
									// $_total_registros = mysqli_num_rows($_res_contados);			// Cuenta el numero de grupos
									// while( $registro = mysqli_fetch_array($_res_contados) ){
										// echo "{$registro[0]}";
									// }
								}
								echo "</tbody>
								</table>
							</div>";
						}
					}else{
						echo "<br/><center>No se encontraron alumnos registrados el día {$dia} de {$mes} de {$anyo}</center>";
					}
					
				}
				$mysqli->close();
			}
			?>
		</div>
		
		<br />
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