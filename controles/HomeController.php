<?php  
	
	/**
	* Jose Ramón Bogarin Valenzuela
	*/
	class HomeController{
		
		function indexAction(){
		
			return $view=new View('home',['titulo'=>'Mejorando PHP']);
		}
	}
	?>

