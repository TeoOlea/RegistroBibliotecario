<!DOCTYPE html>
<html>
	<head>
		<title>Selecciona servicios</title>
		<link rel="stylesheet" type="text/css" href="css/bcu.css">
		<link rel="icon" type="image/png" href="favicon.ico" />
	</head>

	<body>
		<div class="header">
			<table>
				<tr>
					<th class="logo"><img src="images/uaem.png" width="100"  alt="UAEM" title="UAEM" /></th>
					<th class="txt">Universidad Autónoma del Estado de Morelos <br />
						Dirección de Desarrollo de Bibliotecas <br />
						Biblioteca Centrla Universitaria <br /></th>
					<th class="logo"><img src="images/bcu.png" width="100"  alt="BCU" title="BCU" /></th>
				</tr>
			</table>
		</div>

		<div class="clearfix">
			<form id="formulario" method="post" onsubmit="return verificar_uno();" action="registrado.php">
				<div class="content column01">
					<h3>Bienvenido/a <?php
						session_start();
						echo $_SESSION['nombre'];
						echo '<br/>';
						echo 'Tipo de usuario: ' . $_SESSION['cargo'];
						echo '<br/>';
						echo 'Sexo: ' . $_SESSION['genero'];
						echo '<br/>';
						echo 'ID PE: ' . $_SESSION['proedu'];
						echo '<br/>';
						/* echo 'Estatus: ' . $_SESSION['estatus'];*/
						echo '<br/>';
					?></h3>

					<div class="menu" style="width:auto; text-align:justify; padding: 0px; margin: 0px;">
						<ul>
							<p>Selecciona el tipo de servicio a utilizar </p>
							<table style="margin:5px auto 0px auto; width:700 px; text-align:justify;">
								<tr>
									<th>
										<li><input type="checkbox" name="checkbox[]" value="Sala" placeholder="Selecciona el tipo de servicio requerido">Consulta en sala<br></li>
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
										<li><input type="checkbox" name="checkbox[]" value="Tiflotecnologia" placeholder="Selecciona el tipo de servicio requerido">Módulo de tiflotecnología<br></li>
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
										<li><input type="checkbox" name="checkbox[]" value="Noadeudo" placeholder="Selecciona el tipo de servicio requerido">Expedición de constancias<br></li>
									</th>
									<th>
										<li><input type="checkbox" name="checkbox[]" value="Tesis" placeholder="Selecciona el tipo de servicio requerido">Recepción de tesis<br></li>
									</th>
									<th>
									<li><input type="checkbox" name="checkbox[]" value="Guiadas" placeholder="Selecciona el tipo de servicio requerido">Visitas guiadas<br></li>
									</th>
								</tr>
								<tr>
									<th>
									<li><input type="checkbox" name="checkbox[]" value="Otro" placeholder="Selecciona el tipo de servicio requerido">Otro<br></li>
									</th>
									<th>

									</th>
									<th>

									</th>
								</tr>
							</table>
						</ul>
						<br/>
						<br/>
					</div>
					<div style="width:auto; text-align:center; margin: 1rem; padding: 1rem;">
						<? $_SESSION['mensaje']=''; ?>
						<input type="submit" class="submit" value="Registrar" />
					</div>
			</form>
		</div>

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