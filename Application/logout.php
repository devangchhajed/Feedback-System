<?php

	session_start();
	unset($_SESSION['game']);
	session_destroy();
	$_SESSION = array();
	header("location: index.php");
?>