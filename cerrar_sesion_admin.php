<?php
	/* Destruir la sesion */
	session_start();
	//unset($_SESSION['nom_usu']);
	session_destroy();
	/* Redirigir */
	header('Location: index.php');
?>