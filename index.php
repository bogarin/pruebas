<?php 
 /*
 	El frontend controler se encarga
 	de configurar nuestra aplicacion.
  */
 	require 'config.php';
	require 'helpers.php';
	//librerias
	require 'library/Request.php';
	
	if (empty($_GET['url'])) {
		$url="";
	}else{
		$url=$_GET['url'];
	}
	$recuest=new Request($url);
	var_dump($recuest->getController());
?>