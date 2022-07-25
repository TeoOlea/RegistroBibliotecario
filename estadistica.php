<!DOCTYPE html>
<html>
	<head>
		<title>Administración</title>
		<link rel="stylesheet" type="text/css" href="css/bibli.css"> 
		<link rel="icon" type="image/png" href="images/favicon.ico">
	</head>
	
	<body>
		<div class="header">
			<table>
				<tr>
					<th class="logo"><a href="index.php"><img src="images/uaem.png" width="160"  alt="UAEM" title="UAEM" /></th>
					<th class="txt">
						Universidad Autónoma del Estado de Morelos <br />
						Dirección de Desarrollo de Bibliotecas <br/>
						Biblioteca Central Universitaria <br /></th>
					<th class="logo"><img src="images/bcu.png" width="160"  alt="BCU" title="BCU" /></th>
				</tr>
			</table>
		</div>
		
		<div class="clearfixadmin">
			<h2 align="center">Estadística general</h2><br/>
			<?php
				session_start();
				include('conexion.php');
				echo "<h4>".$_SESSION['mensaje']."</h4>";
				$mysqli =new mysqli ($host,$user,$pw, $db);
				$mysqli->set_charset("utf8");
				if ( $mysqli->connect_errno ){
					die( $mysqli->mysqli_connect_error() );
				}
				/*------ Contamos numero total de registros
					Si queremos poner un condicional lo haremos de la siguiente manera:
					$_Cuen_1 = "SELECT * FROM $tabla WHERE sexo = 'mujer'";  
				*/
				$anyo_actual = date("Y");
				$_Cuen_1 = "SELECT * FROM reg_visitas WHERE YEAR(FechaEntrada) = $anyo_actual";
				$_Cuenta_1 = mysqli_query($mysqli, $_Cuen_1);
				$_Total_1 = mysqli_num_rows($_Cuenta_1);
				// ------------------------------------------------------  
				// Iniciamos el paginador y usamos GROUP y COUNT para hacer el recuento de las diferentes fechas 
				?>
				<div class="contentadmin">
					<?php
						echo "<h3 align='center'>Usuarios registrados por mes del año $anyo_actual</h3>"; 
					?>
					<form class="contact_form" name="contact_form" method="post">
						<div align="center">
							<table border="0" width="auto" style="font-family: Verdana; font-size: 10pt" id="table1" cellspacing="0" cellpadding="0">  
								<tr>
									<td width="33%"><b>Mes</b></td>     
									<td width="33%"><b>Frecuencia</b></td>   
									<td width="33%"><b>Porcentaje </b></td>   
								</tr>
								<?php

								//$pagi_sql ="SELECT count(FechaEntrada) as cuenta FROM reg_visitas GROUP BY FechaEntrada ORDER BY Month(FechaEntrada) DESC;";
								//$pagi_sql ="SELECT count(MONTH(FechaEntrada)) as cuenta FROM reg_visitas WHERE YEAR(FechaEntrada) = $anyo_actual GROUP BY Month(FechaEntrada) ORDER BY Month(FechaEntrada) DESC;";
								$pagi_sql ="SELECT count(MONTH(FechaEntrada)) as cuenta FROM reg_visitas WHERE YEAR(FechaEntrada) = $anyo_actual GROUP BY Month(FechaEntrada) ORDER BY Month(FechaEntrada) ASC;";
								$pagi_mes_sql ="SELECT MONTH(FechaEntrada) FROM reg_visitas WHERE YEAR(FechaEntrada) = $anyo_actual GROUP BY Month(FechaEntrada) ORDER BY Month(FechaEntrada) ASC;";
								$_pagi_result = mysqli_query($mysqli,$pagi_sql);
								$_pagi_mes_sql = mysqli_query($mysqli,$pagi_mes_sql);
								$_total_registros = mysqli_num_rows($_pagi_result);			// Cuenta el numero de grupos
								//echo $_total_registros;
								//$_pagi_cuantos = 50;    // Numero de registros por pagina ( **** ) 

									//include("paginator.inc.php");    // ( **** )
								//while ($registro = mysqli_fetch_array($_pagi_result)){     
								$mes=0;
								$mes=date("n")+1;
								//$mes = 13;     //Ejemplo agregado para manejar siempre un año.
								while ($registro = mysqli_fetch_array($_pagi_result)){
									
									$registro_mes = mysqli_fetch_array( $_pagi_mes_sql );
									$cuenta = 0;        // Convertimos -cuenta- en variable operativa
									$cuenta = $cuenta + $registro['cuenta'];    // Si no deseamos operar esta variable en el ECHO ponemos ".$registro['cuenta']."
									// Calculamos los porcentajes   
									$porcen_fecha = ($cuenta * 100) / $_Total_1;   
									$porcentaje_fecha = round($porcen_fecha,3);        // Redondeamos a 4 decimales
									// Introducimos colores alternos para las filas ( **** )
									if (@$colorfila == 0){  
									   $color = "#CCFFFF";     // Color para las filas impares  
									   $colorfila = 1;  
									}else{  
									   $color = "#FFCC99";    // Color para las filas pares  
									   $colorfila = 0;  
									}  
									$mes = $registro_mes[0]-1;
									$mes_nombre = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"][$mes];
									//$mes_nombre = (int)date("F", $mes);
									echo "     
									<tr>   
										  <td width='33%' bgcolor='".$color."'>$mes_nombre</td>     
										  <td width='33%' bgcolor='".$color."'>$cuenta</td>   
										  <td width='33%' bgcolor='".$color."'>$porcentaje_fecha %</td>   
									</tr>     
									";
								}
								echo " 
										<tr>   
											  <td width='30%'><b> $_total_registros</b></td>     
											  <td width='40%'><b> $_Total_1</b></td>   
											  <td width='30%'><b> 100 % </b></td>   
										</tr>
									";
								?>
							</table>  
						</div>
					</form>
				</div>
			<br/>
		</div>
		<!--Agregaremos los botones de los registros que entregaran los archivos PDF en el formato del SGC-->
		<form action="def_registro.php" method="POST" align="center">
			<input name="tipo_registro" type="submit" value="Registro Diario" />
			<input name="tipo_registro" type="submit" value="Registro Mes" />
			<input name="tipo_registro" type="submit" value="Registro Año" />
			<input name="tipo_registro" type="submit" value="Reportes" />
		</form>
		<br/>
		<a href="cerrar_sesion_admin.php">Regresar</a>
		<br/>
		<br/>
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