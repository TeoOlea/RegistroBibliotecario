<?php
	session_start();
	include('conexion.php');

    $mysqli =new mysqli ($host,$user,$pw, $db);
	$mysqli->set_charset("utf8");
	
	$matricula = $_SESSION['curp'];
	$nombre = $_SESSION['nombre'];
	$apellidos = $_SESSION['apes'];
	$tipo_usuario = $_SESSION['usu_ext'];
	$tipo_usuext = $_SESSION['ExtTipo'];
	$genero = $_SESSION['genero'];
	$email = $_SESSION['email'];
	
	/*
	//Comprobaciones de datos
	echo '<script>alert("'.$matricula.'");</script>';
	echo '<script>alert("'.$nombre.'");</script>';
	echo '<script>alert("'.$apellidos.'");</script>';
	echo '<script>alert("'.$Uni_Acad.'");</script>';
	echo '<script>alert("'.$Prog_Edu.'");</script>';
	echo '<script>alert("'.$nivelProgramaEducativo.'");</script>';
	echo '<script>alert("'.$idTipoUsuario.'");</script>';
	echo '<script>alert("'.$genero.'");</script>';
	echo '<script>alert("'.$email.'");</script>';
	echo '<script>alert("'.$mail.'");</script>';
	*/
	
	
	//Antes de darlo de alta verificaremos que no esté en la BD validando su matricula 261021 Teo
	$sqlquery0 = "SELECT * FROM usuariosbibli WHERE matricula = '$matricula' OR codigobarra = '$matricula'";
	$query = $mysqli->query( $sqlquery0 );
	if( mysqli_num_rows( $query ) == 0 ){
			
		//Definimos que si el usuario metió un codigo de barras para darse de alta, se guarde en el campo correcto
		if( strpos( $matricula, "U" ) === 0 ){
			$sqlquery1 = "INSERT INTO usuariosbibli(matricula, codigobarra, `nombre(s)`, apellidos, idtipo, id_uni_acad, idpe, nivel, email, sexo) VALUES
				( '', '$matricula', '$nombre', '$apellidos', '$tipo_usuario', '$tipo_usuext', '', '', '$email', '$genero')";
				//echo "<br/> $sqlquery1<br/> entro en codigo de barras";
		}else{//Segmento de código dará de alta al usuario con una matricula
			$sqlquery1 = "INSERT INTO usuariosbibli(matricula, codigobarra, `nombre(s)`, apellidos, idtipo, id_uni_acad, idpe, nivel, email, sexo) VALUES
				( '$matricula', '', '$nombre', '$apellidos', '$tipo_usuario', '$tipo_usuext', '', '', '$email', '$genero')";
		}
		
		if( !$query = $mysqli->query( $sqlquery1 ) ){
			$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas. Error de Insercion en la BD";
			header("Location: error.php");
			exit;
		}else{
			echo '<script> window.open("AltaExitosa.php","_self");</script>';
			header("Location: AltaExitosa.php");
			exit;
		}
	}else{
		$_SESSION['mensaje']="El usuario con matricula $matricula ya existe en la BD";
		header("Location: UsuarioRepetido.php");
		exit;
	}
?>
