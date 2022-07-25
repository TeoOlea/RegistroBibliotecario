<?php

	session_start();
	
	$_SESSION['mes_anyo'] = trim($_POST['fecha_pdf']);
	//En base al POST del submit y la palabra evento decidimos si se escogió alta o cancelar
	$sBotonPulsado = '';
	foreach( $_POST as $NomCampo => $NomValor ){
		//echo "</br>$NomCampo";
		if( preg_match('/^evento_/', $NomCampo) ){
			$sBotonPulsado = preg_replace('/^evento_/', '', $NomCampo);
			//$sBotonPulsado = $NomCampo;
		}
	}
	
	//echo '<script>alert("'.$NomCampo.'");</script>';
	//echo '<script>alert("'.$sBotonPulsado.'");</script>';
	
	if( $sBotonPulsado == 'F01' ) {
		
		//$_SESSION['matricula'] = (!empty($_POST['matricula'])) ?  $_POST['matricula'] : NULL; forma de hacerlo más seguro contra inyecciones SQL
		//echo '<script>alert("'.$_POST['fecha_pdf'].'");</script>';
		header("Location: PDF_F01.php");
		
	}else if( $sBotonPulsado == 'F02' ){
		header("Location: PDF_F02.php");		
		//header("Location: paginaPDF2.php");
		//header("Location: PDF_F02.php");
	}else if( $sBotonPulsado == 'F03' ){
		//header("Location: paginaPDF3.php");
		//header("Location: PDF_F03.php");
	}else{
		$_SESSION['mensaje']="Error en la elección del archivo";
		header("Location: error.php");
	}
	exit;
	
?>