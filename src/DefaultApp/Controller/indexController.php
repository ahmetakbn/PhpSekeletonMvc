<?php

namespace DefaultApp\Controller;

use PhpSkeletonMvc\Core\BaseController;
use PhpSkeletonMvc\Core\View;
use PhpSkeletonMvc\Component\Redirect;

/**
 * Default Controller. Contains index action
 * 
 * @author Ahmet Akbana
 */
class indexController extends BaseController{
	
	/**
	 * Default method of indexController
	 * 
	 * @return View
	 */
	public function indexAction()
	{
		
		if($this->userLogin === TRUE){
			Redirect::to('userapp/dashboard');
		}
		
		return new View('index');
	}
}
