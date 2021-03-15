<?php
    session_start();
	unset ($_SESSION['usuario']);
	unset ($_SESSION['senha']);
	unset ($_SESSION['func']);
	header('location:login.php');
?>