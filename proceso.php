<?php
	session_start();
	include('conexion.php');
	$_SESSION['mensaje']='';
	$_SESSION['tipo_usuario']='';
	$_SESSION['matricula']=$_POST['user'] ;
	$_SESSION['uniacad']='';
	$_SESSION['proedu']='';
	$_SESSION['nivel']='';
	$_SESSION['genero']='';
	$_SESSION['value'] ='';
	$_SESSION['nom_usu'] ='';

    $mysqli =new mysqli ($host,$user,$pw, $db);
	$mysqli->set_charset("utf8");
	
	echo "$_POST[user]";
	echo "alerta";
	//echo '<script>alert("'.$matricula.'");</script>';
	if( isset($_POST['user']) && !empty($_POST['user']) ){
		$sql = "SELECT matricula, `nombre(s)`, apellidos, idtipo, id_uni_acad, idpe, nivel, email, sexo FROM usuariosbibli WHERE matricula = '$_POST[user]'";
		if( !$resultado = $mysqli->query($sql) ){
			// ¡Oh, no! La consulta falló. 
			$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas.";
			header("Location: error.php");
			exit;
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
		$_SESSION['nombre'] = $usuarioencon['nombre(s)']." ". $usuarioencon['apellidos'];
		$_SESSION['proedu'] = $usuarioencon['idpe'];
		$_SESSION['genero'] = $usuarioencon['sexo'];
	
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
			$_SESSION['mensaje']="Lo sentimos. No se pudo encontrar una coincidencia para cargo de Usuario con registro $_POST[IDTipo]. Inténtelo de nuevo.";
			header("Location: error.php");
			exit;
		}
		
		$puesto = $cargoen->fetch_assoc();
		$_SESSION['cargo'] =  $puesto['tusuario'];
		
		$sql2 = "SELECT nom_programedu FROM programaedu WHERE IDprogramedu  = $usuarioencon[idpe]";
		if (!$cargope = $mysqli->query($sql2)){
			// ¡Oh, no! La consulta falló. 
			$_SESSION['mensaje']="Lo sentimos, no se cuenta con el programa educativo que buscas.";
			header("Location: error.php");
			exit;
		}
		if ($cargope->num_rows === 0){
			// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
			// no. Nosotros decidimos. En este caso, ¿podría haber sido
			// actor_id demasiado grande? 
			$_SESSION['mensaje']="Lo sentimos. No se pudo encontrar una coincidencia para Programa educativo vigente con registro $usuarioencon[IDPE]. Inténtelo de nuevo.";
			header("Location: error.php");
			exit;
		}
		
		/* Revisar
		// agregar la condición pára verificar que el usuario no está registrado
		$sqlquery = "SELECT count(IDUsuario) as numero FROM visitas WHERE IDUsuario like '$_SESSION[matricula]' && status = 0";
		$sql3 = mysqli_query( $mysqli, $sqlquery );
		$contando= $sql3->fetch_assoc();
		$_SESSION['validar']=$contando['numero'];
		if($_SESSION['validar']==0){
			$_SESSION['estatus']=0;
			header("Location:servicio.php"); 
			exit;
		}
		if($_SESSION['validar']==1){
			$mysqli->set_charset("utf8");
			date_default_timezone_set('America/Mexico_City');
			$hoy= date("Y-m-d H:i:s");
			  mysqli_query($mysqli,"UPDATE visitas SET status=1, FechaSalida='$hoy' WHERE IDUsuario like '$_SESSION[matricula]' && status = 0 ");
			$_SESSION['mensaje']="Salida registrada, vuelve pronto a BCU <br/><br/>";
			header("Location: error.php");
			exit;//acuerdate de esta linea please			
		}
		*/
	}else{
		$_SESSION['mensaje']='Verifica los datos';
		header("Location: error.php"); 
		exit;//acuerdate de esta linea please
	}
?>