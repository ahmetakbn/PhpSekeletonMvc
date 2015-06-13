<?php

namespace PhpSkeletonMvc\Core;

use PhpSkeletonMvc\Component\Session;

/**
 * Base Controller of PhpSkeletonMvc application. Encapsulates controllers.
 * 
 * @author Ahmet Akbana
 */
class BaseController{
	
	/**
	 * User authentication information. User logged in or not. 
	 *
	 * @var boolean
	 */
	public $userLogin;
	
	/**
	 * Inıts Session, and checks if user logged in.
	 */
	public function __construct()
	{
		Session::init();
		$this->userLogin = Session::checkUserLogin();
	}

}
