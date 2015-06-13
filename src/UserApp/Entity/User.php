<?php

namespace UserApp\Entity;

/**
 * User entity. 
 * 
 * @author Ahmet Akbana
 */
class User{
	
	/**
	 * Name of user
	 *
	 * @var string
	 */
	public $name;
	
	/**
	 * Email of user
	 * 
	 * @var string
	 */
	public $email;
	
	/**
	 * Password of user
	 * 
	 * @var string
	 */
	public $password;
}
