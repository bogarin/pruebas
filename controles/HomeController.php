<?php  
	
	/**
	* Jose Ramón Bogarin Valenzuela
	*/
	class HomeController{
		
		function indexAction(){
			$view=new View('home',['titulo'=>'Mejorando PHP']);
			$view->execute();
		}
	}
	?>

