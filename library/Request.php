<?php 

	/**
	* Jose Ramón Bogarin Valenzuela
	*/
	class Request{
		
		protected $url;
		protected $controller;
		protected $defaultController='home';

		public function __construct($url){
			$this->url=$url;
			$this->resolveController(explode('/', $this->getUrl());
		}

		public function getUrl(){
			return $this->url;
		}

		public function resolveController(&$segments){
			$this->controler=array_shift($segments);
			if (empty($this->controller)) {
				$this->controller=$this->defaultController;
			}
		}
		
		public function getController(){
			return $this->controller;
		}

		public function getControllerClassName(){

		}

		public function getControllerFileName(){

		}

	}
 ?>