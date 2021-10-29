<?php
	session_start();
	include('conexion.php');

    $mysqli =new mysqli ($host,$user,$pw, $db);
	$mysqli->set_charset("utf8");
		
	$matricula = $_SESSION['curp'];
	$nombre = $_SESSION['nombre'];
	$apellidos = $_SESSION['apes'];
	$idTipoUsuExt = $_SESSION['usu_ext'];
	$idTipo = $_SESSION['ExtTipo'];
	$genero = $_SESSION['genero'];
	$email = $_SESSION['email'];
	
	/*
	//Definir el nombre del tipo de usuario externo
	$sql_query = "SELECT tusuarioext FROM tipousuarioext WHERE IDusuext = $idTipo";
	$query = $mysqli->query($sql_query);
	$ArrayTipoUsuario = mysqli_fetch_array( $query ) ;
	$idTipoUsuario = $ArrayTipoUsuario['tusuario'];
	
	//Comprobaciones de datos
	echo '<script>alert("'.$matricula.'");</script>';
	echo '<script>alert("'.$nombre.'");</script>';
	echo '<script>alert("'.$apellidos.'");</script>';
	echo '<script>alert("'.$idTipoUsuario.'");</script>';
	echo '<script>alert("'.$genero.'");</script>';
	echo '<script>alert("'.$email.'");</script>';
	*/
	
	//Antes de darlo de alta verificaremos que no esté en la BD validando su matricula 261021 Teo
	$sqlquery0 = "SELECT * FROM usuariosbibli WHERE matricula = '$matricula'";
	$query = $mysqli->query( $sqlquery0 );
	if( mysqli_num_rows( $query ) == 0 ){
		
		//Segmento de código dará de alta al usuario externo
		$sqlquery1 = "INSERT INTO usuariosbibli(matricula, codigobarra, `nombre(s)`, apellidos, idtipo, id_uni_acad, idpe, nivel, email, sexo) VALUES
				( '$matricula', '', '$nombre', '$apellidos', '$idTipoUsuExt', '$idTipo', '', '', '$email', '$genero')";
		//echo $sqlquery1;
		
		if( !$query = $mysqli->query( $sqlquery1 ) ){
			$_SESSION['mensaje']="Lo sentimos, este sitio web está experimentando problemas. Error de Insercion en la BD";
			header("Location: error.php");
			exit;
		}else{
			echo '<script> window.open("AltaExitosa.php","_self");</script>';
			//header("Location: AltaExitosa.php");
			exit;
		}
	}else{
		$_SESSION['mensaje']="El usuario con matricula $matricula ya existe en la BD";
		header("Location: UsuarioRepetido.php");
		exit;
	}
?>
