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

    $mysqli =new mysqli ($host,$user,$pw, $db);
	$mysqli->set_charset("utf8");
	
	//echo '<script>alert("'.$_SESSION['matricula'].'");</script>';
	if( isset($_POST['user']) && !empty($_POST['user']) ){
		
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
			if( !$resultado = $mysqli->query($sql) ){
				// ¡Oh, no! La consulta falló. 
				$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas.";
				header("Location: error.php");
				exit;
			}
		}
		
		if($resultado->num_rows === 0){
			// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
			// no. Nosotros decidimos. En este caso, ¿podría haber sido
			// matricula demasiado grande
			$_SESSION['mensaje']="Lo sentimos. No se pudo encontrar una coincidencia para el Usuario con registro $_POST[user]. Inténtelo de nuevo.";
			header("Location: error.php");
			exit;
		}
   
		$usuarioencon = $resultado->fetch_assoc();
		$_SESSION['nombre'] = $usuarioencon['nombre(s)']." ".$usuarioencon['apellidos'];
		$_SESSION['proedu'] = $usuarioencon['idpe'];
		$_SESSION['genero'] = $usuarioencon['sexo'];
		
		//Buscamos que tipo de usuario es
		$sql1 = "SELECT tusuario FROM tipousuario WHERE IDusuario = '$usuarioencon[idtipo]'";
		if( !$cargoen = $mysqli->query($sql1) ){
			// ¡Oh, no! La consulta falló. 
			$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas.";
			header("Location: error.php");
			exit;
		}
		if( $cargoen->num_rows === 0 ){
			// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
			// no. Nosotros decidimos. En este caso, ¿podría haber sido
			// actor_id demasiado grande? 
			$_SESSION['mensaje']="Lo sentimos. No se pudo encontrar una coincidencia para cargo de Usuario con registro '$_POST[IDTipo]'. Inténtelo de nuevo.";
			header("Location: error.php");
			exit;
		}
		
		$puesto = $cargoen->fetch_assoc();
		$_SESSION['cargo'] = $puesto['tusuario'];
		$_SESSION['tipo_usuario'] = $puesto['tusuario'];
		
		echo '<script>alert("'.$_SESSION['tipo_usuario'].'");</script>';
		
		if( $_SESSION['tipo_usuario'] != "Externo" ){
			//Buscamos que programa de estudios tiene
			$sql2 = "SELECT `nom_programedu` FROM programedu WHERE IDprogramedu  = '$usuarioencon[idpe]'";
			//echo '<script>alert("'.$sql2.'");</script>';
			if ( !$cargope = $mysqli->query($sql2) ){
				// ¡Oh, no! La consulta falló. 
				$_SESSION['mensaje']="Lo sentimos, no se cuenta con el programa educativo que buscas.";
				header("Location: error.php");
				exit;
			}
			if ($cargope->num_rows === 0){
				// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
				// no. Nosotros decidimos. En este caso, ¿podría haber sido
				// actor_id demasiado grande? 
				$_SESSION['mensaje']="Lo sentimos. No se pudo encontrar una coincidencia para Programa educativo vigente con registro '$usuarioencon[idpe]'. Inténtelo de nuevo.";
				header("Location: error.php");
				exit;
			}
		}
		
		//Agregar la condición pára verificar que el usuario no está registrado
		$query = "SELECT count(matricula) as numero FROM reg_visitas WHERE matricula like '$_SESSION[matricula]' && estatus = 0";
		$sql3 = mysqli_query( $mysqli, $query );
		$contando = mysqli_fetch_array($sql3);
		$_SESSION['validar']=$contando['numero'];//numero es el apodo al resultado de count(matricula)
		if($_SESSION['validar'] == 0){
			$_SESSION['estatus'] = 0;
			if( $_SESSION['tipo_usuario'] == "Externo" ){
				header("Location:servicioexterno.php");
			}else{
				header("Location:servicio.php");
			}
			exit;
		}else if($_SESSION['validar'] == 1){
			$mysqli->set_charset("utf8");
			date_default_timezone_set('America/Mexico_City');
			$hoy = date("Y-m-d H:i:s", time());//Format para y fecha y hora
			$query = "UPDATE reg_visitas SET estatus = 1, FechaSalida = '$hoy' WHERE matricula like '$_SESSION[matricula]' && estatus = 0";
			mysqli_query( $mysqli, $query );
			$_SESSION['mensaje']="Salida registrada, vuelve pronto a BCU <br/><br/>";
			header("Location: salida.php");
			exit;//acuerdate de esta linea please			
		}
	}else{
		$_SESSION['mensaje']='Verifica los datos';
		header("Location: error.php"); 
		exit;//acuerdate de esta linea please
	}
?>