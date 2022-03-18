<!DOCTYPE html>
<html>
	<head>
		<title>Probando la pagina</title>
		<link rel="stylesheet" type="text/css" href="css/bibli.css"> 
		<link rel="icon" type="image/png" href="images/favicon.ico" />
		<meta charset="utf-8">
		<script src = "js/functions.js"></script>
	</head>
	
	<body>
		<div class="header">
			<table>
				<tr>
					<th class="logo"><img src="images/uaem.png" width="160"  alt="UAEM" title="UAEM" /></th>
					<th class="txt">Universidad Autónoma del Estado de Morelos <br />
					   Dirección de Desarrollo de Bibliotecas <br />
					   Biblioteca Central Universitaria <br />
					</th>
					<th class="logo"><img src="images/bcu.png" width="160" alt="BCU" title="BCU" /></th>
				</tr>
			</table>
		</div>
		
		<div class="clearfix">
			<div class=" content">
				<form class="contact_form" name="contact_form" id="contact_form" action="DefOpcionForm.php" method="post" >
					<ul>
						<li>
							<label for="matricula">Matricula, Código de Barras o No. de Control: </label>
							<input type="text" name="matricula" required autofocus onKeyUp="ConvertirMayusculas(this)" max=13 placeholder="Digita los datos" >
							<!--<input type="text" name="matricula" required autofocus onKeyUp="ConvertirMayusculas(this)" max=13 placeholder="Digita los datos" onblur="ValidarExistencia(this.value)" >-->
						</li>
					</ul>
				</form>
			</div>
		</div>
	</body>
</html>