	<?php 

function view($template,$vars=array()){
	 	extract($vars);
	 	require "views/$template.tpl.php";
	}

function controller($name){
	$file="controles/$name.php";
	if(!file_exists($file)){
		
		header("HTTP/1.0 404 Not Found");
		exit("pagina no encontrada");
	}
	require $file;
}
?>