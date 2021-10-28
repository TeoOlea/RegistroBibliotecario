<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bibli.css"> 
		<link rel="icon" type="image/png" href="favicon.ico" />
		<title>ERROR</title>
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
			<?php session_start(); ?>
		<p>
			<br/>
			<h2> 
				<?php echo $_SESSION['mensaje']; ?>
			</h2>
		</p>
		<p>
			<?php
				session_destroy();
	  
				echo '<a href="index.php">Regresar</a>';
			?>
		</p>
	</div>
	
	<div class="footer">
		 <table>
				  <tr>
						<th class="logo">
						
						</th>
						
						<th class="txt">
							Universidad Autónoma del Estado de Morelos Av. Universidad 1001. Col. Chamilpa. Cuernavaca, Morelos. C. P. 62209. 
						</th>
						
						<th class="logo">
						</th>
					 </tr>
			   
		   </table>   
		</div>
	</body>
</html>