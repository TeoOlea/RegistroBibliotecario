<!DOCTYPE html>
<html>
	<head>
		<script src="./js/functions.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bibli.css"> 
		<link rel="icon" type="image/png" href="images/favicon.ico" />
		<meta charset="utf-8">
		<title>Alta de usuario</title>
	</head>
	
	<body>
		<div class="header">
			<table>
				<tr>
					<th class="logo"><img src="images/uaem.png" width="100"  alt="UAEM" title="UAEM" /></th>
					<th class="txt">Universidad Autónoma del Estado de Morelos <br />
					   Dirección de Desarrollo de Bibliotecas <br />
					   Biblioteca Central Universitaria <br />
					</th>
					<th class="logo"><img src="images/bcu.png" width="100" alt="BCU" title="BCU" /></th>
				</tr>
			</table>
		</div>
		
		<?php 
			session_start();
			include('conexion.php');
			$mysqli =new mysqli ($host,$user,$pw, $db);
			$mysqli->set_charset("utf8");
		?>
		<div class="clearfix">
			<div class=" content">
			<!-- De las opciones de los submit mandamos la opción a DefOpcionForm para elegir que hacer despues -->
				<form class="contact_form" name="contact_form" id="contact_form" action="DefOpcionForm.php" method="post" >
				<ul>
				<li>
					<h2>Alta de usuario</h2>
					<br/>
					<span class="required_notification">Todos los campos con <b>* </b>son requeridos</span>
					<br/>
					<p>
						Proporciona la información solicitada en el siguiente formulario.
					</p>
				</li>
				<li>
					<label for="matricula">Matricula o No. de Control: </label>
					<input type="text" name="matricula" required autofocus max=13 placeholder="Digita los datos" >
				</li>
				<li>
					<label for="nombre"> Nombre(s): </label>
					<input type="text" name="nombre" required onKeyUp="this.value = this.value.toUpperCase();" placeholder="Digita tu(s) nombre(s)" >
				</li>
				<li>
					<label for="apes"> Apellidos: </label>
					<input type="text" name="apes" required onKeyUp="this.value = this.value.toUpperCase();" placeholder="Digita tus apellidos" >
				</li>
				<!-- ----------------------------------------------------------------------- -->
				<!-- --------------Agregaremos los nuevos campos para el registro inicial con QR--------------------------------------------------------- -->
				<li>
					<label for="uni_aca">Unidad Académica: </label>
					<select name="uni_aca" id="uni_aca" required placeholder="Elige una unidad academica">
						<option value="" selected>Seleccione:</option>
						<?php
							$sqlquery1 = "SELECT * FROM uniacademica";
							$query = $mysqli->query($sqlquery1);
							while( $tabla_uniacad = mysqli_fetch_array($query) ){
								echo "<option value='".$tabla_uniacad['IDuniaca']."'>".$tabla_uniacad['nom_uniaca']."</option>";
							}
						?>
					</select>
				</li>
				<li>
					<label for="pro_edu">Programa Educativo: </label>
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
				</li>
				<!-- ----------------------------------------------------------------------- -->
				<li>
					<label for="ExtTipo"> Tipo usuario: </label>
					<select name="ExtTipo" required placeholder="Selecciona una de la opciones"> 
						<option value="" selected>Seleccione:</option>
						<?php
							//echo '<script>alert("Hola Mundo");</script>';
							$sqlquery1 = "SELECT * FROM tipousuario";
							$query = $mysqli->query($sqlquery1);
							while( $tabla_programedu = mysqli_fetch_array($query) ){
								echo "<option value='".$tabla_programedu['IDusuario']."'>".$tabla_programedu['tusuario']."</option>";
							}
						?>
					</select>
				</li>
				<li>
					<label for="genero">Género: </label>
					<label><input type="radio" name="genero" value="F" required placeholder="Selecciona tu género"> Femenino </label>
					<label><input type="radio" name="genero" value="M" placeholder="Selecciona tu género">Masculino </label>
				</li>
				<li>
					<label for="email">Correo electrónico: </label>
					<input type="email" name="email" required placeholder="Digita tu email" >
					<span class="form_hint">formato correcto "name@something.com"</span></td>
				</li>
				</ul>
				<br/>
				<br/>
					<input type="hidden" value="Opcion" id="OpcionElegida" name="OpcionElegida" />
					<input type="submit" value="Dar de alta" id="evento_alta" name="evento_alta" onclick="javascript:ValidarRequired();"/>
					<input type="submit" value="Cancelar" id="evento_cancelar" name="evento_cancelar" onclick="javascript:NoValidarRequired();" />
				</form>
				<!-- Ejemplo de un formulario con varios botones Teo 22/10/2021
				<form action="DefOpcionForm.php" name="form1" id="form1" method="post">
					<input type="hidden" value="Usuario" id="OpcionElegida" name="OpcionElegida" />
					<input type="submit" value="Crear usuario" id="evento_nuevo" name="evento_nuevo" />
					<input type="submit" value="Eliminar usuario" id="evento_eliminar" name="evento_eliminar" />
					<input type="submit" value="Cancelar" id="evento_cancelar" name="evento_cancelar" />
				</form>
				-->
			</div>
			<br/>
		</div>
		
		<div class="footerext">
			<table>
				<tr>
				<th class="logof"></th>
				<th class="txtf">
					Universidad Autónoma del Estado de Morelos Av. Universidad 1001. Col. Chamilpa. Cuernavaca, Morelos. C. P. 62209. 
				</th>
						
				<th class="logof"></th>
				</tr>
			</table>   
		</div>
	</body>
</html>
