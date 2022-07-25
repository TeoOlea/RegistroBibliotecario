<?php

	function getPlantilla($fecha_pdf){
		
	$plantilla = '<body>
		<div>
			';
	if( $fecha_pdf != "" ){ //Se define que la variable en el campo de texto sea "inicializada"
		session_start();
		include('conexion.php');
		$mysqli = new mysqli ($host,$user,$pw, $db);
		$mysqli->set_charset("utf8");
		if ( $mysqli->connect_errno ){
			die( $mysqli->mysqli_connect_error() );
		}
		$mes_elegido = $fecha_pdf;
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
				$plantilla = $plantilla .'
				<div><center>
					<table width="100%" class="borderline-center" class="tablePDF">
						<th>
							<tr>
								<td class="borderline-center"><b>No.</b></td>     
								<td class="borderline-center"><b>Nombre</b></td>     
								<td class="borderline-center"><b>Unidad Académica</b></td>   
								<td class="borderline-center"><b>Programa Educativo</b></td> 
								<td class="borderline-center"><b>Tipo de Usuario</b></td>
								<td class="borderline-center"><b>Servicios</b></td>
								<td class="borderline-center"><b>FechaEntrada</b></td>
								<td class="borderline-center"><b>FechaSalida</b></td>
							</tr>
						</th>
						<tbody class="borderline-left">
						';
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
							$plantilla = $plantilla .'
								<tr>
									<td class="borderline-c-color">'.$ID_NO.'</td>
									<td class="borderline-left">'.$Nombre.'</td>
									<td class="borderline-left">'.$Uni_Aca.'</td>
									<td class="borderline-l-text">'.$Prog_Edu.'</td>
									<td class="borderline-left">'.$Tipo_Usuario.'</td>
									<td class="borderline-s-text">'.$servicios.'</td>
									<td class="borderline-left">'.$_FechaEntrada.'</td>
									<td class="borderline-left">'.$_FechaSalida.'</td>
								</tr>';
							$ID_NO++;
						}
				$plantilla = $plantilla .'
						</tbody>
					</table>
				</center></div>';
			}else{
				$plantilla = $plantilla .'
				<br/>
				<center>No se encontraron alumnos registrados en '.$mes.' de '.$anyo.'</center>
				<br/>';
			}
		}
		$mysqli->close();
	}
	$plantilla = $plantilla . '
		</div>
	</body>';
	
	return $plantilla;
	
	}
	
?>