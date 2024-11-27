<!DOCTYPE html>
<html>
	<head>
		<title>Selecciona servicios</title>
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="js/functions.js"></script>
		<script src="js/plantillas.js"></script>
	</head>

	<body>
		<!--Plantilla del encabezado guardado en plantillas.js-->
		<script>hacerEncabezado();</script>
		<div class="welcome">
			BIENVENIDO (A)
		</div>
		<div class="clearfix">
			<form id="form_serv" name="form_serv" method="post" action="registrado.php">
				<div class="content column01">
					<div class="info">
					<?php
						session_start();
						echo "".$_SESSION['nombre'];
						
						
					?>
					</div>
					<div class="linea_azul"></div>
					<div class="clearfix">
						<form class="contact_form">
							<div class="menu">
								<div class="sel_tip">Selecciona el tipo de servicio a utilizar</div>
								<ul>
									<table class="table_design">
										<tr>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Sala" placeholder="Selecciona el tipo de servicio requerido">Consulta de libros en sala</label>
												</li>
											</td>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Tesis" placeholder="Selecciona el tipo de servicio requerido">Entrega, Asesoría o Información de tesis</label>
												</li>
											</td>
											<td>
												<div class="edit_otro">
													<li>
														<label><input type="checkbox" id="check_otro" name="checkbox[]" class="checkbox_redondo" value="Otro" placeholder="Selecciona el tipo de servicio requerido" onclick="activarText('input_otro', 'check_otro')">Otro</label>
													</li>
													<input type="txt" id="input_otro" class="input_otro" name="otroserv" placeholder="Escribe el servicio" disabled required>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Domicilio" placeholder="Selecciona el tipo de servicio requerido">Préstamo de libros a domicilio</label>
												</li>
											</td>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Tesiteca" placeholder="Selecciona el tipo de servicio requerido">Tesiteca</label>
												</li>
											</td>
										</tr>
										<tr>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Inter" placeholder="Selecciona el tipo de servicio requerido">Préstamo interbibliotecario</label>
												</li>
											</td>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="BaseDatos" placeholder="Selecciona el tipo de servicio requerido">Consulta de Base de Datos</label>
												</li>
											</td>
										</tr>
										<tr>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Devolucion" placeholder="Selecciona el tipo de servicio requerido">Devolución de Libros</label>
												</li>
											</td>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="riaa" placeholder="Selecciona el tipo de servicio requerido">Consulta RIAA</label>
												</li>
											</td>
										</tr>
										<tr>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="internet" placeholder="Selecciona el tipo de servicio requerido">Área de Trabajo con Internet</label>
												</li>
											</td>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Guiadas" placeholder="Selecciona el tipo de servicio requerido">Visitas guiadas</label>
												</li>
											</td>
										</tr>
										<tr>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Cubiculo" placeholder="Selecciona el tipo de servicio requerido">Cubículo de estudio<br>Máximo 4 personas por 2 hrs</label>
												</li>
											</td>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="SUM" placeholder="Selecciona el tipo de servicio requerido">Sala de usos múltiples</label>
												</li>
											</td>
										</tr>
										<tr>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Computo" placeholder="Selecciona el tipo de servicio requerido">Centro de cómputo</label>
												</li>
											</td>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Auditorio" placeholder="Selecciona el tipo de servicio requerido">Auditorio</label>
												</li>
											</td>
										</tr>
										<tr>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="Referencia" placeholder="Selecciona el tipo de servicio requerido">Solicitud de Información<br>Referencia y Asesoría</label>
												</li>
											</td>
											<td>
												<li>
													<label><input type="checkbox" name="checkbox[]" class="checkbox_redondo" value="cultura" placeholder="Selecciona el tipo de servicio requerido">Actividades Culturales</label>
												</li>
											</td>
										</tr>
									</table>
								</ul>
								<br/>
							</div>
						</form>
					</div>
					<div style="width:auto; text-align:center;">
						<? $_SESSION['mensaje']=''; ?>
						<input type="submit" id="submit_servicio" class="env_dep" value="ENVIAR"/>
					</div>
				</div>
			</form>
		</div>
		<div class="footerext">
			<table>
				<tr>
					<th class="logof">
					</th>

					<th class="txtf">
						Universidad Autónoma del Estado de Morelos Av. Universidad 1001. Col. Chamilpa. Cuernavaca, Morelos. C. P. 62209.
					</th>

					<th class="logof">
					</th>
				</tr>
		   </table>
		</div>
	</body>
</html>