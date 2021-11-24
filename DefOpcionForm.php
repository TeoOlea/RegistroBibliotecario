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
		$_SESSION['matricula'] = $_POST['matricula'];
		$_SESSION['nombre'] = $_POST['nombre'];
		$_SESSION['apes'] = $_POST['apes'];
		$_SESSION['uni_aca'] = $_POST['uni_aca'];
		$_SESSION['pro_edu'] = $_POST['pro_edu'];
		$_SESSION['ExtTipo'] = $_POST['ExtTipo'];
		$_SESSION['genero'] = $_POST['genero'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['tipo_salida'] = $sBotonPulsado;
		
		header("Location: AltaUsuario.php");
		
	}else if( $sBotonPulsado == 'alta-externo' ){
		
		$_SESSION['curp'] = $_POST['curp'];
		$_SESSION['nombre'] = $_POST['nombre'];
		$_SESSION['apes'] = $_POST['apes'];
		$_SESSION['usu_ext'] = "5";
		$_SESSION['ExtTipo'] = $_POST['ExtTipo'];
		$_SESSION['genero'] = $_POST['genero'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['tipo_salida'] = $sBotonPulsado;
		
		echo '<script> window.open("AltaUsuarioExterno.php","_self");</script>';
		//header("Location: AltaUsuarioExterno.php");
	}else if( $sBotonPulsado == 'cancelar' ){
		$_SESSION['tipo_salida'] = $sBotonPulsado;
		echo '<script> window.open("AltaCancelada.php","_self");</script>';
	}else if( $sBotonPulsado == 'cancelar-externo' ){
		$_SESSION['tipo_salida'] = $sBotonPulsado;
		echo '<script> window.open("AltaCancelada.php","_self");</script>';
	}else{
		$_SESSION['mensaje']="Ha habido un error en la elección de alta o cancelar";
		header("Location: error.php");
	}
	exit;
	
?>