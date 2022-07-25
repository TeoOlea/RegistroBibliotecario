<!doctype html>
<html>
	<head>
		<link rel="icon" type="image/png" href="images/favicon.ico" />
		<title>Registro por Mes</title>
		<meta charset="utf-8" />
	</head>
	<body width="1200px">
	<div class="header">
		<img src="images/encabezado.png" width="1200"/>
	</div>
	
	<div >
		<?php
			if( isset($_POST['fecha_pdf']) && $_POST['fecha_pdf'] != "" ){ //Se define que la variable en el campo de texto sea "inicializada"
				session_start();
				include('conexion.php');
				$mysqli = new mysqli ($host,$user,$pw, $db);
				$mysqli->set_charset("utf8");
				if ( $mysqli->connect_errno ){
					die( $mysqli->mysqli_connect_error() );
				}
				$mes_elegido = $_POST['fecha_pdf'];
				/*echo "
				<script>
					alert('$mes_elegido');
				</script>";*/
				$stringSeparado = explode('/', $mes_elegido);
				$anyo = $stringSeparado[1];
				$mes = $stringSeparado[0];
				switch( $mes ){ //Sin obtener el numero, nos decidimos hacer un switch para obtenerlo
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
				$sql_query = "SELECT CONCAT_WS(' ', usuariosbibli.`nombre(s)`, usuariosbibli.apellidos ) AS Nombre, uniacademica.nom_uniaca as UNIDAD_ACADEMICA, programedu.nom_programedu AS PROGRAMA_EDUCATIVO, tipousuario.tusuario, reg_visitas.servicios, reg_visitas.FechaEntrada, reg_visitas.FechaSalida
								FROM usuariosbibli, tipousuario, programedu, reg_visitas, uniacademica
								WHERE
									(reg_visitas.matricula = usuariosbibli.matricula OR reg_visitas.matricula = usuariosbibli.codigobarra) AND
									usuariosbibli.idtipo = tipousuario.IDusuario AND
									usuariosbibli.idpe = programedu.IDprogramedu AND 
									uniacademica.IDuniaca = usuariosbibli.id_uni_acad AND
									YEAR(FechaEntrada) = '$anyo' AND MONTH(FechaEntrada) = '$numMes'
								ORDER BY reg_visitas.FechaEntrada";
				//echo "".$sql_query;
				if( $_listado_total = mysqli_query( $mysqli, $sql_query ) ){  //Aquí obtengo el listado de todos los IDs que fueron ese día a la biblioteca
					$_Total_Rows = mysqli_num_rows( $_listado_total );// Se cuentan cuandos IDs fueron
					if( $_Total_Rows != 0 ){
						echo "
						<div align='center'>
							<table border='5' width='auto' style='font-family: Verdana; font-size: 10pt' id='table1' cellspacing='1' cellpadding='5'>
								<thead style='font-size: 13pt' align ='center'>
									<tr>
										<td><b>No.</b></td>     
										<td><b>Nombre</b></td>     
										<td><b>Unidad Académica</b></td>   
										<td><b>Programa Educativo</b></td> 
										<td><b>Tipo de Usuario</b></td>
										<td><b>Servicios</b></td>
										<td><b>FechaEntrada</b></td>
										<td><b>FechaSalida</b></td>
									</tr>
								</thead>
								<tbody align ='center'>
								";
								//var_dump($_listado_total);
								//die();
								$ID_NO = 1;
								while( $_registro_listado = mysqli_fetch_array( $_listado_total ) ){
									//campos de la tabla visitas
									$Nombre = $_registro_listado['Nombre'];
									$Uni_Aca = $_registro_listado['UNIDAD_ACADEMICA'];
									$Prog_Edu = $_registro_listado['PROGRAMA_EDUCATIVO'];
									$Tipo_Usuario = $_registro_listado['tusuario'];
									$servicios = $_registro_listado['servicios'];
									$_FechaEntrada = $_registro_listado['FechaEntrada'];
									$_FechaSalida = $_registro_listado['FechaSalida'];
									echo "<tr>"
											."<td>"."{$ID_NO}"."</td>"
											."<td>"."{$Nombre}"."</td>"
											."<td>"."{$Uni_Aca}"."</td>"
											."<td>"."{$Prog_Edu}"."</td>"
											."<td>"."{$Tipo_Usuario}"."</td>"
											."<td>"."{$servicios}"."</td>"
											."<td>"."{$_FechaEntrada}"."</td>"
											."<td>"."{$_FechaSalida}"."</td>
										</tr>";
									$ID_NO++;
									/*
									//Ya tenemos los datos  de la table visitas pero no tenemos el nombre del alumno, solo el id
									//Por lo tanto haremos el query o consulta en la tabla usuarios empatando el ID de visitas con la matricula en usuariosbcu
									$_query_nombre_alumno = "SELECT * FROM usuariosbibli WHERE  ( matricula = '$_IDUsuario' OR codigobarra = '$_IDUsuario' )";
									//echo "'$_IDUsuario' </br>";
									if( $_resultado_query_nombre_alumno = mysqli_query( $mysqli, $_query_nombre_alumno ) ){
										$_Alumno_Que_Exista_Rows = mysqli_num_rows( $_resultado_query_nombre_alumno );// Se cuentan cuandos IDs fueron
										if( $_Alumno_Que_Exista_Rows  != 0 ){//Se agrega esta condición porque hay usuarios registrados pero no estan dados de alta en usuariosbibli
											$_datos_alumno = mysqli_fetch_array( $_resultado_query_nombre_alumno );
											$_nombre_alumno = $_datos_alumno['nombre(s)'];
											$_apellidos_alumno = $_datos_alumno['apellidos'];
										}
									}*/
								}
						echo "
								</tbody>
							</table>
						</div>";
					}else{
						echo "<br/><center>No se encontraron alumnos registrados en {$mes} de {$anyo}</center><br />";
					}
				}
				$mysqli->close();
			}
		?>
	</div>
	
	<div class="footer">
		<img src="images/pie_pagina.png" width="1200"/>
		<!--<table width="100%" style="vertical-align: bottom; font-family: serif; 
			font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
			<tr>
				<td width="33%"></td>
				<td width="33%" align="center">Página {PAGENO} de {nbpg}</td>
				<td width="33%" style="text-align: right;"></td>
			</tr>
		</table>-->
	</div>
	
	</body>
</html>