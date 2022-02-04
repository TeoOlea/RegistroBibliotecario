<?php
	//Esta pequeña parte del codigo es solo para decidir que tipo de registro es el que escogio el usuario //12-abril-2021
	if (count($_POST)>0){
		//$tags = array_keys($_POST);// obtiene los nombres de las varibles
		$valores = array_values($_POST);// obtiene los valores de las varibles
		if( $valores[0] == "Registro Diario" ){
			echo "Escogiste la opcion de dia";
			header("Location: reg_dia.php");
		}else if( $valores[0] == "Registro Mes" ){
			echo "Escogiste la opcion de mes";
			header("Location: reg_mes.php");
		}else if( $valores[0] == "Registro Año" ){
			echo "Escogiste la opcion de año";
			header("Location: reg_año.php");
		}else if( $valores[0] == "Reportes" ){
			echo "Escogiste la opcion de reportes";
			header("Location: reg_reportes.php");
		}
	}
?>