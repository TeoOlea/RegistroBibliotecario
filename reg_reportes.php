<!doctype html>
<html>
	<head>
		<title>Reportes</title>
		<link rel="stylesheet" type="text/css" href="css/bibli.css"> 
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<script src="./js/functions.js"></script>
	</head>

	<body>
		<div class="header">
			<table>
				<tr>
					<th class="logo"><a href="index.php"><img src="images/uaem.png" width="160"  alt="UAEM" title="UAEM" /></th>
					<th class="txt">
						Universidad Autónoma del Estado de Morelos<br/>
						Dirección de Desarrollo de Bibliotecas<br />
						Biblioteca Central Universitaria<br />
					</th>
					<th class="logo"><img src="images/bcu.png" width="160"  alt="BCU" title="BCU" /></th>
				</tr>
			</table>
		</div>
		<br/>
		<div class="content">
			<h4>¿Sobre quien necesitas los informes?</h4><br/>
			<label>Tipo usuario: </label>
			<select name="TipoUsu" placeholder="Digita tu nombre/s">
				<option value="" selected>Seleccione:</option>
				<option value="1">Hombres</option> 
				<option value="2">Mujeres</option> 
				<option value="3">Estudiantes Nivel Medio (Bachillerato)</option>
				<option value="4">Estudiantes Nivel Superior</option>
				<option value="5">Estudiantes Posgrado</option>
				<option value="6">Investigador</option> 
				<option value="6">Académico</option> 
				<option value="6">Administrativo</option> 
				<option value="6">Externo</option> 
			</select><br/>
		</div>
		<h4 align="center">¿Qué servicios usaron?</h4><br/>
		<div class="menu" style="width:auto; text-align:justify; padding: 0px; margin: 0px;">
			<ul>
				<p>Selecciona el tipo de servicio a utilizar </p>
				<table style="margin:5px auto 0px auto; width:700 px; text-align:justify;">
					<tr>
						<th>
							<li><label><input type="checkbox" name="checkbox[]" value="Sala" placeholder="Selecciona el tipo de servicio requerido">Consulta en sala<label><br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Domicilio" placeholder="Selecciona el tipo de servicio requerido">Préstamo a domicilio<br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Inter" placeholder="Selecciona el tipo de servicio requerido">Préstamo interbibliotecario<br></li>
						</th>
					</tr>

					<tr>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Referencia" placeholder="Selecciona el tipo de servicio requerido">Referencia y asesoría<br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="BaseDatos" placeholder="Selecciona el tipo de servicio requerido">Consulta de Base de Datos<br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Tesiteca" placeholder="Selecciona el tipo de servicio requerido">Tesiteca<br></li>
						</th>
					</tr>
					<tr>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Cubiculo" placeholder="Selecciona el tipo de servicio requerido">Cubículo de estudio<br></li>
						</th>
						<th >
							<li><input type="checkbox" name="checkbox[]" value="Videoteca" placeholder="Selecciona el tipo de servicio requerido">Videoteca<br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Computo" placeholder="Selecciona el tipo de servicio requerido">Uso de computadora<br></li>
						</th>
					</tr>
					<tr>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Noadeudo" placeholder="Selecciona el tipo de servicio requerido">Expedición de constancias<br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Auditorio" placeholder="Selecciona el tipo de servicio requerido">Auditorio<br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="SUM" placeholder="Selecciona el tipo de servicio requerido">Sala de usos múltiples<br></li>
						</th>
					</tr>
					<tr>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Tesis" placeholder="Selecciona el tipo de servicio requerido">Recepción de tesis<br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Guiadas" placeholder="Selecciona el tipo de servicio requerido">Visitas guiadas<br></li>
						</th>
						<th>
							<li><input type="checkbox" name="checkbox[]" value="Otro" placeholder="Selecciona el tipo de servicio requerido">Otro<br></li>
						</th>
					</tr>
				</table>
			</ul>
		</div>
		<?php 
			include('conexion.php');
			$mysqli =new mysqli ($host,$user,$pw, $db);
			$mysqli->set_charset("utf8");
		?>
		<div class="content">
			<h4>¿Sobre que programa educativo?</h4><br/>
			<select name="pro_edu"id="pro_edu" required placeholder="Elige tu programa educativo">
				<option value="" selected>Seleccione:</option>
				<?php
					$sqlquery1 = "SELECT * FROM programedu";
					$query = $mysqli->query($sqlquery1);
					while( $tabla_programedu = mysqli_fetch_array($query) ){
						echo "<option value='".$tabla_programedu['IDprogramedu']."'>".$tabla_programedu['nom_programedu']."</option>";
					}
				?>
			</select>
		</div>
		
		<br />
		<a href="estadistica.php">Regresar</a>
		<br />
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