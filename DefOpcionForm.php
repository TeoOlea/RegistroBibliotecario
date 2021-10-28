<?php

	session_start();
	//En base al POST del submit y la palabra evento decidimos si se escogió alta o cancelar
	$sBotonPulsado = '';
	foreach( $_POST as $NomCampo => $NomValor ){
		//echo "</br>$NomCampo";
		if( preg_match('/^evento_/', $NomCampo) ){
			$sBotonPulsado = preg_replace('/^evento_/', '', $NomCampo);
			//$sBotonPulsado = $NomCampo;
		}
	}
	
	if( $sBotonPulsado == 'alta' ) {
		$_SESSION['matricula'] = $_POST['matricula'];
		$_SESSION['nombre'] = $_POST['nombre'];
		$_SESSION['apes'] = $_POST['apes'];
		$_SESSION['uni_aca'] = $_POST['uni_aca'];
		$_SESSION['pro_edu'] = $_POST['pro_edu'];
		$_SESSION['ExtTipo'] = $_POST['ExtTipo'];
		$_SESSION['genero'] = $_POST['genero'];
		$_SESSION['email'] = $_POST['email'];
		
		header("Location: AltaUsuario.php");
		
	}else if( $sBotonPulsado == 'cancelar' ){
		echo '<script> window.open("AltaCancelada.php","_self");</script>';
		//header("Location: AltaCancelada.php");
	}else{
		$_SESSION['mensaje']="Ha habido un error en la elección de alta o cancelar";
		header("Location: error.php");
	}
	exit;
	
?>