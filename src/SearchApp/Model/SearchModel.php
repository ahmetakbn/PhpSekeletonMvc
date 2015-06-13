<?php

namespace SearchApp\Model;

use PhpSkeletonMvc\Core\Database;

/**
 * Model class of search
 * 
 * @author Ahmet Akbana
 */
class SearchModel{
	
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
	 * Gets result from searching of user name
	 * 
	 * @param string $search
	 * @return array query result
	 */
	public function search($search)
	{
		$query = $this->db->prepare("SELECT * FROM users WHERE name LIKE :search");
		$query->execute(array(
				':search'=>"%".$search."%"
			));
			
		return $query->fetchAll();
	}
	
}
