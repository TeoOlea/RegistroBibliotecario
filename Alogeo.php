<?php
	session_start();
	include('conexion.php');
	
	$mysqli =new mysqli ($host,$user,$pw, $db);
	$mysqli->set_charset("utf8");

	$sql10 ="SELECT control, Apswd, nombre, apellidos, IDArol, Ahabi FROM adminuser WHERE control = '$_POST[ausuario]'";
	if (!$aencontrado = $mysqli->query($sql10)){
		// ¡Oh, no! La consulta falló. 
		$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas. <BR/> <BR/> M001";
		header("Location: error.php");
		exit;
	}
	if ($aencontrado->num_rows === 0){
		// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
		// no. Nosotros decidimos. En este caso, ¿podría haber sido
		// actor_id demasiado grande? 
		$_SESSION['mensaje']="Lo sentimos. No se pudo encontrar una coincidencia para el Usuario con registro $_POST[user]. Inténtelo de nuevo. <BR/> <BR/> M002";
		header("Location: error.php");
		exit;
	}
		
	$aenco = $aencontrado->fetch_assoc();
	if ($aenco['Apswd'] == $_POST['apdw']){
		$_SESSION['mensaje'] = "$aenco[nombre], bienvenido al sistema de estadística, por el momento sigue en contrucción.<br/><br/>";
		$_SESSION['nom_usu'] = $aenco['nombre'];
		header("Location: estadistica.php");
	}else{
		$_SESSION['mensaje'] = "$_POST[ausuario], Contraseña errónea, inténte de nuevo <br/><br/>";
		header("Location: error.php");
	}
?>
