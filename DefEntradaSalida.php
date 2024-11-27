<?php
	session_start();
	
	$tipo = $_POST['tipo'];
	
	if( $tipo == "entrada" ){
		$_SESSION['nombre_ext']=$_POST['nombre_ext'];
		$_SESSION['lugar']=$_POST['lugar'];
		header("Location: servicioexterno.php");
	}else if( $tipo == "salida" ){
		include('conexion.php');
		$NumReg = $_POST['registro_ext'];
		$mysqli = new mysqli ($host,$user,$pw, $db);
		echo $host."<br>";
		echo $user."<br>";
		echo $pw."<br>";
		echo $db."<br>";
		$mysqli->set_charset("utf8");
		$hoy = new DateTime('now', new DateTimeZone('America/Mexico_City'));
		//$hoy->modify('-1 hours');//horario de verano
		$fecha_hoy = $hoy->format('Y-m-d H:i:s');
		echo $fecha_hoy."<br>";
		$query = "UPDATE reg_lugares SET FechaSalida = '$fecha_hoy', estatus = 1 WHERE IDLugar = $NumReg and estatus = 0;";
		mysqli_query( $mysqli, $query );
		$_SESSION['mensaje'] = "Salida registrada, vuelve pronto a tu biblioteca";
		header("Location: salida.php");
	}
?>