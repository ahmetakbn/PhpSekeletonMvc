<?php

namespace UserApp\Controller;

use PhpSkeletonMvc\Core\BaseController;
use PhpSkeletonMvc\Core\View;
use PhpSkeletonMvc\Component\Redirect;
use PhpSkeletonMvc\Component\Session;

use UserApp\Model\UserModel;

/**
 * Dashboard Controller. Contains dashboard actions
 * 
 * @author Ahmet Akbana
 */
class dashboardController extends BaseController{
	
	/**
	 * Default method of dashboardController
	 * 
	 * @return View 
	 */
	public function indexAction()
	{
		if($this->userLogin !== TRUE){
			Redirect::toIndex();
		}
		
		$userEmail = Session::get('user_email');
		
		$userModel = new UserModel();
		$user = $userModel->getUser($userEmail);
		
		return new View('dashboard', array(
			'user' => $user
		));
	}
	
}
