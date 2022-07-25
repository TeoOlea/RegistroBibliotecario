<!doctype html>
<html>
	<head>
		<link rel="icon" type="image/png" href="images/favicon.ico" />
		<title>Registro por Mes</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/estiloPDF2.css">
	</head>
	<body width="1200px">
	<div class="header">
		<img src="images/encabezado2.png" width="1200"/>
	</div>
	
	<div >
		<?php
			session_start();
			$mes_elegido = $_SESSION['mes_anyo'];
			//echo $mes_elegido;
			if( isset($mes_elegido) && $mes_elegido != "" ){ //Se define que la variable en el campo de texto sea "inicializada"
				include('conexion.php');
				$mysqli = new mysqli ($host,$user,$pw, $db);
				$mysqli->set_charset("utf8");
				if ( $mysqli->connect_errno ){
					die( $mysqli->mysqli_connect_error() );
				}
				$mes_elegido = $_SESSION['mes_anyo'];
				$stringSeparado = explode('/', $mes_elegido);
				$anyo = $stringSeparado[1];
				$mes = $stringSeparado[0];
				/*echo "
				<script>
					alert('$mes_elegido');
					alert('$anyo');
					alert('$mes');
				</script>";*/
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
				$sql_query = "SELECT DAY(FechaEntrada) AS 'Dia',
					COUNT( CASE WHEN usuariosbibli.sexo = 'Hombre' THEN 1 END ) AS 'Hombres',
					COUNT( CASE WHEN usuariosbibli.sexo = 'Mujer' THEN 1 END ) AS 'Mujeres',
					COUNT( CASE WHEN (usuariosbibli.idtipo = '1' OR usuariosbibli.idtipo = '2' OR usuariosbibli.idtipo = '3' ) THEN 1 END ) AS 'Estudiantes',
					COUNT( CASE WHEN usuariosbibli.idtipo = '4' THEN 1 END ) AS 'Investigador',
					COUNT( CASE WHEN usuariosbibli.idtipo = '5' THEN 1 END ) AS 'Acádemico',
					COUNT( CASE WHEN usuariosbibli.idtipo = '6' THEN 1 END ) AS 'Administrativo',
					COUNT( CASE WHEN (usuariosbibli.idtipo = '1' OR usuariosbibli.idtipo = '2' OR usuariosbibli.idtipo = '3'
									  OR usuariosbibli.idtipo = '4' OR usuariosbibli.idtipo = '5' OR usuariosbibli.idtipo = '6' ) THEN 1 END ) AS 'Interno',
					COUNT( CASE WHEN usuariosbibli.idtipo = '7' THEN 1 END ) AS 'Externo',
					COUNT( CASE WHEN MATCH(reg_visitas.servicios) AGAINST ('Sala') THEN 1 END ) AS 'Sala',
					COUNT( CASE WHEN MATCH(reg_visitas.servicios) AGAINST ('Domicilio') THEN 1 END ) AS 'Prestamo a Domicilio',
					COUNT( CASE WHEN MATCH(reg_visitas.servicios) AGAINST ('Inter') THEN 1 END ) AS 'Prestamo Interbibliotecario',
					COUNT( CASE WHEN MATCH(reg_visitas.servicios) AGAINST ('BaseDatos') THEN 1 END ) AS 'Consulta de Base de Datos',
					COUNT( CASE WHEN MATCH(reg_visitas.servicios) AGAINST ('Computo') THEN 1 END ) AS 'Uso de Computadora',
					COUNT( CASE WHEN MATCH(reg_visitas.servicios) AGAINST ('Referencia') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Cubiculo') THEN 1 
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Videoteca') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('riaa') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Auditorio') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('SUM') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Tesis') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Guiadas') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Tesiteca') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Info') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Devolucion') THEN 1
						  WHEN MATCH(reg_visitas.servicios) AGAINST ('Otro') THEN 1
						  END ) AS 'Otros'
					FROM usuariosbibli 
					INNER JOIN reg_visitas ON (reg_visitas.matricula = usuariosbibli.matricula OR reg_visitas.matricula = usuariosbibli.codigobarra)
					WHERE YEAR(FechaEntrada) = '$anyo' AND MONTH(FechaEntrada) = '$numMes'
					GROUP BY DAY(FechaEntrada);";
				//echo "".$sql_query;
				if( $_listado_total = mysqli_query( $mysqli, $sql_query ) ){  //Aquí obtengo el listado de todos los IDs que fueron ese día a la biblioteca
					$_Total_Rows = mysqli_num_rows( $_listado_total );// Se cuentan cuandos IDs fueron
					if( $_Total_Rows != 0 ){
						echo "
						<div>
							<table width='100%'>
								<tr>
									<td align='center'>BIBLIOTECA: </td>
									<td class='borderline-center'>Biblioteca Central Universitaria</td>
									<td align='right'>Mes: </td>
									<td class='borderline-center'>$mes</td>
									<td align='right'>Año: </td>
									<td class='borderline-center'>$anyo</td>
								</tr>
							</table>
						</div>
						<br>
						<div>
							<table width='100%' class='tablePDF'>
								<th>
									<tr>
										<td class='borderline-c-color' rowspan='2'><b>DIA</b></td>     
										<td class='borderline-c-color' rowspan='2'><b>HOMBRES</b></td>     
										<td class='borderline-c-color' rowspan='2'><b>MUJERES</b></td>  
										<td class='borderline-c-color' colspan='4'><b>USUARIOS</b></td> 
										<td class='borderline-c-color' colspan='2'><b>TIPO DE USUARIO</b></td>
										<td class='borderline-c-color' colspan='6'><b>SERVICIOS UTILIZADOS</b></td>
									</tr>
									<tr>
										<td class='borderline-c-color'><b>ESTUDIANTE</b></td>
										<td class='borderline-c-color'><b>INVESTIGADOR</b></td>
										<td class='borderline-c-color'><b>ACADEMICO</b></td>
										<td class='borderline-c-color'><b>ADMINISTRATIVO</b></td>
										
										<td class='borderline-c-color'><b>INTERNO</b></td>
										<td class='borderline-c-color'><b>EXTERNO</b></td>
										
										<td class='borderline-c-color'><b>CONSULTA EN SALA</b></td>
										<td class='borderline-c-color'><b>PRESTAMO A DOMICILIO</b></td>
										<td class='borderline-c-color'><b>PRESTAMO INTERBIBLIOTECARIO</b></td>
										<td class='borderline-c-color'><b>CONSULTA DE BASE DE DATOS</b></td>
										<td class='borderline-c-color'><b>USO DE COMPUTADORA</b></td>
										<td class='borderline-c-color'><b>OTROS</b></td>
									</tr>
								</th>
							<tbody align ='center'>
								";
								//var_dump($_listado_total);
								//die();
								$TotalHombres = 0;
								$TotalMujeres = 0;
								$TotalEstudiantes = 0;
								$TotalInvestigadores = 0;
								$TotalAcademicos = 0;
								$TotalAdministrativos = 0;
								$TotalInternos = 0;
								$TotalExternos = 0;
								$TotalSala = 0;
								$TotalPrestamo = 0;
								$TotalInter = 0;
								$TotalConsulta = 0;
								$TotalCompu = 0;
								$TotalOtros = 0;
								for( $i = 1; $i<32; $i++ ){
									$encontrado = 0;
									while( $_registro_listado = mysqli_fetch_array( $_listado_total ) ){
										//campos de la tabla visitas
										$Dia = $_registro_listado['Dia'];
										$Hombres = $_registro_listado['Hombres'];
										$Mujeres = $_registro_listado['Mujeres'];
										$Estudiantes = $_registro_listado['Estudiantes'];
										$Investigador = $_registro_listado['Investigador'];
										$Academico = $_registro_listado['Acádemico'];
										$Administrativo = $_registro_listado['Administrativo'];
										$Interno = $_registro_listado['Interno'];
										$Externo = $_registro_listado['Externo'];
										$Sala = $_registro_listado['Sala'];
										$Domicilio = $_registro_listado['Prestamo a Domicilio'];
										$Inter = $_registro_listado['Prestamo Interbibliotecario'];
										$ConsultaBD = $_registro_listado['Consulta de Base de Datos'];
										$Compu = $_registro_listado['Uso de Computadora'];
										$Otros = $_registro_listado['Otros'];
										if( ''.$i == $Dia ){
											$encontrado = 1;
											break;
										}
										
									}
									mysqli_data_seek($_listado_total,0);//reiniciamos el fetch_array
									if( $encontrado == 1 ){
										//echo "".$TotalOtros."<br>";
										$TotalHombres = ($TotalHombres + $Hombres);
										$TotalMujeres = ($TotalMujeres + $Mujeres);
										$TotalEstudiantes = ($TotalEstudiantes + $Estudiantes);
										$TotalInvestigadores = ($TotalInvestigadores + $Investigador);
										$TotalAcademicos = ($TotalAcademicos + $Academico);
										$TotalAdministrativos = ($TotalAdministrativos + $Administrativo);
										$TotalInternos = ($TotalInternos + $Interno);
										$TotalExternos = ($TotalExternos + $Externo);
										$TotalSala = ($TotalSala + $Sala);
										$TotalPrestamo = ($TotalPrestamo + $Domicilio);
										$TotalInter = ($TotalInter + $Inter);
										$TotalConsulta = ($TotalConsulta + $ConsultaBD);
										$TotalCompu = ($TotalCompu + $Compu);
										$TotalOtros = ($TotalOtros + $Otros);
										echo "<tr>"
											."<td class='borderline-center'>"."{$Dia}"."</td>"
											."<td class='borderline-center'>"."{$Hombres}"."</td>"
											."<td class='borderline-center'>"."{$Mujeres}"."</td>"
											."<td class='borderline-center'>"."{$Estudiantes}"."</td>"
											."<td class='borderline-center'>"."{$Investigador}"."</td>"
											."<td class='borderline-center'>"."{$Academico}"."</td>"
											."<td class='borderline-center'>"."{$Administrativo}"."</td>"
											."<td class='borderline-center'>"."{$Interno}"."</td>"
											."<td class='borderline-center'>"."{$Externo}"."</td>"
											."<td class='borderline-center'>"."{$Sala}"."</td>"
											."<td class='borderline-center'>"."{$Domicilio}"."</td>"
											."<td class='borderline-center'>"."{$Inter}"."</td>"
											."<td class='borderline-center'>"."{$ConsultaBD}"."</td>"
											."<td class='borderline-center'>"."{$Compu}"."</td>"
											."<td class='borderline-center'>"."{$Otros}"."</td>
										</tr>";
									}else{
										echo "<tr>"
											."<td class='borderline-center'>"."{$i}"."</td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>"
											."<td class='borderline-center'></td>
										</tr>";
									}
								}
								echo "<tr>"
										."<td class='resultados'>TOTAL</td>"
										."<td class='hombres'>".$TotalHombres."</td>"
										."<td class='mujeres'>".$TotalMujeres."</td>"
										."<td class='resultados'>".$TotalEstudiantes."</td>"
										."<td class='resultados'>".$TotalInvestigadores."</td>"
										."<td class='resultados'>".$TotalAcademicos."</td>"
										."<td class='resultados'>".$TotalAdministrativos."</td>"
										."<td class='resultados'>".$TotalInternos."</td>"
										."<td class='resultados'>".$TotalExternos."</td>"
										."<td class='resultados'>".$TotalSala."</td>"
										."<td class='resultados'>".$TotalPrestamo."</td>"
										."<td class='resultados'>".$TotalInter."</td>"
										."<td class='resultados'>".$TotalConsulta."</td>"
										."<td class='resultados'>".$TotalCompu."</td>"
										."<td class='resultados'>".$TotalOtros."</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div>
							<table width='100%'>
								<tr>
									<td align='left'>PORCENTAJE DE DIAS LABORABLES CON BIBLIOTECA EN SERVICIO: </td>
									<td align='right'>_____________________________________________________</td>
								</tr>
								<tr>
									<td align='left'>NOMBRE DE RECEPCIONISTA: </td>
									<td align='right'>______________________________________________________________________</td>
									<td align='center'>FIRMA: </td>
									<td></td>
									<td align='right'>______________________________________________________________________</td>
								</tr>
								<tr>
									<td>* CAMPO \"NO\" OBLIGATORIO PARA LOS BIBLIOTECARIOS QUE CUENTAN CON SISTEMA</td>
								</tr>
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