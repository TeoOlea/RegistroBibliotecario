<!DOCTYPE html>
<html>
	<head>
		<title>Alta de usuario</title>
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
					<th class="txt">Universidad Autónoma del Estado de Morelos <br />
					   Dirección de Desarrollo de Bibliotecas <br />
					   Biblioteca Central Universitaria <br />
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
			
			//Vamos a hacer una prueba sobre la consulta de usuarios existentes en la BD y evaluar si un usuario existe dentro
			//de la base de datos o nom_programedu
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
			//
			$sqlquery0 = "SELECT `codigobarra` FROM usuariosbibli WHERE `codigobarra` != '' AND `codigobarra` IS NOT NULL";
			$query = $mysqli->query( $sqlquery0 );
			//
			$arreglo_codigobarra = [];
			$index_codbar = 0;
			while( $columna_codigobarra = mysqli_fetch_array($query) ){
				//echo $columna_codigobarra['codigobarra']."<br/>";
				$arreglo_codigobarra[$index_codbar] = $columna_codigobarra['codigobarra'];
				$index_codbar++;
			}
			//Arreglos con los datos de las matriculas y los codigos de barras guardados en $arreglo_matricula y $arreglo_codigobarra
			/*
			echo "<pre>";
			var_dump( $arreglo_matricula );
			echo "</pre>";
			echo "<pre>";
			var_dump( $arreglo_codigobarra );
			echo "</pre>";
			
			$json_matriculas = json_encode( $arreglo_matricula );
			echo "<pre>";
			var_dump( $json_matriculas );
			echo "</pre>";
			echo $arreglo_matricula[0]."<br/>";
			echo( json_encode( $arreglo_matricula ) )."<br/>";
			echo $json_matriculas ."<br/>";
			*/
		?>

		<div class="clearfix">
			<div class=" content">
			<!-- De las opciones de los submit mandamos la opción a DefOpcionForm para elegir que hacer despues -->
				<form class="contact_form" name="contact_form" id="contact_form" action="DefOpcionForm.php" method="post">
					<div class="encabezado">
						<h2>Alta de usuario</h2>
						<br/>
						<span class="required_notification">Todos los campos con <b>* </b>son requeridos</span>
						<br/>
						<p>
							Proporciona la información solicitada en el siguiente formulario.
						</p>
					</div>
					<ul>
					<li>
						<dl id="mini" class="lista">
							<dd>
								<label for="matricula">Matricula, Código de Barras o No. de Control: </label>
								<!-- Se recomienda poner los nombres de las funciones a javascript en comilla sencilla dado que la función json_encode incluyé comillas en sus cadena provocando errores al interpretar PHP -->
								<input type="text" id="matricula" name="matricula" class="input_matricula" autocomplete="off" required maxlength="13" placeholder="Digita los datos" onKeyUp='ValidarExistencia( this, <?php echo json_encode( $arreglo_matricula ); ?>, <?php echo json_encode( $arreglo_codigobarra ); ?> )' >
							</dd>
							<dt><label id="text_comment" class="exito" hidden>El usuario está disponible</label></dt>
						</dl>
					</li>
					<!--
						/^[A-Z]+$/i
						Donde:
						^ indica que el patrón debe iniciar con los caracteres dentro de los corchetes
						[A-Z] indica que los caracteres admitidos son letras del alfabeto
						+ indica que los caracteres dentro de los corchetes se pueden repetir
						$ indica que el patrón finaliza con los caracteres que están dentro de los corchetes.
						i indica que validaremos letras mayúsculas y minúsculas (case-insensitive)
					-->
					<li>
						<label for="nombre"> Nombre(s): </label>
						<input type="text" id="nombre" name="nombre" required onKeyUp="ConvertirMayusculas(this)" placeholder="Digita tu(s) nombre(s)" autocomplete="off" pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ\. ]+$" title="Sólo letras" >
					</li>
					<li>
						<label for="apes"> Apellidos: </label>
						<input type="text" id="nombre" name="apes" required onKeyUp="ConvertirMayusculas(this)" placeholder="Digita tus apellidos" autocomplete="off" pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ ]+$" title="Sólo letras" >
					</li>
					<!-- ----------------------------------------------------------------------- -->
					<li>
						<label>Tipo usuario: </label>
						<select name="ExtTipo" required placeholder="Selecciona una de la opciones"> 
							<option value="" selected>Seleccione:</option>
							<?php
								//echo '<script>alert("Hola Mundo");</script>';
								$sqlquery1 = "SELECT * FROM tipousuario WHERE IDusuario != '7'";
								$query = $mysqli->query($sqlquery1);
								while( $tabla_programedu = mysqli_fetch_array($query) ){
									echo "<option value='".$tabla_programedu['IDusuario']."'>".$tabla_programedu['tusuario']."</option>";
								}
							?>
						</select>
					</li>
					<!-- --------------Agregaremos los nuevos campos para el registro inicial con QR--------------------------------------------------------- -->
					<li>
						<label>Unidad Académica: </label>
						<select name="uni_aca" id="uni_aca" required placeholder="Elige una unidad academica">
							<option value="" selected>Seleccione:</option>
							<option value=0>NO APLICA</option>
							<?php
								$sqlquery1 = "SELECT * FROM uniacademica ORDER BY nom_uniaca ASC";
								$query = $mysqli->query($sqlquery1);
								
								while( $tabla_uniacad = mysqli_fetch_array($query) ){
									if( $tabla_uniacad['IDuniaca'] != 0 )
										echo "<option value='".$tabla_uniacad['IDuniaca']."'>".$tabla_uniacad['nom_uniaca']."</option>";
								}
							?>
						</select>
					</li>
					<li>
						<label>Programa Educativo: </label>
						<select name="pro_edu"id="pro_edu" required placeholder="Elige tu programa educativo">
							<option value="" selected>Seleccione:</option>
							<option value=0>NO APLICA</option>
							<?php
								$sqlquery1 = "SELECT * FROM programedu ORDER BY nom_programedu ASC";
								$query = $mysqli->query($sqlquery1);
								while( $tabla_programedu = mysqli_fetch_array($query) ){
									if( $tabla_programedu['IDprogramedu'] != 0 )
										echo "<option value='".$tabla_programedu['IDprogramedu']."'>".$tabla_programedu['nom_programedu']."</option>";
								}
							?>
						</select>
					</li>
					<!-- ----------------------------------------------------------------------- -->
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
					<input type="submit" value="Dar de alta" id="evento_alta" class="evento_alta_gris" name="evento_alta" disabled />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Cancelar" id="evento_cancelar" class="evento_cancelar" name="evento_cancelar" />
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
