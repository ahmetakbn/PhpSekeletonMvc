<?php

namespace PhpSkeletonMvc\Core;

/**
 * Boot application class. Separate url to values to the name of module, controller, method and parameters.
 * Includes controller from module, calls methods and sends parameter to method.
 * converts url = {module_name}/{controller name}/{method name}/{parameters}
 * 
 * @author Ahmet Akbana
 */
class Bootstrap{
	
	/**
	 * Shows if url parameter is sent by .htaccess rewrite rule
	 * 
	 * @var boolean
	 */
	private $urlValue;
	
	/**
	 * Module name comes from url
	 * 
	 * @var string
	 */
	private $module;
	
	/**
	 * Controller name comes from url
	 * 
	 * @var string
	 */
	private $controller;
	
	/**
	 * Method name comes from url
	 * 
	 * @var string
	 */
	private $action;
	
	/**
	 * Parameters come from url
	 * 
	 * @var array
	 */
	private $parameters = array();
	
	
	/**
	 * Checks if url parameter is set, calls Controller include functions
	 */
	public function __construct()
	{
		$this->readUrl();
		
		if($this->urlValue === TRUE){
			if(defined($this->module)){
				Define('CURRENT_MODULE', constant($this->module));
			}else{
				Die('Please check module name from config!');
			}
			$this->includeFromUrl();
		}else{
			Define('CURRENT_MODULE', BASE_MODULE);
			$this->includeDefault();
		}
	}
	
	
	/**
	 * Includes default controller and method
	 */
	private function includeDefault()
	{
		$file = __DIR__.'/../../../src/'.CURRENT_MODULE.'/Controller/indexController.php';
		if(file_exists($file)){
			require_once($file);
		}else{
			Die('Main Controller does not exist');
		}
		
		$defaultController = CURRENT_MODULE.'\Controller\\'.BASE_CONTROLLER.'Controller';
		
		$controller = new $defaultController;
		
		$action = BASE_ACTION.'Action';
		
		$controller->{$action}();
	}
	
	
	/**
	 * Includes controller class from module, calls method and sends parameter from requested url. 
	 */
	private function includeFromUrl()
	{
		$file = __DIR__.'/../../'.CURRENT_MODULE.'/Controller/'.$this->controller.'Controller.php';
		
		if(file_exists($file)){
			require_once($file);
			$controllerName = CURRENT_MODULE.'\Controller\\'.$this->controller.'Controller'; 
			$controllerObject = new $controllerName;
			if(!is_null($this->action)){
				$methodName = $this->action.'Action';
				if(method_exists($controllerObject, $methodName)){
					if(!empty($this->parameters)){
						call_user_func_array(array($controllerObject, $methodName), $this->parameters);
					}else{
						$controllerObject->{$methodName}();
					}
				}else{
					Die('Method does not exist');
				}
			}else{
				$controllerObject->indexAction();
			}
		}else{
			Die('Controller does not exist');
		}
	}
	
	
	/**
	 * Gets module name, controller name, method name and parameters from url
	 */
	private function readUrl()
	{
		if (isset($_GET['url'])) {
			$this->urlValue = TRUE;
			
			$url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
					
            $this->module = isset($url[0]) ? $url[0] : null;
            $this->controller = isset($url[1]) ? $url[1] : null;
            $this->action = isset($url[2]) ? $url[2] : null;
			
            unset($url[0], $url[1], $url[2]);
            
            $this->parameters = array_values($url);
		}else{
			$this->urlValue = FALSE;
		}
	}
}
