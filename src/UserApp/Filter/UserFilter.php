<?php

namespace UserApp\Filter;

use UserApp\Entity\User;

/**
 * Filters user parameters
 * 
 * @author Ahmet Akbana
 */
class UserFilter{
	
	/**
	 * User entity
	 * 
	 * @var User entity
	 */
	private $user;
	
	/**
	 * Sets user value 
	 *
	 * @param User entity
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}
	
	/**
	 * Removes html tags from user name and email
	 * 
	 * @return User entity
	 */
	public function filter()
	{
		if(!empty($user->name)){
			$this->user->name = filter_var($this->user->name, FILTER_SANITIZE_STRING);
		}
		
		if(!empty($user->email)){
			$this->user->email = filter_var($this->user->email, FILTER_SANITIZE_STRING);
		}
		
		return $this->user;
	}
	
}
