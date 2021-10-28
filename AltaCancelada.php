<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bibli.css">
		<link rel="icon" type="image/png" href="images/favicon.ico"/>
		<title>Registro BCU</title>
		<script> 
			function close_tab() {
				//window.close_tab();
				window.open('', '_self', ''); //bug fix
				window.close();
			}
		</script>
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
				<ul>
					<h1>Alta Cancelada</h1>
				</ul>
			</div>
		</div>
		
		<center>
		<a href="#" onclick="window.top.close(); return false;">close A</a>
		<br/>
		<br/>
		<a href="javascript:close_tab();">close pertaña</a>
		<br/>
		<br/>
		<input type = "button" name = "close" value = "Close" οnclick = "window.close();" />
		<br/>
		<br/>
		<input name="button" type="button" onclick="this.window.close_tab()" value="Cerrar esta ventana" />
		<br/>
		<br/>
		<button class="closeButton" style="cursor: pointer" onclick="window.close();">Close Window</button>
		<br/>
		</center>
		
		<div>
			<br />
			<a href="FormularioAlta.php">Regresar</a>
			<br />
		</div>
		<br />
		
		
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