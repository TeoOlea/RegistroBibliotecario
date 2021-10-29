<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico"/>
		<title>Registro BCU</title>
		<script> 
			function close_tab() {
				window.close_tab();
			}
		</script>
	</head>
	
	<body>

		<?php
			session_start();
			$tipoDeAlta = $_SESSION['tipo_salida'];
		?>
		
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
				<ul>
					<h1>Alta Exitosa</h1>
				</ul>
			</div>
		</div>
		
		<div>
			<br />
			<?php
				if( $tipoDeAlta == "alta" ){
					echo "<a href='FormularioAlta.php'>Regresar</a>";
				}else if( $tipoDeAlta == "alta-externo" ){
					echo "<a href='FormularioAltaExterno.php'>Regresar</a>";
				}
			?>
			<br />
		</div>
		<br/>
		
		
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
	</body>
</html>