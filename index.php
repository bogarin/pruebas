<?php 
 /*
 	El frontend controler se encarga
 	de configurar nuestra aplicacion.
  */
 	require 'config.php';
	require 'helpers.php';
	//librerias
	require 'library/Request.php';
	require 'library/Inflector.php';
	require 'library/Response.php';
	require 'library/View.php';
	if (empty($_GET['url'])) {
		$url="";
	}else{
		$url=$_GET['url'];
	}
	$recuest=new Request($url);
	$recuest->execute();
?>