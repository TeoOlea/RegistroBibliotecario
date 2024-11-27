<?php
	session_start();
	include('conexion.php');

	$mysqli =new mysqli ($host,$user,$pw, $db);
	$mysqli->set_charset("utf8");
	
	$_SESSION['nombre'] = '';
	$_SESSION['tipoComputo'] = $_POST['tipo'];

	if( $_SESSION['tipoComputo'] == "interno" ){
		$_SESSION['matricula'] = trim( $_POST['matr_computo'] );
		$sql = "SELECT * FROM usuariosbibli WHERE matricula = '$_SESSION[matricula]'";
		//echo '<script>alert("'.$sql.'");</script>';
		if( !$resultado = $mysqli->query($sql) ){
			// ¡Oh, no! La consulta falló. 
			$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas en la matricula.";
			header("Location: error.php");
			exit;
		}if($resultado->num_rows === 0){
			// ¡Oh, no hay filas! Unas veces es lo previsto, pero otras
			// no. Nosotros decidimos. En este caso, ¿podría haber sido
			// matricula demasiado grande
			$_SESSION['mensaje']= "Lo sentimos.</br></br>Parece que hubo un error con la matricula, favor de registrarse de nuevo, gracias.";
			header("Location: error_computo.php");
			exit;
		}
		$usuarioencon = $resultado->fetch_assoc();
		$_SESSION['nombre'] = $usuarioencon['nombre(s)']." ".$usuarioencon['apellidos'];
	}else if( $_SESSION['tipoComputo'] == "externo" ){
		$_SESSION['matricula'] = trim( $_POST['nombre_computo'] );
	}
	
	if( isset($_SESSION['matricula']) && !empty($_SESSION['matricula']) ){
		$mensaje_generico = "Lo sentimos.</br></br>Parece que hubo un error, favor de registrarse de nuevo, gracias.";
		
		//Agregar la condición pára verificar que el usuario no está registrado
		$query = "SELECT count(Nombre) as numero FROM centro_computo WHERE Nombre like '$_SESSION[matricula]' && estatus = 0";
		$sql3 = mysqli_query( $mysqli, $query );
		$contando = mysqli_fetch_array($sql3);
		$_SESSION['validar']=$contando['numero'];//numero es el apodo al resultado de count(matricula) que ponemos en la consulta
		if($_SESSION['validar'] == 0){
			header("Location: equipo_computo.php");
			exit;//acuerdate de esta linea please	
		}else if($_SESSION['validar'] == 1){
			header("Location: impresiones_computo.php");
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