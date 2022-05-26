<?php

    if(!isset($_SESSION)) 
    { 
      session_start(); 
      error_reporting(E_PARSE);
    } 

    if(!$_SESSION['verificar']){
      header("Location: ../");
    }

    if($_SESSION['tipo'] != "ADMINISTRADOR"){
      $_SESSION['verificar']=false;
      session_destroy();
      header("Location: ../");
    }


?>