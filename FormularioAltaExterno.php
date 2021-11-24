<!DOCTYPE html>
<html>
	<head>
		<script src="./js/functions.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bibli.css"> 
		<link rel="icon" type="image/png" href="images/favicon.ico" />
		<meta charset="utf-8">
		<title>Alta de usuario externo</title>
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
					<th class="logo"><img src="images/bcu.png" width="100"  alt="BCU" title="BCU" /></th>
				</tr>
			</table>
		</div>

		<div class="clearfix">
			<div class=" content">
			<form class="contact_form" name="contact_form" id="contact_form" action="DefOpcionForm.php" method="post" >
			<ul>
				<li>
					<h2>Alta de usuario externo</h2>
					<br/>
					<span class="required_notification">Todos los campos con <b>* </b>son requeridos</span>
					<br/>
					<p>
						Proporciona la información solicitada en el siguiente formulario.
					</p>
				</li>
				<li>
					<label for="curp">CURP o RFC </label>
					<input type="text" name="curp" required="required" autofocus onKeyUp="ConvertirMayusculas(this)" placeholder="Digita tu CURP en mayúsculas" >
				</li>
				<li>
					<label for="nombre"> Nombre/s: </label>
					<input type="text" name="nombre" required="required" onKeyUp="ConvertirMayusculas(this)" placeholder="Digita tu nombre/s" >
				</li>
				<li>
					<label for="apes"> Apellidos: </label>
					<input type="text" name="apes"  required="required" onKeyUp="ConvertirMayusculas(this)" placeholder="Digita tus apellidos" >
				</li>
				<li>
					<label for="ExtTipo"> Tipo usuario: </label>
					<select name="ExtTipo" placeholder="Digita tu nombre/s">
						<option value="" selected>Seleccione:</option>
						<option value="1">Exalumno</option> 
						<option value="2">Exempleado</option> 
						<option value="3">Estudiante de otra institución</option>
						<option value="4">Público en general</option> 
					</select>
				</li>
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
					<input type="submit" value="Dar de alta" id="evento_alta" name="evento_alta-externo" onclick="ValidarRequired()" disabled />
					<input type="submit" value="Cancelar" id="evento_cancelar" name="evento_cancelar-externo" onclick="NoValidarRequired()" />
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
