<?php

namespace UserApp\Validator;

use UserApp\Entity\User;

/**
 * Validates user entity
 * 
 * @author Ahmet Akbana
 */
class UserValidator{
	
	/**
	 * User entity
	 * 
	 * @var User 
	 */
	private $user;
	
	/**
	 * Validation errors
	 * 
	 * @var Array
	 */
	private $error = array();
	
	
	/**
	 * Sets User entity
	 * 
	 * @param User entity
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}
	
	/**
	 * Validates User email and password
	 */
	public function loginValidation()
	{
		$this->validateEmail();
		$this->validatePassword();
	}
	
	/**
	 * Validates User name, email and password
	 */
	public function registerValidation()
	{
		$this->validateName();
		$this->validateEmail();
		$this->validatePassword();
	}
	
	/**
	 * Validates User email
	 */
	private function validateEmail()
	{
		if(empty($this->user->email)){
			$this->error[] = 'Email field is null';
		}elseif(filter_var($this->user->email, FILTER_VALIDATE_EMAIL) === FALSE){
			$this->error[] = 'Email is not valid';
		}
	}
	
	/**
	 * Validates User Name
	 */
	private function validateName()
	{
		if(empty($this->user->name)){
			$this->error[] = 'Name field is null';
		}elseif((strlen($this->user->name) > 30) || (strlen($this->user->name) < 2)){
			$this->error[] = 'Character count of name must be between 2 and 30';
		}
	}
	
	/**
	 * Validates User password
	 */
	private function validatePassword()
	{
		if(empty($this->user->password)){
			$this->error[] = 'Password field is null';
		}
	}
	
	/**
	 * Gets validation errors
	 * 
	 * @return Array or boolean false
	 */
	public function getError()
	{
		if(!empty($this->error)){
			return $this->error;
		}else{
			return false;
		}
	}
}
