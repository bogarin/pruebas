<?php 

	/**
	* Jose Ramón Bogarin Valenzuela
	*/
	class Request{
		
		protected $url;
		protected $controller;
		protected $defaultController="home";
		protected $action;
		protected $defaultAction='index';
		protected $params=array();

		public function __construct($url){
			$this->url=$url;
			$segments=explode('/', $this->url);
			$this->resolveController($segments);
			$this->resolveAction($segments);
			$this->resolveParams($segments);
		}

		

		public function resolveController(&$segments){
			$this->controller=array_shift($segments);
			if (empty($this->controller)) {
				$this->controller=$this->defaultController;
			}
		}
	
		public function resolveAction(&$segments){
			$this->action=array_shift($segments);
			if (empty($this->action)) {
				$this->action=$this->defaultAction;
			}
		}

		public function resolveParams(&$segments){
			$this->params=$segments;
		}

		public function getUrl(){
			return $this->url;
		}

		public function getAction(){
			return $this->action;
		}

		public function getController(){
			return $this->controller;
		}

		public function getParams(){
			return $this->params;
		}

		public function getControllerClassName(){
			return Inflector::camel($this->getController()).'Controller';
		}

		public function getControllerFileName(){
			return 'controles/'.$this->getControllerClassName().'.php'; 
		}

		public function getActionMethodName(){
			return Inflector::lowCamel($this->getAction()).'Action';
		}

		public function execute(){
			$controllerClassName= $this->getControllerClassName();
			$controllerFileName= $this->getControllerFileName();
			$actionMethodName=$this->getActionMethodName();
			$params=$this->getParams(); 
			if (!file_exists($controllerFileName)) {
				exit('controlador no exite');
			}
			require $controllerFileName;
			$controller = new $controllerClassName();
			$response = call_user_func_array([$controller,$actionMethodName], $params);

			if ($response instanceof Response) {
			$response->execute();
				
			}else if(is_string($response)){
				echo $response;
			}else if(is_array($response)){
				echo json_encode($response);
			}else{
			exit('respuesta no valida');
			}
		}

	}
 ?>