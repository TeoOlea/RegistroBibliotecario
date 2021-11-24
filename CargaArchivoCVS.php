<!DOCType html>
<html>
	<head>
		<title>Carga de Archivo</title>
		<link rel="icon" type="image/png" href="images/favicon.ico"/>
		<script src = "js/functions.js"></script>
	</head>
	
	<body>
		<button>Cargar</button>
		
		<form method="post" action="subir_archivo.php" enctype="multipart/form-data">
			<input type="file" name="archivo" onchange="ObtenerNombre(this.value)"/><br/>
			<input type="file" onchange="nombre(this.value)" />
			<input type="submit" value="Enviar" />
		</form>
	<!--  <?php
	/*$linea = 0;
	//Abrimos nuestro archivo
	$archivo = fopen("clientes.csv", "r");
	//Lo recorremos
	while (($datos = fgetcsv($archivo, ",")) == true)
	{
	  $num = count($datos);
	  //Recorremos las columnas de esa linea
	  for ($columna = 0; $columna &lt; $num; $columna++)
		  {
			 echo $datos[$columna] . "\n";
		 }
	}
	//Cerramos el archivo
	fclose($archivo);*/
	?> -->
	</body>

</html>

