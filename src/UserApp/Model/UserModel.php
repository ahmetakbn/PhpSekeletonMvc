<?php

namespace UserApp\Model;

use PhpSkeletonMvc\Core\Database;

use UserApp\Entity\User;

/**
 * Model class of user
 * 
 * @author Ahmet Akbana
 */
class UserModel{
	
	/**
	 * Database instance
	 * 
	 * @var Database
	 */
	private $db;
	
	/**
	 * Sets database instance
	 */
	public function __construct()
	{
		$this->db = new Database();
	}
	
	/**
	 * Asks database if user exist
	 * 
	 * @param User entity
	 * @return boolean
	 */
	public function askUser(User $user)
	{
		$query = $this->db->prepare("SELECT id FROM users WHERE email = :email AND password = MD5(:password)");
		$query->execute(array(
				':email'=>$user->email,
				':password'=>$user->password
			));
		$count = $query->rowCount();
		if($count > 0)
		{
			return true;
		}else
		{
			return false;
		}
	}
	
	
	/**
	 * Saves user to database
	 * 
	 * @param User entity
	 */
	public function saveUser(User $user)
	{
		$query = $this->db->prepare("INSERT INTO users (email,name,password) VALUES (:email,:name,MD5(:password))");
		$query->execute(array(
				':name'=>$user->name,
				':email'=>$user->email,
				':password'=>$user->password
			));
	}
	
	/**
	 * Gets user from database by email
	 * 
	 * @param string $email
	 * @return array user
	 */
	public function getUser($email)
	{
		$query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
		$query->execute(array(
				':email'=>$email
			));
			
		return $query->fetchObject();
	}
	
}
