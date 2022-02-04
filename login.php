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
						<th class="logo"><img src="images/uaem.png" width="100"  alt="UAEM" title="UAEM" /></th>
						<th class="txt">Universidad Autónoma del Estado de Morelos <br />
						   Dirección de Desarrollo de Bibliotecas <br />
						   Biblioteca Central Universitaria <br /></th>
						<th class="logo"><img src="images/bcu.png" width="100"  alt="BCU" title="BCU" /></th>
					 </tr>
			</table>
		</div>
		
		<div class="clearfix">
			<div class="content">
				<form class="contact_form" action="Alogeo.php" name="contact_form" method="post">
					<div class="encabezado">
						<h3>Bienvenido/a al módulo de administración</h3>
						<br/>
						<span class="required_notification">Todos los campos con <b>* </b>son requeridos</span>
						<br/>
						<p>
							Proporciona la información solicitada en el siguiente formulario.
						</p>
					</div>
					<ul>
						<li>
							<label for="usuario">Usuario: </label>
							<input type="txt"  name="ausuario"  required="required" autofocus placeholder="Digita tu usuario" >
						</li>
						<li>
							<label for="pwd">Password: </label>
							<input type="password" name="apdw"  required="required"  placeholder="Digita tu password" >
						</li>
					</ul>
					<br/>
					<center>
						<input type="submit" class="submit" value="Acceder" />
						<input type="reset" class="submit" value="Limpiar formulario" formaction="index.php">
					</center>
				</form>
			</div>
			<br/>
		</div>
		 
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