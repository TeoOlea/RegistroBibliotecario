<?php

	session_start();
	
	$_SESSION['tipo_salida'] = "";
	//En base al POST del submit y la palabra evento decidimos si se escogió alta o cancelar
	$sBotonPulsado = '';
	foreach( $_POST as $NomCampo => $NomValor ){
		//echo "</br>$NomCampo";
		if( preg_match('/^evento_/', $NomCampo) ){
			$sBotonPulsado = preg_replace('/^evento_/', '', $NomCampo);
			//$sBotonPulsado = $NomCampo;
		}
	}
	
	//echo '<script>alert("'.$sBotonPulsado.'");</script>';
	
	if( $sBotonPulsado == 'alta' ) {
		//$_SESSION['matricula'] = (!empty($_POST['matricula'])) ?  $_POST['matricula'] : NULL; forma de hacerlo más seguro contra inyecciones SQL
		$_SESSION['matricula'] = trim($_POST['matricula']);
		$_SESSION['nombre'] = trim($_POST['nombre']);
		$_SESSION['apes'] = trim($_POST['apes']);
		$_SESSION['uni_aca'] = trim($_POST['uni_aca']);
		$_SESSION['pro_edu'] = trim($_POST['pro_edu']);
		$_SESSION['ExtTipo'] = trim($_POST['ExtTipo']);
		$_SESSION['genero'] = trim($_POST['genero']);
		$_SESSION['email'] = trim($_POST['email']);
		$_SESSION['tipo_salida'] = trim($sBotonPulsado);
		
		header("Location: AltaUsuario.php");
		
	}else if( $sBotonPulsado == 'alta-externo' ){
		
		$_SESSION['curp'] = trim($_POST['curp']);
		$_SESSION['nombre'] = trim($_POST['nombre']);
		$_SESSION['apes'] = trim($_POST['apes']);
		$_SESSION['usu_ext'] = "7";
		$_SESSION['ExtTipo'] = trim($_POST['ExtTipo']);
		$_SESSION['genero'] = trim($_POST['genero']);
		$_SESSION['email'] = trim($_POST['email']);
		$_SESSION['tipo_salida'] = trim($sBotonPulsado);
		
		//echo '<script> window.open("AltaUsuarioExterno.php","_self");</script>';
		header("Location: AltaUsuarioExterno.php");
	}else if( $sBotonPulsado == 'cancelar' ){
		$_SESSION['tipo_salida'] = $sBotonPulsado;
		//echo '<script> window.open("formularioalta.php","_self");</script>';
		//echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=formularioalta.php">';
		header("Location: formularioalta.php");
	}else if( $sBotonPulsado == 'cancelar-externo' ){
		$_SESSION['tipo_salida'] = $sBotonPulsado;
		//echo '<script> window.open("formularioaltaexterno.php","_self");</script>';
		//echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=formularioaltaexterno.php">';
		header("Location: formularioaltaexterno.php");
	}else{
		$_SESSION['mensaje']="Ha habido un error en la elección de alta o cancelar";
		header("Location: error.php");
	}
	exit;
	
?>