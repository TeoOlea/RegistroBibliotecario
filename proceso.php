<?php
	session_start();
	include('conexion.php');
	$_SESSION['mensaje']='';
	$_SESSION['tipo_usuario']='';
	$_SESSION['matricula']=$_POST['user'];
	$_SESSION['uniacad']='';
	$_SESSION['proedu']='';
	$_SESSION['nivel']='';
	$_SESSION['genero']='';
	$_SESSION['value'] ='';
	$_SESSION['nom_usu'] ='';
	$_SESSION['encuesta'] ='';
	

    $mysqli =new mysqli ($host,$user,$pw, $db);
	$mysqli->set_charset("utf8");
		
	if( isset($_POST['user']) && !empty($_POST['user']) ){
		
		$mensaje_generico = "Lo sentimos.</br></br>El Usuario con registro \"<em>$_POST[user]</em>\" no aparece registrado.</br></br>Favor de pasar con la persona de <u class=\"resaltar\">RECEPCIÓN</u>, gracias.";
		
		echo '<script>alert("'.$_SESSION['matricula'].'");</script>';
		
		if( strpos( $_SESSION['matricula'], "U" ) === 0 ){
			//Buscamos por codigo de barras
			$sql = "SELECT * FROM usuariosbibli WHERE codigobarra = '$_SESSION[matricula]'";
			if( !$resultado = $mysqli->query($sql) ){
				// ¡Oh, no! La consulta falló. 
				$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas.";
				header("Location: error.php");
				exit;
			}
		}else{
			//Buscamos por matricula
			$sql = "SELECT * FROM usuariosbibli WHERE matricula = '$_SESSION[matricula]'";
			//echo '<script>alert("'.$sql.'");</script>';
			if( !$resultado = $mysqli->query($sql) ){
				// ¡Oh, no! La consulta falló. 
				$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas en la matricula.";
				header("Location: error.php");
				exit;
			}
		}
		
		if($resultado->num_rows === 0){
			// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
			// no. Nosotros decidimos. En este caso, ¿podría haber sido
			// matricula demasiado grande
			$_SESSION['mensaje']= $mensaje_generico;
			header("Location: error.php");
			exit;
		}
   
		$usuarioencon = $resultado->fetch_assoc();
		$_SESSION['nombre'] = $usuarioencon['nombre(s)']." ".$usuarioencon['apellidos'];
		$_SESSION['proedu'] = $usuarioencon['idpe'];
		$_SESSION['genero'] = $usuarioencon['sexo'];
		
		//Buscamos que tipo de usuario es
		$sql1 = "SELECT tusuario FROM tipousuario WHERE IDusuario = '$usuarioencon[idtipo]'";
		//echo '<script>alert("'.$sql1.'");</script>';
		if( !$cargoen = $mysqli->query($sql1) ){
			// ¡Oh, no! La consulta falló. 
			$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas.";
			header("Location: error.php");
			exit;
		}
		
		if( $cargoen->num_rows === 0 ){
			// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
			// no. Nosotros decidimos. En este caso, ¿podría haber sido
			// idtipo demasiado grande? 
			$_SESSION['mensaje']= $mensaje_generico;
			header("Location: error.php");
			exit;
		}
		
		$puesto = $cargoen->fetch_assoc();
		$_SESSION['cargo'] = $puesto['tusuario'];
		$_SESSION['tipo_usuario'] = $puesto['tusuario'];
		
		if( $_SESSION['tipo_usuario'] != "Externo" ){
			//Buscamos que programa de estudios tiene
			$sql2 = "SELECT `nom_programedu` FROM programedu WHERE IDprogramedu  = '$usuarioencon[idpe]'";
			//echo '<script>alert("'.$sql2.'");</script>';
			if ( !$cargope = $mysqli->query($sql2) ){
				// ¡Oh, no! La consulta falló. 
				$_SESSION['mensaje']="Lo sentimos, no se cuenta con el programa educativo que buscas.";
				//echo '<script>alert("opcion final de error");</script>';
				//header("Location: error.php");
				//exit;
			}
			if ($cargope->num_rows === 0){
				// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
				// no. Nosotros decidimos. En este caso, ¿podría haber sido
				// idpe demasiado grande? 
				$_SESSION['mensaje']= $mensaje_generico;
				//echo '<script>alert("error de numero de filas en cero");</script>';
				//header("Location: error.php");
				//exit;
			}
		}
		
		//Agregar la condición pára verificar que el usuario no está registrado
		$query = "SELECT count(matricula) as numero FROM reg_visitas WHERE matricula like '$_SESSION[matricula]' && estatus = 0";
		$sql3 = mysqli_query( $mysqli, $query );
		$contando = mysqli_fetch_array($sql3);
		$_SESSION['validar']=$contando['numero'];//numero es el apodo al resultado de count(matricula) que ponemos en la consulta
		echo '<script>alert("'.$_SESSION['validar'].'");</script>';
		if($_SESSION['validar'] == 0){
			$_SESSION['estatus'] = 0;
			//echo '<script>alert("todo bien");</script>';
			if( $_SESSION['tipo_usuario'] == "Externo" ){
				header("Location:servicioexterno.php");
			}else{
				//header("Location:encuesta.php");
				header("Location:servicio.php");
			}
			exit;
		}else if($_SESSION['validar'] == 1){
			$mysqli->set_charset("utf8");
			//date_default_timezone_set('America/Mexico_City');
			$hoy = new DateTime('now', new DateTimeZone('America/Mexico_City'));
			//$hoy->modify('-1 hours');//horario de verano
			$fecha_hoy = $hoy->format('Y-m-d H:i:s');
			$query = "UPDATE reg_visitas SET estatus = 1, FechaSalida = '$fecha_hoy' WHERE matricula like '$_SESSION[matricula]' && estatus = 0;";
			mysqli_query( $mysqli, $query );
			//sleep( 1 );
			$_SESSION['mensaje']="Salida registrada, vuelve pronto a BCU <br/><br/>";
			//header("Location: salida.php");
			header("Location: encuesta.php");
			exit;//acuerdate de esta linea please			
		}else if($_SESSION['validar'] > 1){
			$_SESSION['mensaje']="Hubo un pequeño problema.</br></br>Registros multiples.</br></br>Favor de proporcionar tu MATRICULA o CODIGO DE BARRAS a la persona en recepción. Gracias<br/><br/>";
			header("Location: error.php");
			exit;//acuerdate de esta linea please			
		}
	}else{
		$_SESSION['mensaje']='Verifica los datos';
		header("Location: error.php"); 
		exit;//acuerdate de esta linea please
	}
?>