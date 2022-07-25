<!DOCTYPE html>
<html>
	<head>
		<title>Alta de usuario externo</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bibli.css"> 
		<script src = "js/functions.js"></script>
		<link rel="icon" type="image/png" href="images/favicon.ico">
	</head>
	
	<body>
		<div class="header">
			<table>
				<tr>
					<th class="logo"><a href="index.php"><img src="images/uaem.png" width="160"  alt="UAEM" title="UAEM" /></th>
					<th class="txt">
						Universidad Autónoma del Estado de Morelos <br/>
						Dirección de Desarrollo de Bibliotecas <br/>
						Biblioteca Central Universitaria <br/>
					</th>
					<th class="logo"><img src="images/bcu.png" width="160" alt="BCU" title="BCU" /></th>
				</tr>
			</table>
		</div>
		
		<?php 
			session_start();
			include('conexion.php');
			$mysqli =new mysqli ($host,$user,$pw, $db);
			$mysqli->set_charset("utf8");
			
			//Cargamos los usuarios dados de alta en la base de datos
			$sqlquery0 = "SELECT `matricula` FROM usuariosbibli WHERE `matricula` != '' AND `matricula` IS NOT NULL";
			$query = $mysqli->query( $sqlquery0 );
			//
			$arreglo_matricula = [];
			$index_arrmat = 0;
			while( $columna_matricula = mysqli_fetch_array($query) ){
				//echo $columna_matricula['matricula']."<br/>";
				$arreglo_matricula[$index_arrmat] = $columna_matricula['matricula'];
				$index_arrmat++;
			}
		?>

		<div class="clearfix">
			<div class=" content">
			<!-- De las opciones de los submit mandamos la opción a DefOpcionForm para elegir que hacer despues -->
			<form class="contact_form" name="contact_form" id="contact_form" action="DefOpcionForm.php" method="post" >
				<div class="encabezado">
					<h2>Alta de usuario externo</h2>
					<br/>
					<span class="required_notification">Todos los campos con <b>* </b>son requeridos</span>
					<br/>
					<p>
						Proporciona la información solicitada en el siguiente formulario.
					</p>
				</div>
				<ul>
					<li>
						<dl>
							<dd>
								<label for="curp">Teléfono o Correo Electronico</label>
								<input type="text" id="curp" name="curp" autocomplete="off" required maxlength="18" placeholder="Digita tu CURP" onKeyUp='ValidarCURP(this, <?php echo json_encode( $arreglo_matricula ); ?>)'  >
							</dd>
							<dt><label id="text_comment" class="exito" hidden>El usuario está disponible</label></dt>
						</dl>
					</li>
					<li>
						<label for="nombre"> Nombre/s: </label>
						<input type="text" name="nombre" required="required" autocomplete="off" onKeyUp="ConvertirMayusculas(this)" placeholder="Digita tu nombre/s" pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ ]+$" >
					</li>
					<li>
						<label for="apes"> Apellidos: </label>
						<input type="text" name="apes"  required="required" autocomplete="off" onKeyUp="ConvertirMayusculas(this)" placeholder="Digita tus apellidos" pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ ]+$" >
					</li>
					<li>
						<label for="ExtTipo"> Tipo usuario: </label>
						<select name="ExtTipo" placeholder="Digita tu nombre/s">
							<option value="" selected>Seleccione:</option>
							<option value="1">Egresado</option> 
							<option value="2">Exempleado</option> 
							<option value="3">Estudiante de otra institución</option>
							<option value="4">Público en general</option> 
						</select>
					</li>
					<li>
						<label for="genero">Género: </label>
						&nbsp;
						<label class="ratio_appearance"><input type="radio" name="genero" value="Hombre" required placeholder="Selecciona tu género">Hombre  </label>
						&nbsp;
						<label class="ratio_appearance"><input type="radio" name="genero" value="Mujer" placeholder="Selecciona tu género">Mujer</label>
					</li>
					<li>
						<label for="email">Correo electrónico: </label>
						<input type="email" name="email" required placeholder="Digita tu email" >
						<span class="form_hint">formato correcto "name@something.com"</span></td>
					</li>
				</ul>
				<br/>
				<input type="hidden" value="Opcion" id="OpcionElegida" name="OpcionElegida" />
				<input type="submit" value="Dar de alta" id="evento_alta" class="evento_alta_gris" name="evento_alta-externo" onclick="ValidarRequired()" disabled />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="Cancelar" id="evento_cancelar" class="evento_cancelar" name="evento_cancelar-externo" onclick="NoValidarRequired()" />
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
