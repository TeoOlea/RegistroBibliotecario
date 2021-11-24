<?php
	session_start();
	include('conexion.php');

    $mysqli =new mysqli ($host,$user,$pw, $db);
	$mysqli->set_charset("utf8");
	
	$matricula = $_SESSION['matricula'];
	$nombre = $_SESSION['nombre'];
	$apellidos = $_SESSION['apes'];
	$idUni_Acad = $_SESSION['uni_aca'];
	$idProg_Edu = $_SESSION['pro_edu'];
	$idTipo = $_SESSION['ExtTipo'];
	$genero = $_SESSION['genero'];
	$email = $_SESSION['email'];
	
	/*Codigo para confirmar el ID con la opción elegida
	
	//Definir el nombre de la unidad academica
	$sql_query = "SELECT nom_uniaca FROM uniacademica WHERE IDuniaca  = $Uni_Acad";
	$query = $mysqli->query($sql_query);
	$ArrayUniAcademica = mysqli_fetch_array( $query );
	$idUniAcademica = $ArrayUniAcademica['nom_uniaca'];
	*/
	
	//Definir el nombre y el nivel del programa educativo
	$sql_query = "SELECT * FROM programedu WHERE IDprogramedu = $idProg_Edu";
	$query = $mysqli->query($sql_query);
	$ArrayProgramaEducativo = mysqli_fetch_array($query);
	//$idProgramaEducativo = $ArrayProgramaEducativo['nom_programedu'];
	$nivelProgramaEducativo = $ArrayProgramaEducativo['nivel'];
	//echo '<script>alert("'.$nivelProgramaEducativo.'");</script>';
	
	/*
	//Definir el nombre del tipo de usuario
	$sql_query = "SELECT tusuario FROM tipousuario WHERE IDusuario = $idTipo";
	$query = $mysqli->query($sql_query);
	$ArrayTipoUsuario = mysqli_fetch_array( $query ) ;
	$idTipoUsuario = $ArrayTipoUsuario['tusuario'];
	
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
	$sqlquery0 = "SELECT * FROM usuariosbibli WHERE matricula = '$matricula'";
	$query = $mysqli->query( $sqlquery0 );
	if( mysqli_num_rows( $query ) == 0 ){
		
		//Posteriormente evaluaremos que el usuario no haya metido su codigo de barras en lugar de la matricula
		$sqlquery0 = "SELECT * FROM usuariosbibli WHERE codigobarra = '$matricula'";
		$query = $mysqli->query( $sqlquery0 );
		if( mysqli_num_rows( $query ) == 0 ){
			
			//Definimos que si el usuario metió un codigo de barras para darse de alta, se guarde en el campo correcto
			if( strpos( $matricula, "U" ) === 0 ){
				$sqlquery1 = "INSERT INTO usuariosbibli(matricula, codigobarra, `nombre(s)`, apellidos, idtipo, id_uni_acad, idpe, nivel, email, sexo) VALUES
					( 'NULL', '$matricula', '$nombre', '$apellidos', '$idTipo', '$idUni_Acad', '$idProg_Edu', '$nivelProgramaEducativo', '$email', '$genero')";
					//echo "<br/> $sqlquery1<br/> entro en codigo de barras";
			}else{//Segmento de código dará de alta al usuario con una matricula
				$sqlquery1 = "INSERT INTO usuariosbibli(matricula, codigobarra, `nombre(s)`, apellidos, idtipo, id_uni_acad, idpe, nivel, email, sexo) VALUES
					( '$matricula', 'NULL', '$nombre', '$apellidos', '$idTipo', '$idUni_Acad', '$idProg_Edu', '$nivelProgramaEducativo', '$email', '$genero')";
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
		}
	}else{
		$_SESSION['mensaje']="El usuario con matricula $matricula ya existe en la BD";
		header("Location: UsuarioRepetido.php");
		exit;
	}
?>
