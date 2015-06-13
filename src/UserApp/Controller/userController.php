<?php

namespace UserApp\Controller;

use PhpSkeletonMvc\Core\BaseController;
use PhpSkeletonMvc\Core\View;
use PhpSkeletonMvc\Component\Session;
use PhpSkeletonMvc\Component\Redirect;

use UserApp\Entity\User;
use UserApp\Model\UserModel;
use UserApp\Validator\UserValidator;
use UserApp\Filter\UserFilter;

/**
 * User Controller. Contains user actions
 * 
 * @author Ahmet Akbana
 */
class userController extends BaseController{
	
	/**
	 * Login method of user controller
	 * 
	 * @return View
	 */
	public function loginAction()
	{
		if($this->userLogin === TRUE){
			Redirect::to('userapp/dashboard');
		}
		
		$error = array();
		
		if(isset($_POST['login'])){
			
			$user = new User();
			$user->email = $_POST['email'];
			$user->password = $_POST['password'];
			
			$validation = new UserValidator($user);
			$validation->loginValidation();
			if(!$validation->getError()){
				
				$userModel = new UserModel();
				if($userModel->askUser($user)){
					Session::add('user_login', TRUE);
					Session::add('user_email', $user->email);
					Redirect::to('userapp/dashboard');
				}else{
					$error[] = 'Email-Password combination does not exist';
				}
			}else{
				$error = $validation->getError();
			}
			
		}	
			
		return new View('login',array(
			'error' => $error
		));
	}
	
	/**
	 * Logout method of user controller
	 */
	public function logoutAction()
	{
		Session::destroy();
		Redirect::toIndex();
	}
	
	/**
	 * Register method of user controller
	 * 
	 * @return View
	 */
	public function registerAction()
	{
		if($this->userLogin === TRUE){
			Redirect::to('userapp/dashboard');
		}
		
		$error = array();
		$success = FALSE;
		
		if(isset($_POST['register'])){
			
			$user = new User();
			$user->name = $_POST['name'];
			$user->email = $_POST['email'];
			$user->password = $_POST['password'];
			
			$userFilter = new UserFilter($user);
			$user = $userFilter->filter();
			
			$validation = new UserValidator($user);
			$validation->registerValidation();
			if(!$validation->getError()){
				if($_POST['password'] != $_POST['password_repeat']){
					$error[] = 'Password repeat does not match';
				}else{	
					$userModel = new UserModel();
					if(!$userModel->askUser($user)){
						$userModel->saveUser($user);
						$success = TRUE;
					}else{
						$error[] = 'User already exist with this email';
					}
				}
			}else{
				$error = $validation->getError();
			}
			
		}
		
		return new View('register',array(
			'error' => $error, 
			'success' => $success
		));
	}
}
