<!DOCTYPE html>
<html>
	<head>
		<title>Registro BCU</title>
		<script src="./js/functions.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico">
	</head>
	
	<body>

		<div class="header">
			<table>
				<tr>
					<th class="logo">
						<a href="index.php"><img src="images/uaem.png" width="160" alt="UAEM" title="UAEM" /></a>
					</th>
					<th class="txt">
						Universidad Autónoma del Estado de Morelos <br />
						Dirección de Desarrollo de Bibliotecas <br />
						Biblioteca Central Universitaria <br />
					</th>
					<th class="logo">
						<img src="images/bcu.png" width="160"  alt="BCU" title="BCU" />
					</th>
				</tr>
			</table>
		</div>
		
		<div class="clearfix">
			<form id="formulario" action="proceso.php" method="post">
				<div class="content">
					<h2>
						Bienvenido(a) a la Biblioteca Central Universitaria
					</h2>
					<h3>
						Para acceder a las instalaciones y servicios, es necesario que registres tu<br/>
					</h3>
					<h2><u class="resaltar">ENTRADA</u> y <u class="resaltar">SALIDA</u></h2>
					<h4>
						Escanea tu código de usuario o matrícula
					</h4>
					<input type="txt" class="input_reg" name="user" autofocus required="required" onKeyUp="ConvertirMayusculasSinEspacios(this)" placeholder="Escanea o digita tu número" >
					<input type="submit" class="submit" value="Enviar" />
				</div>
			</form>
			<br/><br/>
		</div>

		<div class="footer">
		 <table>
				  <tr>
						<th class="logof">
						
						</th>
						
						<th class="txtf">
							Universidad Autónoma del Estado de Morelos Av. Universidad 1001. Col. Chamilpa. Cuernavaca, Morelos. C. P. 62209. 
						</th>
						
						<th class="logof">
						   <a href="login.php"> <img id="login" src="images/key.png" /> </a>
						</th>
					 </tr>
			   
		   </table>   
		</div>
		<div class="version">v 0.1</div>
	</body>
</html>