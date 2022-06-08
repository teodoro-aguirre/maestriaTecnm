<?php
	session_start();
	$_SESSION['verificar']=false;
	session_destroy();
	header("Location: ../");