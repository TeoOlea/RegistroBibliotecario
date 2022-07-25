<!DOCTYPE html>
<html>
	<head>
		<title>Selecciona servicios</title>
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="./js/functions.js"></script>
	</head>

	<body>
		<div class="header">
			<table>
				<tr>
					<th class="logo"><a href="index.php"><img src="images/uaem.png" width="160"  alt="UAEM" title="UAEM" /></th>
					<th class="txt">Universidad Autónoma del Estado de Morelos <br />
						Dirección de Desarrollo de Bibliotecas <br />
						Biblioteca Central Universitaria <br /></th>
					<th class="logo"><img src="images/bcu.png" width="160"  alt="BCU" title="BCU" /></th>
				</tr>
			</table>
		</div>

		<div class="clearfix">
			<form id="formulario" method="post" onsubmit="return verificar_uno();" action="registrado.php">
				<div class="content column01">
					<h3>Bienvenido/a&nbsp;
					<?php
						session_start();
						echo "".$_SESSION['nombre'];
						echo '<br/>';
						echo '<br/>';
					?>
					</h3>
					<div class="clearfix">
					<form class="contact_form">
					<div class="menu" style="width:auto; padding: 0px; margin: 0px;">
						<ul>
							<p>Selecciona el tipo de servicio a utilizar </p>
							<table style="margin:5px auto 0px auto; text-align:justify;">
								<tr>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Sala" placeholder="Selecciona el tipo de servicio requerido">Consulta en sala</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Info" placeholder="Selecciona el tipo de servicio requerido">Solicitud de Información</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Domicilio" placeholder="Selecciona el tipo de servicio requerido">Préstamo a domicilio</br>(sólo con código de barras vigente)</li></label>
									</th>
								</tr>

								<tr>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Referencia" placeholder="Selecciona el tipo de servicio requerido">Referencia y asesoría</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="BaseDatos" placeholder="Selecciona el tipo de servicio requerido">Consulta de Base de Datos</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Tesiteca" placeholder="Selecciona el tipo de servicio requerido">Tesiteca</li></label>
									</th>
								</tr>
								<tr>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Cubiculo" placeholder="Selecciona el tipo de servicio requerido">Cubículo de estudio<br>(máximo 2 personas, 2 hrs)</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Videoteca" placeholder="Selecciona el tipo de servicio requerido">Videoteca</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Computo" placeholder="Selecciona el tipo de servicio requerido">Uso de computadora</li></label>
									</th>
								</tr>
								<tr>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Devolucion" placeholder="Selecciona el tipo de servicio requerido">Devolución de Libros</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Auditorio" placeholder="Selecciona el tipo de servicio requerido">Auditorio</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Inter" placeholder="Selecciona el tipo de servicio requerido">Préstamo interbibliotecario</li></label>
									</th>
								</tr>
								<tr>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Tesis" placeholder="Selecciona el tipo de servicio requerido">Recepción de tesis</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="riaa" placeholder="Selecciona el tipo de servicio requerido">RIAA</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="SUM" placeholder="Selecciona el tipo de servicio requerido">Sala de usos múltiples</li></label>
									</th>
								</tr>
								<tr>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Guiadas" placeholder="Selecciona el tipo de servicio requerido">Visitas guiadas</li></label>
									</th>
									<th>
										<label><li><input type="checkbox" name="checkbox[]" value="Otro" placeholder="Selecciona el tipo de servicio requerido">Otro</li></label>
									</th>
								</tr>
							</table>
						</ul>
						<br/>
						<br/>
					</div>
					</form>
					</div>
					<div style="width:auto; text-align:center;">
						<? $_SESSION['mensaje']=''; ?>
						<input type="submit" id="submit_servicio" class="submit" value="Registrar" onclick="ocultarBoton('submit_servicio')"/>
					</div>
			</form>
		</div>

		<div class="footer">
			<table>
				<tr>
					<th class="logo">
					</th>

					<th class="txtf">
						Universidad Autónoma del Estado de Morelos Av. Universidad 1001. Col. Chamilpa. Cuernavaca, Morelos. C. P. 62209.
					</th>

					<th class="logo">
					</th>
				</tr>
		   </table>
		</div>
	</body>
</html>